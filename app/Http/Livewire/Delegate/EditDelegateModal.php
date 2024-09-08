<?php

namespace App\Http\Livewire\Delegate;

use App\Actions\GenerateInvitationLetter;
use App\Enum\CategoryStatus;
use App\Enum\EventStatus;
use App\Enum\UserType;
use App\Models\Affiliation;
use App\Models\Category;
use App\Models\Country;
use App\Models\Delegate;
use App\Models\Event;
use App\Models\User;
use App\Notifications\SendInvitationNotification;
use App\Rules\CouponValidator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Password;
use Illuminate\Validation\Rule;
use Livewire\Attributes\On;
use Livewire\Component;

class EditDelegateModal extends Component
{
    public Delegate $delegate;

    /**
     */
    public Collection $countries;

    public Collection $events;

    public Collection $categories;

    protected function rules(): array
    {
        return [
            'delegate.first_name' => ['required', 'string'],
            'delegate.last_name' => ['required', 'string'],
            'delegate.email' => ['required', 'email:rfc,dns', 'max:255', Rule::unique('delegates', 'email')->ignore($this->delegate->id)],
            'delegate.mobile' => [Rule::unique('delegates', 'mobile')->ignore($this->delegate->id)],
            'delegate.salutation' => ["sometimes"],
            'delegate.category_id' => ['required', 'exists:categories,id'],
            'delegate.country_id' => ['required', 'exists:countries,id'],
            'delegate.county_id' => ['sometimes', 'nullable'],
            'delegate.organization' => ['required', 'max:255'],
            'delegate.event_id' => ['required', 'exists:events,id'],
            'delegate.gender' => ['sometimes'],
        ];
    }

    /**
     * @return void
     */
    public function mount(Delegate $delegate)
    {
        $this->delegate = $delegate;
        $this->categories = Category::query()
               ->where('status', CategoryStatus::ACTIVE)
               ->get();
        $this->countries = Country::orderBy('name')->get();
        $this->events = Event::where('status', EventStatus::ACTIVE)->get();
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function render()
    {
        return view('livewire.delegate.edit-delegate');
    }

    /**
     * @return void
     * @throws \Throwable
     */
    public function submit()
    {
        // Validate the form input data
        $this->validate();

        DB::transaction(function () {
                $this->delegate->save();
                $this->dispatch('success', __('Delegate data has been updated'));

        });
        $this->dispatch('refresh');
    }

    /**
     * @param $id
     * @return void
     */
    public function deleteDelegate($id)
    {
        // Delete the user record with the specified ID
        User::destroy($id);

        // Emit a success event with a message
        $this->dispatch('success', 'Delegate successfully deleted');
    }

    /**
     * @return void
     */
    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
