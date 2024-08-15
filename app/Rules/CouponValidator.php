<?php

namespace App\Rules;

use App\Models\Coupon;
use App\Models\UserCoupon;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Translation\PotentiallyTranslatedString;

class CouponValidator implements ValidationRule
{
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if ($value) {
            if (!$coupon = Coupon::query()
                ->where('code', 'LIKE', $value)->first()) {
                $fail("The {$attribute} doesn't exist.");
            } elseif ($coupon->no_of_delegates <= UserCoupon::where('coupon_id', $coupon->id)->count()) {
                $fail("The {$attribute} has reached maximum number of usages");
            }
        }
    }
}
