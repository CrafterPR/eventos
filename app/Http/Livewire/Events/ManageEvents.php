<?php

namespace App\Http\Livewire\Events;

use Livewire\Component;

class ManageEvents extends Component
{

    public $isEditing = false;

    public function render()
    {
        return view('livewire.events.manage-events');
    }
}
