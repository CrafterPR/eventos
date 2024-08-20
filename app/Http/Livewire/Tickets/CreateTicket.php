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

class CreateTicket extends Component
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

    public function mount()
    {
        $this->ticket = new Ticket;
    }

    public function submit()
    {
        try {
            $this->validate();
            $this->ticket->save();
            $this->dispatch('success', 'Ticket created successfully');
        } catch(\Throwable $e) {
            $this->dispatch('error', $e->getMessage());
        }
        //$this->reset();
    }

    public function render()
    {
        return view('livewire.tickets.create-ticket');
    }
}
