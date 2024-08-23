<?php

namespace App\Http\Livewire\Delegate;

use App\Actions\GenerateInvitationLetter;
use App\Enum\CategoryStatus;
use App\Enum\UserType;
use App\Models\Affiliation;
use App\Models\Category;
use App\Models\Country;
use App\Models\User;
use App\Notifications\SendInvitationNotification;
use App\Rules\CouponValidator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class AddDelegateModal extends Component
{
    public $delegate;

    public $edit_mode = false;
    /**
     */
    public Collection $affiliations;

    public Collection $countries;

    public Collection $categories;

    protected function rules(): array
    {
        return [
            'delegate.first_name' => ['required', 'string'],
            'delegate.last_name' => ['required', 'string'],
            'delegate.email' => ['required', 'email:rfc,dns', 'max:255', Rule::unique('users', 'email')->ignore($this->delegate->id)],
            'delegate.mobile' => [Rule::unique('users', 'mobile')->ignore($this->delegate->id)],
            'delegate.salutation' => ["sometimes"],
            'delegate.country_id' => ['required', 'exists:countries,id'],
            'delegate.institution' => ['required', 'max:255'],
            'delegate.gender' => ['required'],
        ];
    }


    public function mount()
    {
        $this->delegate = new User();
        $this->categories = Category::query()
               ->where('status', CategoryStatus::ACTIVE)
               ->get();
        $this->affiliations = Affiliation::get();
        $this->countries = Country::orderBy('name')->get();
    }

    public function render()
    {
        return view('livewire.delegate.add-delegate');
    }

    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
            if (!$this->edit_mode) {
                $password = generate_random_password();
                $this->delegate->password = $password;
            }

            // Create a new delegate record in the database

            if ($this->edit_mode) {
                // Assign selected role for delegate
                // Emit a success event with a message
                $this->delegate->save();
                $this->dispatch('success', __('Delegate has been updated'));
            } else {
                // Assign selected role for user
                $this->delegate->assignRole(UserType::DELEGATE->value);

                $this->delegate->user_type = UserType::DELEGATE->value;

                // Send a password reset link to the delegate's email
                Password::sendResetLink($this->delegate->only('email', 'password'));
                if (GenerateInvitationLetter::run($this->delegate)) {
                    $this->delegate->notify(new SendInvitationNotification());
                    $this->delegate->update(['invitation_sent' => true]);
                }
                // Emit a success event with a message
                $this->dispatch('success', __('The delegate has been created'));
            }
        });

        // Reset the form fields after successful submission
        $this->reset();
        $this->dispatch('closeModal');
    }

    #[On('update_delegate')]
    public function deleteDelegate($id)
    {
        // Delete the user record with the specified ID
        User::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Delegate successfully deleted');
    }

    public function updateDelegate($id)
    {
        $this->edit_mode = true;

        $this->delegate = User::find($id);
    }



    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
