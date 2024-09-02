<?php

namespace App\Models;

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

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return "$this->salutation $this->first_name $this->last_name";
    }

    public function orders(): HasMany
    {
        return $this->hasMany(Order::class);
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


    public function coupon(): HasOneThrough
    {
        return $this->hasOneThrough(Coupon::class, UserCoupon::class, 'user_id', 'id');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class)->withDefault();
    }

    public function coupons(): HasMany
    {
        return $this->hasMany(UserCoupon::class);
    }

    public function orderItem(): HasOne
    {
        return $this->hasOne(OrderItem::class);
    }

}
