<?php

namespace App\Http\Controllers\API;

use App\Enum\BookingStatus;
use App\Enum\OrderStatus;
use App\Http\Controllers\Controller;
use App\Models\Booking;
use App\Models\Booth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pesaflow\PesaflowRequest;
use App\Transformers\OrderTransformer;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class OrderController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function index(Request $request): JsonResponse
    {
        $orders = Order::query()
            ->when(request('include'), function ($query, $include) {
                $with = explode(",", $include);
                return $query->with($with);
            })
            ->withCount("orderItems")
            ->when(request("status"))
            ->where("status", $request->status)
            ->where("user_id", Auth::id())
            ->latest("id")
            ->paginate(perPage: request("per_page", 10));

        return fractal()
            ->collection($orders, new OrderTransformer())
            ->parseIncludes($request->include)
            ->paginateWith(new IlluminatePaginatorAdapter($orders))
            ->addMeta([
                "filters" => [
                    "status" => OrderStatus::cases(),
                ]
            ])
            ->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * @param Order $order
     * @return JsonResponse
     */
    public function show(Order $order): JsonResponse
    {
        $order->load("orderItems");
        $order->loadCount("orderItems");

        return fractal()
            ->item($order, new OrderTransformer())
            ->parseIncludes("orderItem")
            ->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function query(Request $request): JsonResponse
    {
        $request->validate([
            "reference" => [
                "required",
                Rule::exists("orders", "reference")
                    ->where(function ($query) {
                        $query->where("user_id", Auth::id());
                    })
            ]
        ]);

        $order = Order::query()
            ->where("reference", $request->reference)
            ->where("user_id", Auth::id())
            ->with("orderItems", "orderItems.itemable")
            ->withCount("orderItems")
            ->firstOrFail();

        return fractal()
            ->item($order, new OrderTransformer())
            ->parseIncludes("orderItem")
            ->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * Enables a user to complete a pending order
     * @param $orderId
     * @return JsonResponse
     * @throws Exception
     */
    public function complete($orderId): JsonResponse
    {
        $order = Order::whereId($orderId)->firstOrFail();

        if ($order->status == OrderStatus::SETTLED) {
            return new JsonResponse([
                "message" => "Failed! The order has already being settled"
            ], 400);
        }

        if ($order->status == OrderStatus::EXPIRED) {
            return new JsonResponse([
                "message" => "Failed! Unable to process the order at the moment"
            ], 400);
        }

        $pesaflowRequest = $order->pesaflowRequest;

        try {
            //query order status from pesaflow
            $order = pesaflow_query_status($pesaflowRequest->invoice_number);

            if ($order->status == OrderStatus::SETTLED) {
                return new JsonResponse([
                    "paid" => true,
                    "message" => "The transaction was completed successfully"
                ]);
            }

            //check for booth the availability in order items bookings
            $orderItems = OrderItem::where("order_id", $order->id)
                ->where('itemable_type', (new Booth)->getMorphClass())
                ->get();

            foreach ($orderItems as $orderItem) {
                $exists = Booking::query()
                    ->where("user_id", "!=", $orderItem->user_id)
                    ->where("booth_id", $orderItem->itemable_id)
                    ->where("booking_status", BookingStatus::PENDING)
                    ->where("created_at", '>', now()->subMinutes(15))
                    ->exists();

                if ($exists) {
                    return new JsonResponse([
                        "message" => "Failed! Unable to complete this transaction. Booth has already been booked"
                    ], 400);
                }
            }

            return new JsonResponse([
                "data" => [
                    "order_id" => $order->id,
                    "invoice_number" => $pesaflowRequest->invoice_number,
                    "invoice_link" => $pesaflowRequest->invoice_link,
                ],
                "paid" => false,
                "message" => "Click on the link to complete the order"
            ]);

        } catch (Exception $exception) {
            return new JsonResponse([
                "message" => $exception->getMessage()
            ], 400);
        }
    }

    /**
     * Checks transaction status from pesaflow
     * @param $orderId
     * @return JsonResponse
     * @throws Exception
     */
    public function checkPesaflowStatus($orderId): JsonResponse
    {
        $order = Order::whereId($orderId)->firstOrFail();

        if ($order->status == OrderStatus::SETTLED) {
            return new JsonResponse([
                "message" => "Failed! The order has already being settled"
            ], 400);
        }

        $pesaflowRequest = PesaflowRequest::where("order_id", $orderId)->firstOrFail();

        try {
            $order = pesaflow_query_status($pesaflowRequest->invoice_number);

            return fractal()
                ->item($order, new OrderTransformer())
                ->parseIncludes("orderItem")
                ->respond(200, [], JSON_PRETTY_PRINT);

        } catch (Exception $exception) {
            return new JsonResponse([
                "message" => $exception->getMessage()
            ], 400);
        }
    }
}
