<?php

namespace App\Observers;

use App\Models\Coupon;
use App\Models\CouponModification;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;

class CouponObserver
{

    protected mixed $request;

    public function __construct()
    {
        $this->request = app('request');
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     */

    public function saving(Coupon $coupon)
    {
        if ($coupon->isDirty('no_of_delegates')) {
            CouponModification::create([
                'user_id' => auth()->id(),
                'coupon_id' => $coupon->id,
                'initial_value' => $coupon->getOriginal('no_of_delegates'),
                'new_value' => $coupon->no_of_delegates,
                'reason' =>  $this->request->reason,
            ]);
        }
    }
}
