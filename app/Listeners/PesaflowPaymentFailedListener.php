<?php

namespace App\Listeners;

use App\Cache\CacheRepository;
use App\Events\PesaflowPaymentFailedEvent;
use App\Models\Booking;
use App\Models\Booth;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Models\TicketPayment;

class PesaflowPaymentFailedListener
{

    public function handle(PesaflowPaymentFailedEvent $event): void
    {
        $order = $event->order;

        $status = $event->status;

        $order->update(["status" => $status]);

        $order->orderItems->each(function (OrderItem $orderItem) use ($order, $status) {

            $orderItem->update(["status" => $status]);

            if ($orderItem->itemable_type == (new Booth)->getMorphClass()) {

                $booking = Booking::where([
                    "order_id" => $order->id,
                    "booth_id" => $orderItem->itemable_id
                ])->first();

                if ($booking) {
                    $booking->update(["payment_status" => $status]);
                    CacheRepository::cache()->forgetKey("reserved_booths$booking->booth_id");
                }
            } elseif ($orderItem->itemable_type == (new Ticket)->getMorphClass()) {
                TicketPayment::where([
                    "order_id" => $order->id,
                    "ticket_id" => $orderItem->itemable_id,
                    "serial" => $orderItem->reference_no
                ])->update([
                    "payment_status" => $status
                ]);
            }
        });
    }
}
