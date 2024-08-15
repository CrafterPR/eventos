<?php

namespace App\Http\Livewire\VotingContestant;

use App\Enum\ContestantStatus;
use App\Enum\VotingPeriodStatus;
use App\Models\VotingPeriod;
use App\Models\Contestant;
use App\Models\VotingPosition;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddContestantModal extends Component
{
    public string $full_name;

    #[Validate('required', message: "period id required")]
    public string $period;

    #[Validate('required', message: "position id required")]
    public string $position;

    public string $unique_code;


     #[Computed]
    public function votingPeriods(): Collection
     {
       return VotingPeriod::query()
        ->where('status', VotingPeriodStatus::OPEN->value)->get();
    }

    #[Computed]
    public function votingPositions(): Collection
    {
        return collect();
    }

    #[On('get-positions')]
    public function positions($uuid): void
    {
        $this->votingPositions =  VotingPosition::query()
            ->where('voting_period_uuid', 'LIKE', $uuid)
            ->where('status', ContestantStatus::ENABLED->value)->get();
    }

    protected function messages(): array
    {
        return [
            'full_name.unique' => "The contestant exists for that period and position!",
            'full_name.required' => "The name of contestant is compulsory!",
            'unique_code.unique' => "The code is assigned to another contestant!"
        ];
    }
    protected function rules(): array
    {
        return [
            'full_name' => [
                'required',
                Rule::unique('contestants')->where(function ($query) {
                    return $query->where('voting_period_uuid', $this->period)
                                 ->where('voting_position_uuid', $this->position)
                                 ->where('status', ContestantStatus::ENABLED->value);
                })
            ],
            'unique_code' => [
                'required',
                Rule::unique('contestants')->where(function ($query) {
                    return $query->where('voting_period_uuid', $this->period)
                        ->where('voting_position_uuid', $this->position)
                        ->where('status', ContestantStatus::ENABLED->value);
                })
            ],
        ];
    }
    public function render(): View
    {
        return view('livewire.voting-contestant.add-voting-contestant');
    }

    public function submit(): void
    {
        // Validate the form input data

        $this->validate();


        try {
            DB::transaction(function () {

                $position = Contestant::create(
                  [
                      'full_name' => $this->full_name,
                      'unique_code' => $this->unique_code,
                      'voting_period_uuid' => $this->period,
                      'voting_position_uuid' => $this->position,
                      'created_by' => auth()->id(),
                      'status' => ContestantStatus::ENABLED,
                  ]
              );

                activity()
                    ->causedBy(auth()->id())
                    ->on($position)
                    ->log('Created a contestant');

                $this->dispatch('success', __('The contestant has been created'));

            });

            // Reset the form fields after successful submission
            $this->reset();

        } catch (\Throwable $e) {
            $this->dispatch('success', $e->getMessage());
        }
    }

    #[On('disable_contestant')]
    public function disable_contestant(Contestant $uuid): void
    {
       $uuid->update(['status' => ContestantStatus::DISABLED]);
        activity()
            ->causedBy(auth()->id())
            ->on($uuid)
            ->log('Disabled a contestant');

        $this->dispatch('success', __('The contestant has been deactivated!'));
    }

    #[On('enable_contestant')]
    public function enable_contestant(Contestant $uuid): void
    {
           $uuid->update(['status' => ContestantStatus::ENABLED]);
            activity()
                ->causedBy(auth()->id())
                ->on($uuid)
                ->log('Enabled a contestant');

            $this->dispatch('success', __('The contestant has been activated!'));
        }

    #[On('delete_contestant')]
        public function delete_contestant(Contestant $uuid): void
    {
               $uuid->delete();
                activity()
                    ->causedBy(auth()->id())
                    ->on($uuid)
                    ->log('Deleted a contestant');

                $this->dispatch('success', __('The contestant has been removed!'));
            }


    public function hydrate(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
