<?php

namespace App\Http\Controllers\Payment;

use App\Actions\GenerateProformaInvoice;
use App\Enum\PaymentStatus;
use App\Generators\UniqueStringGenerator;
use App\Http\Controllers\Controller;
use App\Http\Requests\Payment\PaymentRequest;
use App\Models\Affiliation;
use App\Models\Country;
use App\Models\County;
use App\Models\EventSummit;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Role;
use App\Models\Ticket;
use App\Models\TicketPayment;
use App\Models\User;
use App\Notifications\SendProformaInvoiceNotification;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\ValidationException;
use Throwable;

class TicketPaymentController extends Controller
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
        $summitId = $request->summit_id ?? null;
        $summit = EventSummit::find($summitId);
        $userId = Auth::id();

        //performs validation of booths
        foreach ($orderItems as $orderItem) {
            if (Ticket::whereId($orderItem["id"])->doesntExist()) {
                throw ValidationException::withMessages([
                    "order_items" => [
                        "Invalid ticket #{$orderItem["id"]}"
                    ]
                ]);
            }
        }

        //create an order
        $generator = new UniqueStringGenerator();
        $reference = 'KIW2023/' . $generator->generate(5, false);

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
                $tickedId = $item["id"];
                $quantity = $item["quantity"];
                $price = $item["price"];
                $total = $item["total"];

                $generator = new UniqueStringGenerator();

                //create an order item entry
                $orderItem = OrderItem::create([
                    "reference_no" => $generator->generate(6, false),
                    "user_id" => $userId,
                    "summit_id" => $summitId,
                    "order_id" => $orderId,
                    "quantity" => $quantity,
                    "price" => $price,
                    "total" => $total,
                    "currency" => $currency,
                    "itemable_type" => (new Ticket)->getMorphClass(),
                    "itemable_id" => $tickedId,
                ]);

                //create user account
                $user = $this->findUser($item);

                //create a booking entry
                TicketPayment::create([
                    "user_id" => $user->id,
                    "summit_id" => $summitId,
                    "ticket_id" => $tickedId,
                    "order_id" => $orderId,
                    "order_item_id" => $orderItem->id,
                    "delegate_name" => $item["delegate_name"],
                    "delegate_email" => $item["delegate_email"],
                    "delegate_organization" => $item["delegate_organization"],
                    "payment_status" => PaymentStatus::PENDING,
                ]);
            });

            $billDescription = "Ticket payment for $summit?->title";

            DB::commit();

            $isPayingForSelf = $orderItems[0]['delegate_ticket_type'] == 'buy_for_self';

            if ($isPayingForSelf) {
                $request = pesaflow_request_payment(
                    order: $order,
                    billDescription: $billDescription,
                    serviceId: $serviceId,
                    currency: $currency
                );
            } else {

                if (GenerateProformaInvoice::run($order)) {
                    auth()->user()->notify(new SendProformaInvoiceNotification($order));
                }
                $request = collect([
                    'invoice_number' => $order->reference,
                    'invoice_link' => route('pesaflow.invoice_link', ['order' => $order->id], true),
                ]);
            }

            return new JsonResponse([
                "data" => [
                    "order_id" => $order->id,
                    "invoice_number" => $request['invoice_number'],
                    "invoice_link" => $request['invoice_link'],
                ],
                "message" => "Ticket created successfully"
            ]);
        } catch (Exception $e) {
            return new JsonResponse([
                "message" => $e->getMessage()
            ], 400);
        }
    }

    /**
     * @param $data
     * @return array
     */
    private function parseData($data): array
    {
        $fullName = $data["delegate_name"];
        $names = get_first_last_name($fullName);

        $country = null;
        if (isset($data["delegate_country"])) {
            $country = $this->findCountry($data["delegate_country"]);
        }

        $county = null;
        if (isset($data["delegate_county"])) {
            $county = $this->findCounty($data["delegate_county"]);
        }

        $affiliation = null;
        if (isset($data[""])) {
            $affiliation = $this->findAffiliation($data["delegate_affiliation"]);
        }

        $interests = $data["delegate_area_of_interest"] ?? null;

        return [
            "salutation" => $data["delegate_title"] ?? "",
            "first_name" => $names[0],
            "last_name" => $names[1],
            "email" => $data["delegate_email"],
            "mobile" => $data["delegate_mobile"] ?? null,
            "id_number" => $data["delegate_id_number"] ?? null,
            "country_id" => $country->id ?? null,
            "county_id" => $county->id ?? null,
            "affiliation_id" => $affiliation->id ?? null,
            "institution" => $data["delegate_organization"] ?? null,
            "position" => $data["delegate_position"] ?? null,
            "gender" => $data["delegate_gender"] ?? null,
            "disability" => $data["delegate_disabled"] ?? null,
            "user_type" => $data["delegate_register_as"] ?? "delegate",
            "area_of_interest" => !empty($interests) ? [$interests] : [],
        ];
    }

    private function findCountry($name): Country|Builder|null
    {
        return Country::where("name", $name)->first();
    }

    private function findAffiliation($name): Country|Builder|null
    {
        return Affiliation::where("name", $name)->first();
    }

    private function findCounty($name): Builder|County|null
    {
        return County::where("name", "like", "%$name%")->first();
    }

    private function findUser($data): Model|User
    {
        $user = User::whereEmail($data["delegate_email"])->first();

        if ($user) {
            return $user;
        }

        $cleanData = $this->parseData($data);
        $cleanData["password"] = generate_random_password(10);

        $user = User::create($cleanData);

        $userType = $user->user_type;
        $user->assignRole(Role::findByName($userType->value, "web"));

        //notify user with account credentials
        //$user->notify(new WelcomeNotification($cleanData["password"]));

        event(new Registered($user));

        return $user;
    }
}
