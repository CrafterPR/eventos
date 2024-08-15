<?php

namespace App\Models;

use App\Models\Traits\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Contestant extends Model
{
    use HasFactory, Uuidable;

    protected $primaryKey = 'uuid';

    protected $guarded = ['uuid'];

    public function voting_period(): BelongsTo
    {
       return $this->belongsTo(VotingPeriod::class, 'voting_period_uuid');
    }

    public function voting_position(): BelongsTo
    {
        return $this->belongsTo(VotingPosition::class, 'voting_position_uuid');
    }

    public function creator(): BelongsTo
    {
       return $this->belongsTo(User::class, 'created_by');
    }

    public function votes(): HasMany
    {
         return $this->hasMany(ActiveVote::class);
    }
}
