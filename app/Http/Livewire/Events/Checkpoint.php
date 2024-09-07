<?php

namespace App\Http\Livewire\Events;

use App\Enum\UserStatus;
use App\Models\Role;
use App\Models\User;
use App\Models\Checkpoint as CheckpointModel;
use Livewire\Component;

class Checkpoint extends Component
{
    public CheckpointModel $checkpoint;

    protected $rules = [
        'checkpoint.name' => ['required', 'max:100', 'min:3', 'unique:checkpoints,name,event_id'],
        'checkpoint.event_id' => ['required', 'exists:events,id'],
        'checkpoint.is_gift_checkpoint' => ['sometimes', 'boolean'],
        'checkpoint.leader_id' => ['required_if:is_gift_checkpoint,true', 'exists:users,id'],
    ];

    protected $messages = [
        'checkpoint.leader_id' => 'You must assign an account to a gift checkpoint',
    ];

    public function mount($event_id)
    {
        $this->checkpoint = new CheckpointModel();
        $this->checkpoint->event_id = $event_id;
    }
    public function render()
    {
        $users = User::query()
            ->where('status', UserStatus::ACTIVE)
            ->whereDoesntHave('roles', function ($query) {
                $query->whereIn('name', [Role::SUPER_ADMIN]);
            })
            ->get();
        return view('livewire.events.checkpoint', compact('users'));
    }

    public function submit()
    {
        $this->validate();
        $this->checkpoint->save();
        $this->dispatch('success', 'Checkpoint has been created successfully!');
    }

}
