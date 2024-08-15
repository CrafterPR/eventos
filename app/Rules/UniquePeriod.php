<?php

namespace App\Rules;

use App\Models\VotingPeriod;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class UniquePeriod implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        // Retrieve the input data
        $dateRange = explode('-', $value);
        $startsAt = format_date($dateRange[0], 'Y-m-d H:i:s');
        $endsAt = format_date($dateRange[1], 'Y-m-d H:i:s');

        // Perform your validation logic here
        $periods = VotingPeriod::query()
            ->where(function ($query) use ($startsAt, $endsAt) {
                $query->where(function ($query) use ($startsAt, $endsAt) {
                    $query->where('starts_at', '>=', $startsAt)
                        ->where('starts_at', '<=', $endsAt);
                })->orWhere(function ($query) use ($startsAt, $endsAt) {
                    $query->where('ends_at', '>=', $startsAt)
                        ->where('ends_at', '<=', $endsAt);
                });
            })->count();
        dd($periods);
            if($periods > 0) {
                $fail("There is a similar period within the date range selected");
            }
    }
}
