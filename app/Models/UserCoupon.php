<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\UserCoupon
 *
 * @property int $id
 * @property int $user_id
 * @property int $coupon_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Coupon $coupon
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|UserCoupon whereUserId($value)
 * @mixin \Eloquent
 */
class UserCoupon extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coupon(): BelongsTo
    {
        return $this->belongsTo(Coupon::class);
    }
}
