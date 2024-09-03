<?php

namespace App\Http\Livewire\User;

use App\Models\User;
use App\Enum\UserType;
use Livewire\Attributes\On;
use Livewire\Component;
use Livewire\WithFileUploads;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Jobs\SendPasswordResetLink;
use Illuminate\Support\Facades\Auth;

class AddUserModal extends Component
{
    use WithFileUploads;

    public $user;
    public $role;
    public $avatar;
    public $saved_avatar;

    public $edit_mode = false;

    protected function rules()
    {
        return [
           'user.first_name' => 'required|string',
           'user.last_name' => 'required|string',
           'user.email' => ['required', 'email:rfc,dns', 'max:255', Rule::unique('users', 'email')->ignore($this->user->id) ],
           'user.mobile' => ['required', Rule::unique('users', 'mobile')->ignore($this->user->id)],
           'role' => 'required|string',
           'avatar' => 'nullable|sometimes|image|max:4096',
    ];
    }

    public function mount()
    {
        $this->user = new User();
    }

    public function render()
    {
        $roles = Role::query()->whereNotIn('name', ['superadmin'])->get();

        $roles_description = [
            'administrator' => 'Best for business owners and company administrators',
            'developer' => 'Best for developers or people primarily using the API',
            'analyst' => 'Best for people who need full access to analytics data, but don\'t need to update business settings',
            'support' => 'Best for employees who regularly refund payments and respond to disputes',
            'trial' => 'Best for people who need to preview content data, but don\'t need to make any updates',
        ];

        foreach ($roles as $i => $role) {
            $roles[$i]->description = $roles_description[$role->name] ?? '';
        }

        return view('livewire.user.add-user-modal', compact('roles'));
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            if ($this->avatar) {
                $this->user->profile_photo_path = $this->avatar->store('avatars', 'public');
            } else {
                $this->user->profile_photo_path = null;
            }

            if (!$this->edit_mode) {
                $password = generate_random_password();
                $this->user->password = $password;
            }

            // Create a new user record in the database


            if ($this->edit_mode) {
                // Assign selected role for user
                $this->user->syncRoles($this->role);

                // Emit a success event with a message
                $this->dispatch('success', __('User has been updated'));
            } else {
                // Assign selected role for user
                $this->user->assignRole($this->role);

                // Emit a success event with a message
                $this->dispatch('success', __('New user has been created'));
            }
            $this->user->save();

            // Send a password reset link to the new user's email
            if (! $this->edit_mode) {
                SendPasswordResetLink::dispatch($this->user->only('email'))->afterCommit();
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
    }

    #[On('delete_user')]
    public function deleteUser(User $user)
    {
        // Prevent deletion of current user
        if ($user->id === Auth::id()) {
            $this->dispatch('error', 'User cannot be deleted');
            return;
        }
        if (in_array($user->id, [1 ,2])) {
            $this->dispatch('error', 'You cannot delete SUPERUSER accounts');
            return;
        }

        // Delete the user record with the specified ID
        $user->delete();

        // Emit a success event with a message
        $this->dispatch('success', 'User successfully deleted');
    }

    #[On('update_user')]
    public function updateUser(User $user)
    {
        $this->edit_mode = true;

        $this->user = $user;

        $this->saved_avatar = $this->user->profile_photo_url;

        $this->role = $this->user->roles?->first()->name ?? '';
    }


    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
