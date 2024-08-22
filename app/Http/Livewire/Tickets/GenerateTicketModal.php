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
use Livewire\Attributes\On;
use Livewire\Component;

class GenerateTicketModal extends Component
{
    public $orderItem;

    public Collection $users;

    public Collection $tickets;

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
