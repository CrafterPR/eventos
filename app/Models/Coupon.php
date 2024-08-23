<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Coupon
 *
 * @property int $id
 * @property string $code
 * @property string|null $organization
 * @property string|null $email
 * @property int $no_of_delegates
 * @property int $generated_by
 * @property string|null $payment_reference
 * @property string $type
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\User|null $user
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon query()
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCode($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereGeneratedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereNoOfDelegates($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereOrganization($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon wherePaymentReference($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereUpdatedAt($value)
 * @property string|null $category_id
 * @property-read \App\Models\CouponCategory|null $category
 * @property-read \App\Models\Ticket|null $ticket
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\UserCoupon> $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Coupon whereCategoryId($value)
 * @mixin \Eloquent
 */
class Coupon extends Model
{
    use HasFactory;
    use HasUlids;

    protected $guarded = [];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, ' generated_by', 'id');
    }

    public function users(): HasMany
     {
        return $this->hasMany(UserCoupon::class);
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(CouponCategory::class);
    }

    public function ticket(): BelongsTo
    {
        return $this->belongsTo(Ticket::class, 'type_id');
    }
}
