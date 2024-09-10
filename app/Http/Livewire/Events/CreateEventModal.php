<?php

namespace App\Http\Livewire\Events;

use App\Enum\EventStatus;
use App\Models\Event;
use Livewire\Attributes\On;
use Livewire\Component;

class CreateEventModal extends Component
{
    public Event $event;

    protected $rules = [
        'event.title' => ['required', 'max:255'],
        'event.theme' => ['required', 'max:255'],
        'event.organization' => ['required'],
        'event.start_date' => ['date', 'after:yesterday'],
        'event.end_date' => ['date', 'after_or_equal:event.start_date'],
        'event.venue' => ['required'],
        'event.show_category' => ['sometimes','boolean'],
        'event.footer_text' => ['sometimes', 'max:190'],

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
            $this->event->status = EventStatus::ACTIVE;
            $this->event->save();

            $this->dispatch('success', 'Event registered successfully');
        } catch(\Throwable $e) {
            $this->dispatch('error', $e->getMessage());
        }
        //$this->reset();
    }

    #[On('activate_row')]
    public function activate(Event $event): void
    {
       $event->status = EventStatus::ACTIVE;
       $event->save();
       $this->dispatch('success', 'Event has been activated successfully');
    }
    #[On('inactivate_row')]
        public function deactivate(Event $event)
        {
            if($event->hasActiveCheckins()) {
                 $this->dispatch('error', 'Event cannot be deactivated because delegates have started checkin!');
                return;
            }
           $event->status = EventStatus::INACTIVE;
           $event->save();
           $this->dispatch('success', 'Event has been deactivated successfully');
        }

        #[On('delete_event')]
        public function deleteEvent(Event $event)
        {
            $event->delete();
            $this->dispatch('success', 'Event has been deleted successfully');
        }

}
