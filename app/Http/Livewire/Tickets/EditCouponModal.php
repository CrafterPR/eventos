<?php

namespace App\Http\Livewire\Tickets;

use App\Models\Coupon;
use App\Models\CouponModification;
use App\Rules\ValidateCouponUpdate;
use Livewire\Component;

class EditCouponModal extends Component
{
    public Coupon $coupon;

    public CouponModification $couponMods;

    public $initial_value;

    public $reason ='';

    protected $listeners = [
        'edit_coupon' =>  'updateCoupon'
    ];

    protected function rules()
    {
        return [
            'coupon.no_of_delegates' => ['required', 'integer'],
            'reason' => ['required', 'string'],
            'coupon' => [new ValidateCouponUpdate()],
        ];
    }

    public function mount()
    {
        $this->coupon = new Coupon;
        $this->couponMods = new CouponModification;
        $this->initial_value = $this->coupon->no_of_delegates;
    }

    public function render()
    {
        return view('livewire.tickets.edit-coupon-modal');
    }

    public function submit()
    {
        $this->validate();

        $this->coupon->save();

        $this->dispatch('success', 'Coupon capacity has been updated');
        $this->dispatch('closeModal');
    }

    public function updateCoupon(Coupon $coupon)
    {
        $this->coupon = $coupon;
        $this->couponMods->initial_value = $this->coupon->no_of_delegates;
    }
}
