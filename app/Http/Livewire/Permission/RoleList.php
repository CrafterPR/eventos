<?php

namespace App\Http\Livewire\Permission;

use Illuminate\Database\Eloquent\Collection;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    public array|Collection $roles;

     public function render()
    {
        $this->roles = Role::with('permissions')->get();

        return view('livewire.permission.role-list');
    }

    #[On('success')]
    public function updateRoleList()
    {
        $this->roles = Role::with('permissions')->get();
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
