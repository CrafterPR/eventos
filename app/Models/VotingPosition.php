<?php

namespace App\Models;

use App\Models\Traits\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class VotingPosition extends Model
{
    use HasFactory, Uuidable;

    protected $primaryKey = 'uuid';

    protected $guarded = ['uuid'];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function period(): BelongsTo
    {
        return $this->belongsTo(VotingPeriod::class, 'voting_period_uuid');
    }

    public function votes(): HasMany
    {
        return $this->hasMany(ActiveVote::class, 'voting_position_uuid');
    }

    public function contestants(): HasMany
    {
        return $this->hasMany(Contestant::class);
    }
}
