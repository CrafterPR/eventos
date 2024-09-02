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
    public function render()
    {
        return view('livewire.delegate.print-pass');
    }

    #[On('get_delegate')]
    public function getDelegate(Delegate $delegate): void
    {
        $this->delegate = $delegate;
    }

    #[On('print_pass')]
    public function increment(Delegate $delegate): void
    {
        $delegate->printPass();
        $this->dispatch('success', 'Print pass successfully printed and record updated.');
    }

    public function closeModal()
    {
        $this->dispatch('closeModal');
    }
}
