<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class PurchaseOrder extends Model
{
    use HasFactory, HasUlids;

    // ULID primary key
    public $incrementing = false;
    protected $keyType = 'string';

    protected $guarded = ['id'];

    protected $casts = [
        'tickets' => 'array',
        'amount' => 'decimal:2',
        'status' => \App\Enum\PurchaseOrderStatus::class,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pesaflow_request(): HasOne
    {
        return $this->hasOne(\App\Models\Pesaflow\PesaflowRequest::class, 'purchase_order_id');
    }

}
