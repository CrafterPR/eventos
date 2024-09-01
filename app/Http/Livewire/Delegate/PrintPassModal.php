<?php

namespace App\Http\Livewire\Delegate;

use App\Models\Delegate;
use App\Models\User;
use Livewire\Attributes\On;
use Livewire\Component;
use SimpleSoftwareIO\QrCode\Facades\QrCode;

class PrintPassModal extends Component
{
    public Delegate $delegate;
    public  $qrCode;

    public function mount()
    {

    }

    public function render()
    {
        return view('livewire.delegate.print-pass');
    }

    #[On('get_delegate')]
    public function getDelegate(Delegate $delegate): void
    {
        $this->delegate = $delegate;
    }

    public function closeModal()
    {
        $this->dispatch('closeModal');
    }
}
