<?php

namespace App\Http\Livewire\Permission;

use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Permission;

class PermissionModal extends Component
{
    public $name;

    public Permission $permission;

    protected $rules = [
        'name' => 'required|string',
    ];


    public function render()
    {
        return view('livewire.permission.permission-modal');
    }
    #[On('modal.show.permission_name')]
    public function mountPermission($permission_name = '')
    {
        if (empty($permission_name)) {
            // Create new
            $this->permission = new Permission;
            $this->name = '';
            return;
        }

        // Get the role by name.
        $permission = Permission::where('name', $permission_name)->first();
        if (is_null($permission)) {
            $this->dispatch('error', 'The selected permission [' . $permission_name . '] is not found');
            return;
        }

        $this->permission = $permission;

        // Set the name and checked permissions properties to the role's values.
        $this->name = $this->permission->name;
    }

    public function submit(): void
    {
        $this->validate();

        $this->permission->name = strtolower($this->name);
        if ($this->permission->isDirty()) {
            $this->permission->save();
        }

        // Emit a success event with a message indicating that the permissions have been updated.
        $this->dispatch('success', 'Permission updated');
    }

    #[On('delete_permission')]
    public function delete($name): void
    {
        $permission = Permission::where('name', $name)->first();

        if (!is_null($permission)) {
            $permission->delete();
        }

        $this->dispatch('success', 'Permission deleted');
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
