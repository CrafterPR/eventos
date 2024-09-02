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
        if(! Delegate::find($value)->status === DelegateStatus::ACTIVE) {
            $fail('Delegate is not active.');
        }
    }
}
