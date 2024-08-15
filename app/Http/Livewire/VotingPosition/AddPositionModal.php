<?php

namespace App\Http\Livewire\VotingPosition;

use App\Enum\VotingPeriodStatus;
use App\Enum\VotingPositionStatus;
use App\Models\VotingPeriod;
use App\Models\VotingPosition;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Livewire\Attributes\Computed;
use Livewire\Attributes\On;
use Livewire\Attributes\Validate;
use Livewire\Component;

class AddPositionModal extends Component
{
    public string $voting_period;

    public string $title;

    public string $code;


     #[Computed]
    public function votingPeriods(): Collection
     {
       return VotingPeriod::query()
        ->where('status', VotingPeriodStatus::OPEN->value)->get();
    }

    protected function messages(): array
    {
        return [
            'title.unique' => "There exists an active position for that voting period with same name!",
            'code.unique' => "There exists an active position for that voting period with same code!"
        ];
    }
    protected function rules(): array
    {
        return [
            'voting_period' => ['required', 'exists:voting_periods,uuid'],
            'title' => [
                'required',
                Rule::unique('voting_positions')->where(function ($query) {
                    return $query->where('voting_period_uuid', $this->voting_period)
                        ->where('status', VotingPositionStatus::ENABLED->value);
                })
            ],
            'code' => [
                'required',
                Rule::unique('voting_positions')->where(function ($query) {
                    return $query->where('code', $this->code)
                        ->where('voting_period_uuid', $this->voting_period)
                        ->where('status', VotingPositionStatus::ENABLED->value);
                })
            ],
        ];
    }
    public function render(): View
    {
        return view('livewire.voting-position.add-voting-position');
    }

    public function submit(): void
    {
        // Validate the form input data

        $this->validate();


        try {
            DB::transaction(function () {

                $position = VotingPosition::create(
                  [
                      'title' => $this->title,
                      'code' => $this->code,
                      'voting_period_uuid' => $this->voting_period,
                      'created_by' => auth()->id(),
                      'status' => VotingPositionStatus::ENABLED,
                  ]
              );

                activity()
                    ->causedBy(auth()->id())
                    ->on($position)
                    ->log('Created a voting position');

                $this->dispatch('success', __('The voting position has been created'));

            });

            // Reset the form fields after successful submission
            $this->reset();

        } catch (\Throwable $e) {
            $this->dispatch('success', $e->getMessage());
        }
    }

    #[On('disable_position')]
    public function disable_position(VotingPosition $uuid): void
    {
       $uuid->update(['status' => VotingPositionStatus::DISABLED]);
        activity()
            ->causedBy(auth()->id())
            ->on($uuid)
            ->log('Closed a voting position');

        $this->dispatch('success', __('The voting position has been closed!'));
    }

    #[On('enable_position')]
    public function enable_position(VotingPosition $uuid): void
    {
           $uuid->update(['status' => VotingPositionStatus::ENABLED]);
            activity()
                ->causedBy(auth()->id())
                ->on($uuid)
                ->log('Opened a voting position');

            $this->dispatch('success', __('The voting position has been opened!'));
        }

    #[On('delete_position')]
        public function delete_position(VotingPosition $uuid): void
    {
               $uuid->delete();
                activity()
                    ->causedBy(auth()->id())
                    ->on($uuid)
                    ->log('Deleted a voting position');

                $this->dispatch('success', __('The voting position has been deleted!'));
            }


    public function hydrate(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
