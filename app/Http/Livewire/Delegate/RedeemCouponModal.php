<?php

namespace App\Http\Livewire\Delegate;

use App\Models\Coupon;
use App\Models\User;
use App\Models\UserCoupon;
use App\Rules\CouponValidator;
use Exception;
use Livewire\Attributes\On;
use Livewire\Component;

class RedeemCouponModal extends Component
{
    public $code;

    public User $user;

    protected function rules()
    {
        return ['code' => ['required', new CouponValidator()]];
    }

    public function render()
    {
        return view('livewire.delegate.reedem-coupon');
    }


    /**
     * @throws Exception
     */
    public function submit()
    {
        $this->validate();

        $coupon = Coupon::where('code', $this->code)->first();

        if (UserCoupon::query()
            ->where('user_id',  $this->user->id)
            ->where('coupon_id', $coupon->id)
            ->exists()) {
            throw new Exception('User has already redeemed this coupon', 401);
        }

        UserCoupon::create(['user_id' => $this->user->id, 'coupon_id' => $coupon->id]);

        $this->dispatch('success', __('You have redeemed the coupon for the delegate!'));
        $this->reset('code');
    }

    #[On('redeem_coupon')]
    public function redeemCoupon(User $user)
    {
        $this->code = '';
        $this->user = $user;
    }
}
