<?php

namespace App\Http\Livewire\Events;

use App\Models\Event;
use Livewire\Component;

class CheckinModal extends Component
{
    public function render()
    {
        $events = Event::query()->whereDate('start_date','<=', now())->get();
        return view('livewire.events.checkin-modal', compact('events'));
    }
}
