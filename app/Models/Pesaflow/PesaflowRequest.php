<?php

namespace App\Models\Pesaflow;

use App\Enum\Currency;
use App\Enum\PaymentStatus;
use App\Models\Order;
use App\Models\User;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Carbon;

/**
 * App\Models\Pesaflow\PesaflowRequest
 *
 * @property int $id
 * @property string $api_client_id
 * @property string $service_id
 * @property Currency $currency
 * @property string $amount_expected
 * @property array $payload
 * @property string|null $invoice_number
 * @property string|null $invoice_link
 * @property PaymentStatus $status
 * @property int|null $user_id
 * @property int|null $order_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Order|null $order
 * @property-read \App\Models\Pesaflow\PesaflowResponse|null $pesaflowResponse
 * @property-read User|null $user
 * @method static Builder|PesaflowRequest newModelQuery()
 * @method static Builder|PesaflowRequest newQuery()
 * @method static Builder|PesaflowRequest query()
 * @method static Builder|PesaflowRequest whereAmountExpected($value)
 * @method static Builder|PesaflowRequest whereApiClientId($value)
 * @method static Builder|PesaflowRequest whereCreatedAt($value)
 * @method static Builder|PesaflowRequest whereCurrency($value)
 * @method static Builder|PesaflowRequest whereId($value)
 * @method static Builder|PesaflowRequest whereInvoiceLink($value)
 * @method static Builder|PesaflowRequest whereInvoiceNumber($value)
 * @method static Builder|PesaflowRequest whereOrderId($value)
 * @method static Builder|PesaflowRequest wherePayload($value)
 * @method static Builder|PesaflowRequest whereServiceId($value)
 * @method static Builder|PesaflowRequest whereStatus($value)
 * @method static Builder|PesaflowRequest whereUpdatedAt($value)
 * @method static Builder|PesaflowRequest whereUserId($value)
 * @mixin Eloquent
 */
class PesaflowRequest extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "payload" => "json",
        "status" => PaymentStatus::class,
        "currency" => Currency::class
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }

    public function pesaflowResponse(): HasOne
    {
        return $this->hasOne(PesaflowResponse::class, 'invoice_number', 'invoice_number');
    }
}
