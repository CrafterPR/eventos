<?php

namespace App\Http\Controllers\Payment;

use App\Actions\GeneratePaymentReceipt;
use App\Actions\GenerateProformaInvoice;
use App\Enum\BookingStatus;
use App\Enum\PaymentStatus;
use App\Generators\UniqueStringGenerator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Models\Booking;
use App\Models\Booth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Notifications\PaymentNotification;
use App\Notifications\SendProformaInvoiceNotification;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Throwable;

class BoothPaymentController extends Controller
{

    /**
     * @param PaymentRequest $request
     * @return JsonResponse
     * @throws Throwable
     * @throws ValidationException
     */
    public function __invoke(PaymentRequest $request): JsonResponse
    {
        $totalAmount = $request->total_amount;
        $serviceId = $request->service_id;
        $currency = $request->currency;

        $orderItems = collect($request->order_items);
        $orderItemsTotal = $orderItems->sum("price");

        //get the current active summit
        $summit = get_current_summit();
        $userId = Auth::id();
        $summitId = $summit->id;

        //performs validation of booths
        foreach ($orderItems as $orderItem) {
            $boothId = $orderItem["id"];

            //check if booth_id exist and the price is correct
            if (Booth::whereId($boothId)->doesntExist()) {
                throw ValidationException::withMessages([
                    "order_items" => [
                        "Invalid booth #$boothId or amount"
                    ]
                ]);
            }

            //check if booth is already booked
            $exists = Booking::query()
                ->where([
                    "summit_id" => $summit->id,
                    "booth_id" => $boothId,
                    "booking_status" => BookingStatus::PENDING
                ])
                ->where("created_at", '>', now()->subMinutes(15))
                ->exists();

            if ($exists) {
                throw ValidationException::withMessages([
                    "order_items" => [
                        "Booth #$boothId is already booked"
                    ]
                ]);
            }
        }

        //create an order
        $generator = new UniqueStringGenerator();
        $reference = 'KIW2023/' . $generator->generate(4, false);

        try {
            DB::beginTransaction();

            $order = Order::create([
                'user_id' => $userId,
                'service_code' => $serviceId,
                'summit_id' => $summitId,
                'reference' => $reference,
                'currency' => $currency,
                'items_total' => $orderItemsTotal,
                'tax_total' => 0,
                'convenience_fee' => 0,
                'total_amount' => $totalAmount
            ]);


            $orderId = $order->id;

            $orderItems->each(function ($item) use ($userId, $summitId, $orderId, $currency) {

                $boothId = $item["id"];
                $boothPrice = $item["price"];

                //create an order item entry
                $orderItem = OrderItem::create([
                    "user_id" => $userId,
                    "summit_id" => $summitId,
                    "order_id" => $orderId,
                    "quantity" => 1,
                    "price" => $boothPrice,
                    "total" => $boothPrice,
                    "currency" => $currency,
                    "itemable_type" => (new Booth())->getMorphClass(),
                    "itemable_id" => $boothId,
                ]);

                //create a booking entry
                Booking::create([
                    "user_id" => $userId,
                    "summit_id" => $summitId,
                    "booth_id" => $boothId,
                    "order_id" => $orderId,
                    "order_item_id" => $orderItem->id,
                    "booking_status" => BookingStatus::PENDING,
                ]);
            });

            $billDescription = "Booth payment for $summit->title";


            $request = pesaflow_request_payment(
                order: $order,
                billDescription: $billDescription,
                serviceId: $serviceId,
                currency: $currency
            );

            DB::commit();

            if (GenerateProformaInvoice::run($order)) {
                auth()->user()->notify(new SendProformaInvoiceNotification($order));
            }
            // $request = collect([
            //     'invoice_number' => $order->reference,
            //     'invoice_link' => route('pesaflow.invoice_link', ['order' => $order->id], true),
            // ]);
            return new JsonResponse([
                "data" => [
                    "order_id" => $order->id,
                    "invoice_number" => $request['invoice_number'],
                    "invoice_link" => $request['invoice_link'],
                ],
                "message" => "Booking created successfully"
            ]);

        } catch (Exception $e) {
            return new JsonResponse([
                "message" => $e->getMessage()
            ], 400);
        }
    }
}
