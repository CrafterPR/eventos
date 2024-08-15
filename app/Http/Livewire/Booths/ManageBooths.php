<?php

namespace App\Http\Livewire\Booths;

use App\Models\Booth;
use Livewire\Component;

class ManageBooths extends Component
{
    public $booth;

    public function mount()
    {

    }
    public function render()
    {
        return view('livewire.booths.manage-booths');
    }
}
