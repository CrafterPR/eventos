<?php

namespace App\Http\Livewire\Tickets;

use App\Enum\OrderItemStatus;
use App\Enum\OrderStatus;
use App\Events\TicketApprovedEvent;
use App\Models\OrderItem;
use App\Models\Ticket;
use App\Notifications\PaymentReminderNotification;
use Illuminate\Support\Facades\Log;
use Livewire\Component;
use Throwable;

class ApproveTicketModal extends Component
{

}
