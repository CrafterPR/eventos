<?php

namespace App\Models;

use App\Models\Traits\Uuidable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ActiveVote extends Model
{
    use HasFactory, Uuidable;

    protected $primaryKey = 'uuid';

    protected $guarded = ['uuid'];

    public function position(): BelongsTo
    {
        return $this->belongsTo(VotingPosition::class, 'voting_position_uuid');
    }

    public function contestant(): BelongsTo
    {
       return $this->belongsTo(Contestant::class, 'contestant_uuid');
    }

    public function voter(): BelongsTo
    {
       return $this->belongsTo(Voter::class, 'voter_uuid');
    }
}
