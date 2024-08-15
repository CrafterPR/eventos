<?php

namespace App\Http\Livewire\Tickets;

use App\Enum\Currency;
use App\Enum\OrderItemStatus;
use App\Enum\OrderStatus;
use App\Enum\UserType;
use App\Events\TicketApprovedEvent;
use App\Generators\UniqueStringGenerator;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Models\User;
use App\Notifications\PaymentReminderNotification;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class GenerateTicketModal extends Component
{
    public $orderItem;

    public Collection $users;

    public Collection $tickets;

    protected $listeners =  [
        'un_approve_ticket' => 'unApproveTicket',
        'approve_ticket' => 'approveTicket',
        'remind_payment' => 'remindPayment',
        'activate_row' => 'activateTicket',
        'inactivate_row' => 'inactivateTicket',
    ];



    public function approveTicket($id): void
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update([
            'status' => OrderItemStatus::APPROVED,
            'ticket_sent_at' => now()]);

        $orderItem->order->fill(['payment_verified_by' => auth()->id(), 'payment_verified_at' => now()])->push();

        //event(new TicketApprovedEvent($orderItem));

        // Emit a success event with a message
        $this->dispatch('success', 'Payment approved and Ticket send to Delegate');
    }

    public function activateTicket($id): void
    {
        $orderItem = Ticket::findOrFail($id);
        $orderItem->update([
            'status' => 'active',
        ]);

        // Emit a success event with a message
        $this->dispatch('success', 'Ticket has been activated successfully');
    }
    public function inactivateTicket($id): void
    {
        $orderItem = Ticket::findOrFail($id);
        $orderItem->update([
            'status' => 'inactive',
        ]);

        // Emit a success event with a message
        $this->dispatch('info', 'Ticket has been inactivated');
    }

    public function remindPayment($id): void
    {
        $orderItem = OrderItem::findOrFail($id);
        try {
            if ($orderItem->status == OrderStatus::PENDING->value) {
                if ($this->userDoesntHaveAPaidTicket($orderItem)) {
                    $orderItem->order?->user->notify(new PaymentReminderNotification($orderItem));
                }
            }
        } catch(\Throwable $e) {
            $this->dispatch('warning', 'Cannot sent email: '. $e->getMessage());
        }

        $this->dispatch('success', 'Email reminder for payment has been send to the delegate');
    }
    public function unApproveTicket($id)
    {
        $orderItem = OrderItem::findOrFail($id);
        $orderItem->update([
            'status' => OrderItemStatus::PAID
        ]);

        // Emit a success event with a message
        $this->dispatch('success', 'Payment un-approved successfully!');
    }
    public function mount()
    {
        $this->users = User::query()
        ->where('user_type', UserType::DELEGATE->value)
        ->get();

        $this->tickets = Ticket::query()
        ->where('status', 'active')
        ->get();

        $this->orderItem = new OrderItem();
    }

    /**
     * @return Application|Factory|View|\Illuminate\Foundation\Application
     */
    public function render()
    {
        return view('livewire.tickets.generate-ticket');
    }

    /**
     * @throws \Exception
     */
    public function submit()
    {
        $this->validate();
        DB::transaction(function () {
            $generator = new UniqueStringGenerator();
            $reference = 'KEN' . $generator->generate(6, false);

            $ticket = Ticket::findOrFail($this->orderItem->itemable_id);
            $amount = $this->orderItem->currency == Currency::KES->value ? $ticket->kes_amount : $ticket->usd_amount;
            $order = Order::create([
                'user_id' => $this->orderItem->user_id,
                'service_code' => "3890085",
                'summit_id' => get_current_summit()->id,
                'reference' => $reference,
                'currency' => $this->orderItem->currency,
                'items_total' => $amount * $this->orderItem->quantity,
                'tax_total' => 0,
                'convenience_fee' => 0,
                'total_amount' => $amount * $this->orderItem->quantity
            ]);
            $this->orderItem->order_id = $order->id;

            $this->orderItem->reference_no = $generator->generate(6, false);
            $this->orderItem->summit_id = get_current_summit()->id;
            $this->orderItem->price = $amount * $this->orderItem->quantity;
            $this->orderItem->total = $amount * $this->orderItem->quantity;
            $this->orderItem->itemable_type = (new Ticket)->getMorphClass();
            $this->orderItem->status = OrderItemStatus::RAISED->value;
            $this->orderItem->save();
            $this->dispatch('success', 'Ticket generated and emailed to the delegate successfully');
            $this->dispatch('closeModal');
        });
        //$this->reset();
    }

    public function hydrate()
    {
        $this->resetErrorBag();
        $this->resetValidation();
    }

    protected function messages()
    {
        return [
            'orderItem.user_id.required' => 'Please select the delegate',
            'orderItem.itemable_id.required' => 'Please select the ticket type',
            'orderItem.quantity.required' => 'Please select the no of tickets',
            'orderItem.currency.required' => 'Please select the currency',
        ];
    }
    protected function rules(): array
    {
        return [
            'orderItem.user_id' => ['required', 'exists:users,id,user_type,'.UserType::DELEGATE->value],
            'orderItem.itemable_id' => ['required', 'exists:tickets,id'],
            'orderItem.quantity' => ['required', 'digits_between:1,5'],
            'orderItem.currency' => ['required'],
        ];
    }

    protected function userDoesntHaveAPaidTicket($orderItem): bool
    {
        return OrderItem::query()
            ->where('user_id', $orderItem->user_id)
            ->where('status', OrderItemStatus::PAID)
            ->where('itemable_type', $orderItem->itemeable_type)
            ->exists();
    }
}
