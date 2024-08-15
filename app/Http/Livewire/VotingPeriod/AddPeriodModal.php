<?php

namespace App\Http\Livewire\VotingPeriod;

use App\Enum\VoterStatus;
use App\Enum\VotingPeriodStatus;
use App\Models\Voter;
use App\Models\VotingPeriod;
use App\Notifications\SendSMSNotification;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;
use App\Rules\UniquePeriod;

class AddPeriodModal extends Component
{
    #[Validate('required')]
    #[Validate('unique:voting_periods,election_date')]
    public string $election_date;

    #[Validate('required', message: "Voting period name is required")]
    #[Validate('min:3', message: "Describe a meaningful voting period name")]
    public string $name;

    #[Validate('required')]
    public string $starts_at = '';

    #[Validate('required')]
    public string $ends_at = '';



    public function render(): View
    {
        return view('livewire.voting-periods.add-voting-period');
    }

    public function submit(): void
    {
        // Validate the form input data

        $this->validate();

        try {
            DB::transaction(function () {

                $period = VotingPeriod::create(
                  [
                      'name' => $this->name,
                      'election_date' => $this->election_date,
                      'starts_at' => $this->starts_at,
                      'ends_at' => $this->ends_at,
                      'created_by' => auth()->id(),
                      'status' => VotingPeriodStatus::OPEN->value,
                  ]
              );

                activity()
                    ->causedBy(auth()->id())
                    ->on($period)
                    ->log('Created a voting period');

                $this->dispatch('success', __('The voting period has been created'));

            });

            // Reset the form fields after successful submission
            $this->reset();

        } catch (\Throwable $e) {
            $this->dispatch('success', $e->getMessage());
        }
    }

    #[On('send_reminders')]
    public function sendReminders(VotingPeriod $period)
    {
        $voters = Voter::query()
            ->where('status', VoterStatus::ACTIVE)
            ->get();


        if ($voters) {
            try {
                foreach ($voters as $user) {
                    $user->notify(new SendSMSNotification($period));
                }
                $this->dispatch('success', 'SMS successfully queued for sending!');

            } catch (\Throwable $e) {
                $this->dispatch('error',  $e->getMessage());
            }
        }
    }
    #[On('close_voting')]
    public function close_voting(VotingPeriod $uuid): void
    {
       $uuid->update(['status' => VotingPeriodStatus::CLOSED]);
        activity()
            ->causedBy(auth()->id())
            ->on($uuid)
            ->log('Closed a voting period');

        $this->dispatch('success', __('The voting period has been closed!'));
    }
    #[On('open_voting_period')]
    public function open_voting_period(VotingPeriod $uuid): void
    {
           $uuid->update(['status' => VotingPeriodStatus::OPEN]);
            activity()
                ->causedBy(auth()->id())
                ->on($uuid)
                ->log('Opened a voting period');

            $this->dispatch('success', __('The voting period has been opened!'));
        }
    #[On('delete_period')]
    public function delete_period(VotingPeriod $uuid): void
    {
               $uuid->delete();
                activity()
                    ->causedBy(auth()->id())
                    ->on($uuid)
                    ->log('Deleted a voting period');

                $this->dispatch('success', __('The voting period has been deleted!'));
            }


    public function hydrate(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
