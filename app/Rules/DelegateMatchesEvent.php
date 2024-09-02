<?php

namespace App\Rules;

use App\Enum\EventStatus;
use App\Models\Delegate;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;

class DelegateMatchesEvent implements ValidationRule, DataAwareRule
{
    protected array $data = [];

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $delegateEvent = Delegate::with('event')->find($value);

        if ($delegateEvent) {
            if($delegateEvent->status !== EventStatus::ACTIVE) {
                $fail("Delegate is registered, but event has been deactivated");

            } else {
                $currentEventId = $this->data['event_id'];
                if ($delegateEvent->event_id !== $currentEventId) {
                    $fail("Delegate is registered to a different event: ({$delegateEvent->event->title})");
                }
            }
        }

    }

   public function setData(array $data): void
    {
        $this->data = $data;
    }
}
