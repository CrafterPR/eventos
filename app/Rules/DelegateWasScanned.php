<?php

namespace App\Rules;

use App\Models\Checkin;
use Closure;
use Illuminate\Contracts\Validation\DataAwareRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class DelegateWasScanned implements ValidationRule, DataAwareRule
{

    protected array $data = [];
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {

       if( Checkin::query()
            ->with('checkpoint')
            ->where('checkpoint_id',  $this->data['checkpoint_id'])
            ->where('checkin_date', $this->data['checkin_date'])
            ->where('delegate_id', $value)->exists()) {
           $fail("Delegate has already been checked in at this checkpoint.");
       }
    }

    public function setData(array $data): void
    {
        $this->data = $data;
    }
}
