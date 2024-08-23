<?php

namespace App\Models;

use App\Enum\BookingConfirmationStatus;
use App\Enum\BookingStatus;
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
 * App\Models\Booking
 *
 * @property int $id
 * @property int|null $user_id
 * @property int|null $summit_id
 * @property int|null $booth_id
 * @property int|null $order_id
 * @property int|null $order_item_id
 * @property BookingStatus $booking_status
 * @property PaymentStatus $payment_status
 * @property BookingConfirmationStatus $confirmation_status
 * @property string|null $confirmed_at
 * @property int|null $confirmed_by
 * @property string|null $notes
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property string|null $deleted_at
 * @property-read Collection<int, Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Booth|null $booth
 * @property-read \App\Models\User|null $confirmedBy
 * @property-read \App\Models\Order|null $order
 * @property-read \App\Models\OrderItem|null $orderItem
 * @property-read \App\Models\Summit|null $summit
 * @property-read \App\Models\User|null $user
 * @method static Builder|Booking newModelQuery()
 * @method static Builder|Booking newQuery()
 * @method static Builder|Booking query()
 * @method static Builder|Booking whereBookingStatus($value)
 * @method static Builder|Booking whereBoothId($value)
 * @method static Builder|Booking whereConfirmationStatus($value)
 * @method static Builder|Booking whereConfirmedAt($value)
 * @method static Builder|Booking whereConfirmedBy($value)
 * @method static Builder|Booking whereCreatedAt($value)
 * @method static Builder|Booking whereDeletedAt($value)
 * @method static Builder|Booking whereId($value)
 * @method static Builder|Booking whereNotes($value)
 * @method static Builder|Booking whereOrderId($value)
 * @method static Builder|Booking whereOrderItemId($value)
 * @method static Builder|Booking wherePaymentStatus($value)
 * @method static Builder|Booking whereSummitId($value)
 * @method static Builder|Booking whereUpdatedAt($value)
 * @method static Builder|Booking whereUserId($value)
 * @property string|null $event_id
 * @method static Builder|Booking whereEventId($value)
 * @mixin Eloquent
 */
class Booking extends Model implements Auditable
{
    use HasFactory;
    use \OwenIt\Auditing\Auditable;
    use HasUlids;

    protected $guarded = [];

    protected $casts = [
        "booking_status" => BookingStatus::class,
        "payment_status" => PaymentStatus::class,
        "confirmation_status" => BookingConfirmationStatus::class,
        "booked_at" => "datetime",
        "confirmation_at" => "datetime",
    ];

    //in minutes
    const RESERVATION_TIME = 15;

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function summit(): BelongsTo
    {
        return $this->belongsTo(Summit::class);
    }

    public function booth(): BelongsTo
    {
        return $this->belongsTo(Booth::class);
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
