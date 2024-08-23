<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

/**
 * App\Models\CouponModification
 *
 * @property string $id
 * @property string $coupon_id
 * @property string $user_id
 * @property int $initial_value
 * @property int $new_value
 * @property string|null $reason
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Coupon $coupon
 * @property-read \App\Models\User $user
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification whereCouponId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification whereInitialValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification whereNewValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification whereReason($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponModification whereUserId($value)
 * @mixin \Eloquent
 */
class CouponModification extends Model
{
    use HasFactory;
    use HasUlids;


    protected $guarded = ['id'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function coupon(): BelongsTo
     {
        return $this->belongsTo(Coupon::class);
    }
}
