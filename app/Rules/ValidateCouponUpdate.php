<?php

namespace App\Rules;

use App\Models\Coupon;
use App\Models\UserCoupon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class ValidateCouponUpdate implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value) {
            if ($value['no_of_delegates'] < UserCoupon::where('coupon_id', $value['id'])->count()) {
                $fail("The coupon usage already exceeds the new value");
            }
        }
    }
}
