<?php

namespace App\Http\Livewire\Tickets;

use App\Enum\EventStatus;
use App\Models\Event;
use App\Models\Ticket;
use Illuminate\Database\Eloquent\Collection;
use Livewire\Component;

class CreateTicket extends Component
{
    public Ticket $ticket;
    public array|Collection $events;

    protected $rules = [
        'ticket.event_id' => ['required', 'exists:events,id'],
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
        $this->events = Event::where('status', EventStatus::ACTIVE)->get();
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
