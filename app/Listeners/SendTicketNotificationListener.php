<?php

namespace App\Listeners;

use App\Actions\GenerateOrderItemTicket;
use App\Enum\OrderItemStatus;
use App\Events\TicketApprovedEvent;
use App\Notifications\TicketNotification;

class SendTicketNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TicketApprovedEvent $event): void
    {
        $orderItem = $event->orderItem;

        $ticketUrl = GenerateOrderItemTicket::run($orderItem);

        $orderItem->update([
            "status" => OrderItemStatus::APPROVED,
            'ticket_url' => $ticketUrl,
        ]);

        $orderItem->user->notify(new TicketNotification($orderItem));

        $orderItem->update([
            "ticket_sent_at" => now()
        ]);
    }
}
