<?php

namespace App\Http\Livewire\Delegate;

use Livewire\Component;

class ImportDelegates extends Component
{
    public function render()
    {
        return view('livewire.delegate.import-delegates')->layout('layouts.base');
    }
}
