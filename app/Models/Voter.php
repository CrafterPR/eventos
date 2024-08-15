<?php

namespace App\Models;

use App\Enum\ContestantStatus;
use App\Models\Traits\Uuidable;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Notifications\Notifiable;

class Voter extends Model
{
    use HasFactory, Uuidable, Notifiable;

    protected $primaryKey ='uuid';

    protected $guarded = ['uuid'];

    public function routeNotificationForAfricasTalking()
    {
        return $this->mobile;
    }

    public function statusValue(): Attribute
    {
        return  Attribute::make(
            get: fn() => $this->status === 1 ? ContestantStatus::ENABLED->value : ContestantStatus::DISABLED->value,
        );
    }


    public function votes(): HasMany
    {
       return $this->hasMany(ActiveVote::class, 'voter_uuid');
    }

    public function creator(): BelongsTo
    {
       return $this->belongsTo(User::class);
    }
}
