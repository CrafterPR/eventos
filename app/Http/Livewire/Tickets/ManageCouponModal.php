<?php

namespace App\Http\Livewire\Tickets;

use App\Enum\CouponStatus;
use App\Generators\UniqueStringGenerator;
use App\Models\Coupon;
use App\Models\CouponCategory;
use App\Models\Ticket;
use App\Notifications\SendCouponNotification;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Str;
use Livewire\Attributes\On;
use Livewire\Component;

class ManageCouponModal extends Component
{
    public $coupon;

    public Collection $categories;

    public Collection $types;

    protected $rules = [
        'coupon.organization' => ['required'],
        'coupon.no_of_delegates' => ['required', 'integer'],
        'coupon.category_id' => ['sometimes', 'nullable'],
        'coupon.email' => ['required', 'email:dns'],
        'coupon.type_id' => ['required'],
        'coupon.days' => ['required'],
    ];

    public function mount()
    {
        $this->coupon = new Coupon();
        $this->categories = CouponCategory::query()
            ->where('status', CouponStatus::ACTIVE->value)
            ->get();
        $this->types = Ticket::all();
    }

    public function render()
    {
        return view('livewire.tickets.manage-coupon');
    }

    /**
     * @throws \Throwable
     */
    public function submit(): void
    {
        $this->validate();
        DB::transaction(function () {
            $generator = new UniqueStringGenerator();

            $prefix = Str::substr($this->coupon->organization, 0, 2);
            $this->coupon->code = Str::upper($prefix). '-'. $generator->generate(6, false);
            $this->coupon->generated_by = auth()->id();
            $this->coupon->status = CouponStatus::ACTIVE;
            $this->coupon->save();

            $this->dispatch('success', 'Coupon generated and emailed to the delegate successfully');
        });
        $this->coupon = null;
    }

   #[On('send_coupon')]
    public function sendCoupon($id)
    {
        $coupon = Coupon::findOrFail($id);
        if ($coupon) {
            try {

                Notification::route('mail', $coupon->email)
                    ->notify(new SendCouponNotification($coupon));
                $this->dispatch('success', 'Coupon has been send successfully');
            } catch(\Throwable $e) {
                report($e->getMessage());
                $this->dispatch('error', 'Could not send the coupon: '. $e->getMessage());
            }
        }
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }
}
