<?php

namespace App\Http\Livewire\Voter;

use App\Enum\ContestantStatus;
use App\Enum\VoterStatus;
use App\Enum\VotingPeriodStatus;
use App\Models\Voter;
use App\Models\VotingPeriod;
use App\Models\Contestant;
use App\Models\VotingPosition;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use InvalidArgumentException;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddVoterModal extends Component
{

    #[Validate('required', message: "First name id required")]
    #[Validate('min:3', message: "First name must have at least 3 characters")]
    public string $first_name;

    #[Validate('sometimes', message: "Last name must be a string")]
    public string $last_name;

    #[Validate('sometimes', message: "Email name is already used")]
    public string $email;

    #[Validate('required', message: "Phone is required")]
    #[Validate('starts_with:254,0', message: "Phone must start with 254 or 0")]
    #[Validate('unique:voters', message: "Phone has already been used")]
    public string $mobile;



    public function render(): View
    {
        return view('livewire.voter.add-voter');
    }

    public function submit(): void
    {
        // Validate the form input data

        $this->validate();


        try {
            DB::transaction(function () {

                $position = Voter::create(
                  [
                      'first_name' => $this->first_name,
                      'last_name' => $this->last_name,
                      'mobile' => self::modifyPhoneNumber($this->mobile),
                      'email' => $this->email??'',
                      'creator_id' => auth()->id(),
                      'status' => 1,
                  ]
              );

                activity()
                    ->causedBy(auth()->id())
                    ->on($position)
                    ->log('Created a voter');

                $this->dispatch('success', __('The voter has been created'));

            });

            // Reset the form fields after successful submission
            $this->reset();

        } catch (\Throwable $e) {
            $this->dispatch('success', $e->getMessage());
        }
    }

    #[On('disable_voter')]
    public function disable_voter(Voter $uuid): void
    {
       $uuid->update(['status' => VoterStatus::INACTIVE]);
        activity()
            ->causedBy(auth()->id())
            ->on($uuid)
            ->log('Disabled a voter');

        $this->dispatch('success', __('The voter has been deactivated!'));
    }

    #[On('enable_voter')]
    public function enable_voter(Voter $uuid): void
    {
           $uuid->update(['status' => VoterStatus::ACTIVE]);
                  activity()
                ->causedBy(auth()->id())
                ->on($uuid)
                ->log('Enabled a voter');

            $this->dispatch('success', __('The voter has been activated!'));
        }

    #[On('delete_voter')]
        public function delete_voter(Voter $uuid): void
    {
               $uuid->delete();
                activity()
                    ->causedBy(auth()->id())
                    ->on($uuid)
                    ->log('Deleted a voter');

                $this->dispatch('success', __('The voter has been removed!'));
            }


    public function hydrate(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public static function modifyPhoneNumber($no)
    {
        switch (true) {
            case preg_match('#^1\d{8}$#', $no):
            case preg_match('#^7\d{8}$#', $no):
                $no = '+254'.$no;

                break;
            case preg_match('#^01\d{8}$#', $no):
            case preg_match('#^07\d{8}$#', $no):
                $no = '+254'.substr($no, 1);

                break;
            case preg_match('#^+254\d{9}$#', $no):
                break;
            case preg_match('#^00254\d{9}$#', $no):
                $no = substr($no, 2);

                break;
            default:
                throw new InvalidArgumentException('Invalid format supplied');
                break;
        }

        return $no;
    }
}
