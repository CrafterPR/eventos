<?php

namespace App\Models;

use App\Enum\Currency;
use App\Enum\EntryType;
use App\Enum\OrderStatus;
use App\Models\Pesaflow\PesaflowRequest;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Order
 *
 * @property int $id
 * @property string $reference
 * @property int $service_code
 * @property int|null $summit_id
 * @property int|null $user_id
 * @property Currency $currency
 * @property string|null $items_total
 * @property string $tax_total
 * @property string $convenience_fee
 * @property string|null $total_amount
 * @property string|null $notes
 * @property string|null $payment_method
 * @property string|null $transaction_reference
 * @property Carbon|null $check_out_completed_at
 * @property Carbon|null $receipt_sent_at
 * @property string|null $receipt_url
 * @property string|null $invoice_sent_at
 * @property OrderStatus $status
 * @property string $entry_type
 * @property int|null $created_by
 * @property string|null $expires_at
 * @property int|null $payment_verified_by
 * @property Carbon|null $payment_verified_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, \App\Models\Booking> $booking
 * @property-read int|null $booking_count
 * @property-read Collection<int, \App\Models\OrderItem> $orderItems
 * @property-read int|null $order_items_count
 * @property-read \App\Models\User|null $paymentVerifiedBy
 * @property-read PesaflowRequest|null $pesaflowRequest
 * @property-read \App\Models\Summit|null $summit
 * @property-read \App\Models\User|null $user
 * @method static \Database\Factories\OrderFactory factory($count = null, $state = [])
 * @method static Builder|Order newModelQuery()
 * @method static Builder|Order newQuery()
 * @method static Builder|Order query()
 * @method static Builder|Order whereCheckOutCompletedAt($value)
 * @method static Builder|Order whereConvenienceFee($value)
 * @method static Builder|Order whereCreatedAt($value)
 * @method static Builder|Order whereCreatedBy($value)
 * @method static Builder|Order whereCurrency($value)
 * @method static Builder|Order whereEntryType($value)
 * @method static Builder|Order whereExpiresAt($value)
 * @method static Builder|Order whereId($value)
 * @method static Builder|Order whereInvoiceSentAt($value)
 * @method static Builder|Order whereItemsTotal($value)
 * @method static Builder|Order whereNotes($value)
 * @method static Builder|Order wherePaymentMethod($value)
 * @method static Builder|Order wherePaymentVerifiedAt($value)
 * @method static Builder|Order wherePaymentVerifiedBy($value)
 * @method static Builder|Order whereReceiptSentAt($value)
 * @method static Builder|Order whereReceiptUrl($value)
 * @method static Builder|Order whereReference($value)
 * @method static Builder|Order whereServiceCode($value)
 * @method static Builder|Order whereStatus($value)
 * @method static Builder|Order whereSummitId($value)
 * @method static Builder|Order whereTaxTotal($value)
 * @method static Builder|Order whereTotalAmount($value)
 * @method static Builder|Order whereTransactionReference($value)
 * @method static Builder|Order whereUpdatedAt($value)
 * @method static Builder|Order whereUserId($value)
 * @mixin Eloquent
 */
class Order extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "status" => OrderStatus::class,
        "check_out_completed_at" => "datetime",
        "receipt_sent_at" => "datetime",
        "payment_verified_at" => "datetime",
        "currency" => Currency::class,
        "entry_type" => EntryType::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function pesaflowRequest(): HasOne
    {
        return $this->hasOne(PesaflowRequest::class, "order_id", "id");
    }

    public function booking(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function summit(): BelongsTo
    {
        return $this->belongsTo(Summit::class);
    }

    public function paymentVerifiedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "payment_verified_by");
    }
}
