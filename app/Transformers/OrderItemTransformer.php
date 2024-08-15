<?php

namespace App\Transformers;

use App\Models\Booth;
use App\Models\OrderItem;
use App\Models\Ticket;
use League\Fractal\TransformerAbstract;

class OrderItemTransformer extends TransformerAbstract
{
    /**
     * A Fractal transformer.
     *
     * @param OrderItem $orderItem
     * @return array
     */
    public function transform(OrderItem $orderItem): array
    {
        $data = [
            "id" => $orderItem->id,
            "quantity" => $orderItem->quantity,
            "price" => $orderItem->price,
            "total" => $orderItem->total,
            "currency" => $orderItem->currency,
            "formatted_amount" => format_amount($orderItem->total, $orderItem->currency),
            "itemable_type" => $orderItem->itemable_type,
            "itemable_id" => $orderItem->itemable_id,
            "status" => $orderItem->status,
        ];

        if ($orderItem->itemable_type == (new Booth)->getMorphClass()) {
            $data["item_name"] = "Booth " . $orderItem->itemable?->label;

        } else if ($orderItem->itemable_type == (new Ticket)->getMorphClass()) {
            $data["item_name"] = $orderItem->itemable?->title;
        }

        return $data;
    }
}
