<?php

namespace App\Models;

use App\Enum\Currency;
use App\Enum\OrderItemStatus;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\OrderItem
 *
 * @property int $id
 * @property string|null $reference_no
 * @property int|null $user_id
 * @property int $order_id
 * @property int|null $summit_id
 * @property int $quantity
 * @property string $price
 * @property string $total
 * @property string|null $status
 * @property Currency $currency
 * @property string $itemable_type
 * @property int $itemable_id
 * @property string|null $ticket_url
 * @property string|null $ticket_sent_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Model|\Eloquent $itemable
 * @property-read \App\Models\Order $order
 * @property-read \App\Models\Summit|null $summit
 * @property-read \App\Models\User|null $user
 * @method static Builder|OrderItem newModelQuery()
 * @method static Builder|OrderItem newQuery()
 * @method static Builder|OrderItem query()
 * @method static Builder|OrderItem whereCreatedAt($value)
 * @method static Builder|OrderItem whereCurrency($value)
 * @method static Builder|OrderItem whereId($value)
 * @method static Builder|OrderItem whereItemableId($value)
 * @method static Builder|OrderItem whereItemableType($value)
 * @method static Builder|OrderItem whereOrderId($value)
 * @method static Builder|OrderItem wherePrice($value)
 * @method static Builder|OrderItem whereQuantity($value)
 * @method static Builder|OrderItem whereReferenceNo($value)
 * @method static Builder|OrderItem whereStatus($value)
 * @method static Builder|OrderItem whereSummitId($value)
 * @method static Builder|OrderItem whereTicketSentAt($value)
 * @method static Builder|OrderItem whereTicketUrl($value)
 * @method static Builder|OrderItem whereTotal($value)
 * @method static Builder|OrderItem whereUpdatedAt($value)
 * @method static Builder|OrderItem whereUserId($value)
 * @property string|null $event_id
 * @method static Builder|OrderItem whereEventId($value)
 * @mixin Eloquent
 */
class OrderItem extends Model
{
    use HasFactory;
    use HasUlids;

    protected $guarded = [];

    protected $casts = [
        "currency" => Currency::class,
    ];

    public function summit(): BelongsTo
    {
        return $this->belongsTo(Summit::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class, 'order_id', 'id');
    }

    /**
     * @return MorphTo
     */
    public function itemable(): MorphTo
    {
        return $this->morphTo();
    }
}
