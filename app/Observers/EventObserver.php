<?php

namespace App\Observers;

use App\Models\Checkpoint;
use App\Models\Event;

class EventObserver
{
    public function created(Event $event): void
    {
       Checkpoint::create([
           'name' => 'Main Entrance',
           'event_id' => $event->id,
           'is_active' => true,
       ]);
    }
}
