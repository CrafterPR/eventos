<?php

namespace App\Http\Livewire\Tickets;

use App\Models\Ticket;
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

    protected $listeners = [
        'emit_update_ticket' => 'updateTicket'
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

    public function updateTicket(Ticket $ticket)
    {
        $this->ticket = $ticket;
    }
}
