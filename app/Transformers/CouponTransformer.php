<?php

namespace App\Transformers;

use App\Models\County;
use App\Models\Coupon;
use League\Fractal\TransformerAbstract;

class CouponTransformer extends TransformerAbstract
{

    /**
     * A Fractal transformer.
     *
     * @param Coupon $coupon
     * @return array
     */
    public function transform(Coupon $coupon): array
    {
        return [
            "id" => $coupon->id,
            "code" => $coupon->code,
            "organization" => $coupon->organization,
            "type" => $coupon->type,
        ];
    }
}
