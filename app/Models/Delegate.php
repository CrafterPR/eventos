<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;

class Delegate extends Model
{
    use HasFactory, HasUlids;

    protected $guarded = ['id'];


    protected $appends = ['name'];

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return "{$this->salutation} {$this->first_name} {$this->last_name}";
    }

    public function event(): BelongsTo
    {
        return $this->belongsTo(Event::class);
    }

    public function country(): BelongsTo
    {
        return $this->belongsTo(Country::class);
    }

    public function county(): BelongsTo
    {
        return $this->belongsTo(County::class);
    }


    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault();
    }


    public function checkins(): HasMany
    {
        return $this->hasMany(Checkin::class);
    }

    public function printPass(): void
    {
       $this->forceFill([
           'print_count' =>  $this->print_count + 1,
            'pass_printed' => true,
       ])->save();
    }

}
