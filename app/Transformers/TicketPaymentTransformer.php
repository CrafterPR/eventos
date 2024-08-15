<?php

namespace App\Transformers;

use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Summit;
use App\Models\Ticket;
use App\Models\TicketPayment;
use League\Fractal\Resource\Item;
use League\Fractal\TransformerAbstract;

class TicketPaymentTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        "ticket", "orderItem", "summit", "order"
    ];

    /**
     * A Fractal transformer.
     *
     * @param TicketPayment $ticketPayment
     * @return array
     */
    public function transform(TicketPayment $ticketPayment): array
    {
        $url = url("ticket/$ticketPayment->id/validate");

        return [
            "id" => $ticketPayment->id,
            "serial" => $ticketPayment->serial,
            "scan_url" => $url,
            "date" => "27-11-2023 to 01-12-2023",
            "delegate_name" => $ticketPayment->delegate_name,
            "delegate_email" => $ticketPayment->delegate_email,
            "delegate_organization" => $ticketPayment->delegate_organization,
            "payment_status" => $ticketPayment->payment_status,
            "confirmation_status" => $ticketPayment->confirmation_status,
            "notes" => $ticketPayment->notes,
            "created_at" => $ticketPayment->created_at->toIso8601String(),
        ];
    }

    /**
     * @param TicketPayment $ticketPayment
     * @return Item
     */
    public function includeTicket(TicketPayment $ticketPayment): Item
    {
        $ticket = $ticketPayment->ticket;

        return $this->item($ticket, function (Ticket $ticket) {
            return [
                "id" => $ticket->id,
                "title" => $ticket->title
            ];
        }, "include");
    }

    /**
     * @param TicketPayment $ticketPayment
     * @return Item
     */
    public function includeOrderItem(TicketPayment $ticketPayment): Item
    {
        $orderItem = $ticketPayment->orderItem;

        return $this->item($orderItem, function (OrderItem $orderItem) {
            return [
                "id" => $orderItem->id,
                "price" => $orderItem->price,
                "quantity" => $orderItem->quantity,
                "total" => $orderItem->total,
                "currency" => $orderItem->currency,
                "formatted_price" => format_amount($orderItem->total, $orderItem->currency),
                "ticket_url" => $orderItem->ticket_url,
            ];
        }, "include");
    }

    /**
     * @param TicketPayment $ticketPayment
     * @return Item
     */
    public function includeSummit(TicketPayment $ticketPayment): Item
    {
        $summit = $ticketPayment->summit;

        return $this->item($summit, function (Summit $summit) {
            return [
                "id" => $summit->id,
                "title" => $summit->title,
                "edition_title" => $summit->edition_title,
                "edition_description" => $summit->edition_description,
                "venue" => $summit->venue,
            ];
        }, "include");
    }

    /**
     * @param TicketPayment $ticketPayment
     * @return Item
     */
    public function includeOrder(TicketPayment $ticketPayment): Item
    {
        $order = $ticketPayment->order;

        return $this->item($order, function (Order $order) {
            return [
                "id" => $order->id,
                "reference" => $order->reference,
            ];
        }, "include");
    }
}
