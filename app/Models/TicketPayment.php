<?php

namespace App\Models;

use App\Enum\BookingConfirmationStatus;
use App\Enum\PaymentStatus;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Models\Audit;

/**
 * App\Models\TicketPayment
 *
 * @property int $id
 * @property string|null $serial
 * @property int|null $user_id
 * @property int|null $summit_id
 * @property int|null $ticket_id
 * @property int|null $order_id
 * @property int|null $order_item_id
 * @property string $delegate_name
 * @property string|null $delegate_email
 * @property string|null $delegate_organization
 * @property PaymentStatus $payment_status
 * @property BookingConfirmationStatus $confirmation_status
 * @property string|null $confirmed_at
 * @property int|null $confirmed_by
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User|null $confirmedBy
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\OrderItem|null $orderItem
 * @property-read \App\Models\Summit|null $summit
 * @property-read \App\Models\Ticket|null $ticket
 * @property-read \App\Models\User|null $user
 * @method static Builder|TicketPayment newModelQuery()
 * @method static Builder|TicketPayment newQuery()
 * @method static Builder|TicketPayment query()
 * @method static Builder|TicketPayment whereConfirmationStatus($value)
 * @method static Builder|TicketPayment whereConfirmedAt($value)
 * @method static Builder|TicketPayment whereConfirmedBy($value)
 * @method static Builder|TicketPayment whereCreatedAt($value)
 * @method static Builder|TicketPayment whereDelegateEmail($value)
 * @method static Builder|TicketPayment whereDelegateName($value)
 * @method static Builder|TicketPayment whereDelegateOrganization($value)
 * @method static Builder|TicketPayment whereId($value)
 * @method static Builder|TicketPayment whereNotes($value)
 * @method static Builder|TicketPayment whereOrderId($value)
 * @method static Builder|TicketPayment whereOrderItemId($value)
 * @method static Builder|TicketPayment wherePaymentStatus($value)
 * @method static Builder|TicketPayment whereSerial($value)
 * @method static Builder|TicketPayment whereSummitId($value)
 * @method static Builder|TicketPayment whereTicketId($value)
 * @method static Builder|TicketPayment whereUpdatedAt($value)
 * @method static Builder|TicketPayment whereUserId($value)
 * @mixin Eloquent
 */
class TicketPayment extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use HasUlids;

    protected $guarded = [];

    protected $casts = [
        "payment_status" => PaymentStatus::class,
        "confirmation_status" => BookingConfirmationStatus::class,
        "booked_at" => "datetime",
        "confirmation_at" => "datetime",
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function confirmedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "confirmed_by");
    }

    public function orderItem(): BelongsTo
    {
        return $this->belongsTo(OrderItem::class);
    }
}
