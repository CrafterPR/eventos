<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class CreateEvent extends Component
{
    public Event $event;

    protected $rules = [
        'event.title' => ['required', 'max:255'],
        'event.theme' => ['required', 'max:255'],
        'event.organization' => ['required'],
        'event.start_date' => ['date', 'after:today'],
        'event.end_date' => ['date', 'after:event.start_date'],

    ];

    public function mount()
    {
        $this->event = new Event;
    }
    public function render()
    {
        return view('livewire.events.create-event');
    }

    public function submit()
    {
        try {
            $this->validate();
            $this->event->save();
            $this->dispatch('success', 'Event registered successfully');
        } catch(\Throwable $e) {
            $this->dispatch('error', $e->getMessage());
        }
        //$this->reset();
    }

}
