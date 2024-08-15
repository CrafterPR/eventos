<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use App\Models\Programme;
use App\Models\Speaker;
use Illuminate\Support\Collection;
use Livewire\Component;

class EventModal extends Component
{
    public Event $event;

    public $showModal = false;

    public Collection $speakers;
    public Collection $programmes;

    protected $rules = [
        'event.title' => 'required|string',
        'event.start' => 'required',
        'event.end' => 'required',
        'event.programme_id' => 'required|exists:programmes,id',
        'event.speaker_id' => 'required|exists:speakers,id',
    ];

    // This is the list of listeners that this component listens to.
    protected $listeners = [
        'modal.show.event_name' => 'mountEvent',
        'delete_event' => 'delete'
    ];

    public function render()
    {
        return view('livewire.events.event-modal');
    }

    public function mount()
    {
        $this->speakers = Speaker::all();
        $this->programmes = Programme::all();
    }

    public function mountEvent(Event $event)
    {
        $this->showModal = true;
        $this->event = $event;
    }

    public function submit()
    {
        $this->validate();
        $this->event->save();

        // Emit a success event with a message indicating that the permissions have been updated.
        $this->dispatch('success', 'Event updated');
        $this->dispatch('closeModal');
    }

    public function delete(Event $event)
    {

        if (!is_null($event)) {
            $event->delete();
        }

        $this->dispatch('success', 'Event deleted');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
