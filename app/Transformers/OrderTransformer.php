<?php

namespace App\Transformers;

use App\Enum\PaymentStatus;
use App\Models\Order;
use Illuminate\Support\Facades\Storage;
use League\Fractal\Resource\Collection;
use League\Fractal\TransformerAbstract;

class OrderTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        "orderItems"
    ];

    /**
     * A Fractal transformer.
     *
     * @param Order $order
     * @return array
     */
    public function transform(Order $order): array
    {
        return [
            "id" => $order->id,
            "reference" => $order->reference,
            "currency" => $order->currency,
            "items_total" => $order->items_total,
            "convenience_fee" => $order->convenience_fee,
            "tax_total" => format_amount($order->tax_total, $order->currency),
            "total_amount" => $order->total_amount,
            "subtotal_amount" => format_amount(($order->items_total - $order->tax_total), $order->currency),
            "formatted_amount" => format_amount($order->total_amount, $order->currency),
            "payment_method" => $order->payment_method,
            "transaction_reference" => $order->transaction_reference ?? "NA",
            "receipt_url" => Storage::disk("public")->url($order->receipt_url),
            "status" => $order->status == PaymentStatus::SETTLED ? PaymentStatus::RECEIVED_PENDING_APPROVAL : $order->status,
            "notes" => $order->notes,
            "checkout_completed_at" => $order->check_out_completed_at?->format('D M Y H:i:s A'),
            "payment_verified" => is_null($order->payment_verified_at),
            "order_items_count" => $order->order_items_count,
            "updated_at" => $order->updated_at,
            "created_at" => $order->created_at,
        ];
    }

    /**
     * @param Order $order
     * @return Collection
     */
    public function includeOrderItems(Order $order): Collection
    {
        return $this->collection($order->orderItems, new OrderItemTransformer(), "include");
    }
}
