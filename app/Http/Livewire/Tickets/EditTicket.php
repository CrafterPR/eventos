<?php

namespace App\Http\Livewire\Tickets;

use App\Enum\OrderItemStatus;
use App\Enum\OrderStatus;
use App\Enum\UserType;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\PaymentReminderNotification;
use Livewire\Attributes\On;
use Livewire\Component;

class EditTicket extends Component
{
    public Ticket $ticket;

    protected $rules = [
        'ticket.title' => ['required'],
        'ticket.covers' => ['required'],
        'ticket.days' => ['required'],
        'ticket.persons' => ['required'],
        'ticket.kes_amount' => ['required'],
        'ticket.usd_amount' => ['required'],
    ];

    public function mount(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }

    public function submit()
    {
        try {
            $this->validate();
            $this->ticket->save();
            $this->dispatch('success', 'Ticket updated successfully');

        } catch(\Throwable $e) {
            $this->dispatch('error', $e->getMessage());
        }
        //$this->reset();
    }

    public function render()
    {
        return view('livewire.tickets.edit-ticket');
    }

    #[On('emit_update_ticket')]
    public function updateTicket(Ticket $ticket)
    {
        $this->ticket = $ticket;
        $this->dispatch('loadCkeditorData', ['content' => $this->ticket['covers']]);
    }

    #[On('approve_ticket')]
    public function approveTicket($ticket): void
    {
        $orderItem = OrderItem::findOrFail($ticket);
        $orderItem->update([
            'status' => OrderItemStatus::APPROVED,
            'ticket_sent_at' => now()]);

        $orderItem->order->fill(['payment_verified_by' => auth()->id(), 'payment_verified_at' => now()])->push();
        $this->dispatch('success', 'Payment approved and Ticket send to Delegate');
    }

    #[On('activate_row')]
    public function activateTicket($ticket): void
    {
        $orderItem = Ticket::findOrFail($ticket);
        $orderItem->update([
            'status' => 'active',
        ]);

        // Emit a success event with a message
        $this->dispatch('success', 'Ticket has been activated successfully');
    }

    #[On('inactivate_row')]
    public function inactivateTicket($ticket): void
    {
        $orderItem = Ticket::findOrFail($ticket);
        $orderItem->update([
            'status' => 'inactive',
        ]);

        // Emit a success event with a message
        $this->dispatch('success', 'Ticket has been inactivated');
    }

    #[On('remind_payment')]
    public function remindPayment($ticket): void
    {
        $orderItem = OrderItem::findOrFail($ticket);
        try {
            if ($orderItem->status == OrderStatus::PENDING->value) {
                if ($this->userDoesntHaveAPaidTicket($orderItem)) {
                    $orderItem->order?->user->notify(new PaymentReminderNotification($orderItem));
                }
            }
        } catch(\Throwable $e) {
            $this->dispatch('warning', 'Cannot sent email: '. $e->getMessage());
        }

        $this->dispatch('success', 'Email reminder for payment has been send to the delegate');
    }

    #[On('un_approve_ticket')]
    public function unApproveTicket($ticket)
    {
        $orderItem = OrderItem::findOrFail($ticket);
        $orderItem->update([
            'status' => OrderItemStatus::PAID
        ]);

        // Emit a success event with a message
        $this->dispatch('success', 'Payment un-approved successfully!');
    }

    #[On('delete_ticket')]
    public function deleteTicket(Ticket $ticket)
    {
        $ticket->delete();
        $this->dispatch('success', 'Ticket has been deleted!');
    }

}
