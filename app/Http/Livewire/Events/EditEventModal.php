<?php

namespace App\Http\Livewire\Events;

use App\Enum\EventStatus;
use App\Models\Event;
use Livewire\Attributes\On;
use Livewire\Component;

class EditEventModal extends Component
{
    public Event $event;

    protected $rules = [
        'event.organization' => ['required'],
        'event.title' => ['required', 'max:255'],
        'event.theme' => ['required', 'max:255'],
        'event.start_date' => ['date', 'after:yesterday'],
        'event.end_date' => ['date', 'after_or_equal:event.start_date'],
        'event.venue' => ['required'],

    ];

    public function mount()
    {
      $this->event = new Event();
    }

    public function render()
    {
        return view('livewire.events.edit-event');
    }

    #[On('update_event')]
    public function updateEvent(Event $event): void
    {
        $this->event = $event;
        $this->dispatch('edit_event', ['event' => $event]);
    }

    public function submit()
    {
        try {
            $this->validate();
            $this->event->status = EventStatus::ACTIVE;
            $this->event->save();
            $this->dispatch('success', 'Event updated successfully');
        } catch(\Throwable $e) {
            $this->dispatch('error', $e->getMessage());
        }
        //$this->reset();
    }

}
