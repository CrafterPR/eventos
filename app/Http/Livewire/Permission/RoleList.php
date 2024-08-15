<?php

namespace App\Http\Livewire\Permission;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleList extends Component
{
    public array|Collection $roles;

    public function render(): View
    {
        $this->roles = Role::with('permissions')->get();

        return view('livewire.permission.role-list');
    }

    #[On('success')]
    public function updateRoleList(): void
    {
        $this->roles = Role::with('permissions')->get();
    }

    public function hydrate(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
