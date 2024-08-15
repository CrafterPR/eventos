<?php

namespace App\Models\Pesaflow;

use App\Enum\PaymentStatus;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Pesaflow\PesaflowResponse
 *
 * @property int $id
 * @property string $invoice_number
 * @property string $client_invoice_ref
 * @property PaymentStatus $status
 * @property string|null $currency
 * @property string|null $invoice_amount
 * @property string|null $name
 * @property string|null $phone_number
 * @property string|null $amount_paid
 * @property string|null $amount_expected
 * @property string|null $last_payment_amount
 * @property string|null $payment_channel
 * @property string|null $transaction_reference
 * @property string|null $payment_date
 * @property array|null $payment_reference
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read \App\Models\Pesaflow\PesaflowRequest|null $pesaflowRequest
 * @method static Builder|PesaflowResponse newModelQuery()
 * @method static Builder|PesaflowResponse newQuery()
 * @method static Builder|PesaflowResponse query()
 * @method static Builder|PesaflowResponse whereAmountExpected($value)
 * @method static Builder|PesaflowResponse whereAmountPaid($value)
 * @method static Builder|PesaflowResponse whereClientInvoiceRef($value)
 * @method static Builder|PesaflowResponse whereCreatedAt($value)
 * @method static Builder|PesaflowResponse whereCurrency($value)
 * @method static Builder|PesaflowResponse whereId($value)
 * @method static Builder|PesaflowResponse whereInvoiceAmount($value)
 * @method static Builder|PesaflowResponse whereInvoiceNumber($value)
 * @method static Builder|PesaflowResponse whereLastPaymentAmount($value)
 * @method static Builder|PesaflowResponse whereName($value)
 * @method static Builder|PesaflowResponse wherePaymentChannel($value)
 * @method static Builder|PesaflowResponse wherePaymentDate($value)
 * @method static Builder|PesaflowResponse wherePaymentReference($value)
 * @method static Builder|PesaflowResponse wherePhoneNumber($value)
 * @method static Builder|PesaflowResponse whereStatus($value)
 * @method static Builder|PesaflowResponse whereTransactionReference($value)
 * @method static Builder|PesaflowResponse whereUpdatedAt($value)
 * @mixin Eloquent
 */
class PesaflowResponse extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $casts = [
        "payment_reference" => "json",
        "status" => PaymentStatus::class
    ];

    public function pesaflowRequest(): BelongsTo
    {
        return $this->belongsTo(PesaflowRequest::class, 'invoice_number', 'invoice_number');
    }
}
