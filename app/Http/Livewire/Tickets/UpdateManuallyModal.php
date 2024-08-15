<?php

namespace App\Http\Livewire\Tickets;

use App\Actions\GeneratePaymentReceipt;
use App\Enum\OrderItemStatus;
use App\Enum\OrderStatus;
use App\Models\OrderItem;
use App\Models\TicketPayment;
use App\Notifications\PaymentNotification;
use Livewire\Component;

class UpdateManuallyModal extends Component
{
    public TicketPayment $ticketPayment;

    protected $rules = [
        'ticketPayment.reference' => ['required'],
        'ticketPayment.mode' => ['required'],
        'ticketPayment.paid_by' => ['required'],
    ];

    protected $listeners = [
        'update_manually' => 'updateManually'
    ];


    public function render()
    {
        return view('livewire.tickets.update-manually');
    }

     public function mount(TicketPayment $ticketPayment)
     {
         $this->ticketPayment = $ticketPayment;
     }
    public function updateManually(OrderItem $orderItem)
    {
        $this->ticketPayment = TicketPayment::query()
        ->where('order_item_id', $orderItem->id)->first();
    }

    public function submit()
    {
        try {
            $this->validate();
            $this->ticketPayment->payment_status = OrderItemStatus::APPROVED;
            $this->ticketPayment->confirmed_at = now();
            $this->ticketPayment->confirmed_by = auth()->id();
            if ($this->ticketPayment->save()) {
                $this->ticketPayment->orderItem->update(['status' => OrderItemStatus::PAID]);

                $order = $this->ticketPayment->orderItem?->order;

                $receiptUrl = GeneratePaymentReceipt::run($order);

                $this->ticketPayment->user?->notify(new PaymentNotification($order));

                $this->ticketPayment->orderItem?->order?->update(
                    [
                        'status' => OrderStatus::SETTLED,
                        'payment_method' => $this->ticketPayment->mode,
                        'transaction_reference' => $this->ticketPayment->reference,
                        'receipt_sent_at' => now(),
                        'receipt_url' => $receiptUrl,
                    ]);
            }
            $this->dispatch('success', 'Ticket updated successfully');
        } catch(\Throwable $e) {
            $this->dispatch('error', $e->getMessage());
        }
        //$this->reset();
    }
}
