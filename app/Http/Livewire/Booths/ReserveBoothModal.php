<?php

namespace App\Http\Livewire\Booths;

use App\Actions\GenerateProformaInvoice;
use App\Enum\BookingStatus;
use App\Enum\Currency;
use App\Enum\EntryType;
use App\Enum\UserType;
use App\Generators\UniqueStringGenerator;
use App\Models\Booking;
use App\Models\Booth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Role;
use App\Models\User;
use App\Notifications\SendInvitationNotification;
use App\Notifications\SendProformaInvoiceNotification;
use App\Notifications\WelcomeNotification;
use Exception;
use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ReserveBoothModal extends Component
{
    public Booth $booth;

    public $email;
    public $firstname;
    public $lastname;
    public $institution;
    public $notes;
    public $mobile;
    public $currency = Currency::KES;

    public bool $send_invoice = false;

    public $user = null;
    public $services;
    public $summit;

    protected $listeners = [
        'emit_reserve_booth' => 'updateBooth',
        'revoke_booth_booking' => 'revokeBoothBooking'
    ];

    protected array $rules = [
        'email' => ['required'],
        'firstname' => ['required'],
        'lastname' => ['sometimes'],
        'mobile' => ['sometimes'],
        'institution' => ['required'],
        'currency' => 'sometimes',
        'notes' => 'sometimes',
        'send_invoice' => 'boolean'
    ];

    /**
     * @param Booth $booth
     * @return void
     * @throws Exception
     */
    public function mount(Booth $booth): void
    {
        $this->booth = $booth;
        $this->services = get_payment_services("booth");
        $this->summit = get_current_summit();
    }

    public function render(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        return view('livewire.booths.reserve-booth-modal');
    }

    /**
     * @return void
     * @throws Exception
     */
    public function submit(): void
    {
        $this->validate();

        if (is_string($this->currency)) {
            $this->currency = Currency::from($this->currency);
        }

        $service = $this->services->where("currency", $this->currency->value)->first();
        if (!$service) {
            $this->dispatch("error", "Invalid service or not found");
            return;
        }

        $exists = Booking::query()
            ->where([
                "summit_id" => $this->summit->id,
                "booth_id" => $this->booth->id,
                "booking_status" => BookingStatus::RESERVED
            ])
            ->exists();

        if ($exists) {
            $this->dispatch("error", "The booth has already been booked.");
            return;
        }

        //check if user already exists
        if (!$this->user) {
            try {
                $this->user = $this->createUserAccount();
            } catch (Exception $e) {
                report($e);
                $this->dispatch("error", $e->getMessage());
                return;
            }
        }

        if ($this->currency == Currency::KES) {
            $totalAmount = $this->booth->kes_price;
        } else {
            $totalAmount = $this->booth->usd_price;
        }

        $generator = new UniqueStringGenerator();
        $reference = 'KIW2023/' . $generator->generate(4, false);

        $order = Order::create([
            'user_id' => $this->user->id,
            'service_code' => $service->code,
            'summit_id' => $this->summit->id,
            'reference' => $reference,
            'currency' => $this->currency->value,
            'items_total' => $totalAmount,
            'tax_total' => 0,
            'convenience_fee' => 0,
            'total_amount' => $totalAmount,
            "notes" => $this->notes,
            'entry_type' => EntryType::MANUAL,
            'created_by' => Auth::id(),
            'expires_at' => now()->addDays(5)
        ]);

        //create an order item entry
        $orderItem = OrderItem::create([
            "user_id" => $this->user->id,
            "summit_id" => $this->summit->id,
            "order_id" => $order->id,
            "quantity" => 1,
            "price" => $totalAmount,
            "total" => $totalAmount,
            "currency" => $this->currency->value,
            "itemable_type" => (new Booth())->getMorphClass(),
            "itemable_id" => $this->booth->id,
        ]);

        //create a booking entry
        Booking::create([
            "user_id" => $this->user->id,
            "summit_id" => $this->summit->id,
            "booth_id" => $this->booth->id,
            "notes" => $this->notes,
            "order_id" => $order->id,
            "order_item_id" => $orderItem->id,
            "booking_status" => BookingStatus::RESERVED,
        ]);

        if ($this->send_invoice) {
            if (GenerateProformaInvoice::run($order)) {
                $this->user->notify(new SendProformaInvoiceNotification($order));
            }
        }

        $this->dispatch('success', 'Booth reserved successfully');

        //reset the form
        $this->user = null;
        $this->email = null;
        $this->firstname = null;
        $this->lastname = null;
        $this->institution = null;
        $this->mobile = null;
        $this->dispatch('closeModal');
    }

    /**
     * @return Model|User
     * @throws Exception
     */
    public function createUserAccount(): Model|User
    {
        $password = generate_random_password();

        $user = User::create([
            "email" => $this->email,
            "first_name" => $this->firstname,
            "last_name" => $this->lastname,
            "institution" => $this->institution,
            "mobile" => $this->mobile,
            "user_type" => UserType::EXHIBITOR,
            "password" => $password
        ]);

        $userType = $user->user_type;
        $user->assignRole(Role::findByName($userType->value, "web"));

        //notify user with account credentials
        $user->notify(new SendInvitationNotification());

        event(new Registered($user));

        return $user;
    }

    public function hydrate(): void
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    public function searchUser(): void
    {
        if (isset($this->email)) {
            $this->user = User::where("email", "LIKE", $this->email . "%")->first();

            if ($this->user) {
                $this->firstname = $this->user->first_name;
                $this->lastname = $this->user->last_name;
                $this->institution = $this->user->institution;
                $this->mobile = $this->user->mobile;
            }
        }
    }

    public function revokeBoothBooking($id): void
    {
        $booking = Booking::query()
            ->where('booth_id', $id)
            ->firstOrFail();

        if ($booking) {
            $booking->orderItem?->delete();
            $booking->order?->delete();
            $booking->delete();
        }

        $this->dispatch('success', 'Booth reservation has been cancelled');
    }

    public function updateBooth(Booth $booth): void
    {
        $this->booth = $booth;
    }
}
