<?php

namespace App\Listeners;

use App\Actions\GeneratePaymentReceipt;
use App\Cache\CacheRepository;
use App\Enum\BookingStatus;
use App\Enum\OrderItemStatus;
use App\Enum\PaymentStatus;
use App\Events\PesaflowPaymentSuccessfulEvent;
use App\Models\Booking;
use App\Models\Booth;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Models\TicketPayment;
use App\Notifications\PaymentNotification;
use Exception;

class PesaflowPaymentSuccessfulListener
{

    /**
     * Handle the event.
     */
    public function handle(PesaflowPaymentSuccessfulEvent $event): void
    {
        $order = $event->order;

        $order->orderItems->each(function (OrderItem $orderItem) use ($order) {

            $orderItem->update(["status" => OrderItemStatus::PAID]);

            if ($orderItem->itemable_type == (new Booth)->getMorphClass()) {

                $booking = Booking::where([
                    "order_id" => $order->id,
                    "booth_id" => $orderItem->itemable_id
                ])->first();

                if ($booking) {
                    $booking->update([
                        "booking_status" => BookingStatus::BOOKED,
                        "payment_status" => PaymentStatus::SETTLED
                    ]);

                    try {
                        CacheRepository::cache()->forgetKey("reserved_booths$booking->booth_id");
                    } catch (Exception $exception) {
                        report($exception);
                    }
                }

            } elseif ($orderItem->itemable_type == (new Ticket)->getMorphClass()) {
                TicketPayment::where([
                    "order_id" => $order->id,
                    "ticket_id" => $orderItem->itemable_id
                ])->update([
                    "payment_status" => PaymentStatus::SETTLED,
                    "serial" => $orderItem->reference_no
                ]);
            }
        });

        if (!$order->receipt_sent_at) {

            $receiptUrl = GeneratePaymentReceipt::run($order);

            $order->user->notify(new PaymentNotification($order));

            $order->update([
                'receipt_url' => $receiptUrl,
                "receipt_sent_at" => now()
            ]);
        }
    }
}
