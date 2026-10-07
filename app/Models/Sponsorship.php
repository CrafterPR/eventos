<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Sponsorship extends Model
{
    use HasUlids;

    public $incrementing = false;
    protected $keyType = 'string';
    protected $guarded = ['id'];

    protected $casts = [
        'amount' => 'decimal:2',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function pesaflow_request(): HasOne
    {
        return $this->hasOne(\App\Models\Pesaflow\PesaflowRequest::class);
    }
}
