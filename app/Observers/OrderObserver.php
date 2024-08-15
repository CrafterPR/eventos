<?php

namespace App\Observers;

use App\Enum\OrderItemStatus;
use App\Enum\OrderStatus;
use App\Models\Order;

class OrderObserver
{
    public function updated(Order $order): void
    {
        if ($order->status == OrderStatus::SETTLED->value) {
            $order->orderItems->each(function ($orderItem) {
                $orderItem->update(['status' => OrderItemStatus::PAID->value, 'reference_no' => generate_reference_no('order_items', 'reference_no')]);
            });
        }
    }
}
