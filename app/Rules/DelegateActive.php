<?php

namespace App\Rules;

use App\Enum\DelegateStatus;
use App\Models\Delegate;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class DelegateActive implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $delegate = Delegate::find($value);
        if($delegate) {
            if (! $delegate->status === DelegateStatus::ACTIVE) {
                $fail('This Delegate is not active.');
            }
        }
    }
}
