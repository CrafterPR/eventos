<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CouponCategory
 *
 * @property string $id
 * @property string $name
 * @property string $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCategory newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCategory newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCategory query()
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCategory whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCategory whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCategory whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCategory whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CouponCategory whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class CouponCategory extends Model
{
    use HasFactory;
    use HasUlids;
}
