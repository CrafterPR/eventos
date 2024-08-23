<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\County
 *
 * @property int $id
 * @property int $country_id
 * @property string $name
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|County newModelQuery()
 * @method static Builder|County newQuery()
 * @method static Builder|County query()
 * @method static Builder|County whereCountryId($value)
 * @method static Builder|County whereCreatedAt($value)
 * @method static Builder|County whereId($value)
 * @method static Builder|County whereName($value)
 * @method static Builder|County whereUpdatedAt($value)
 * @mixin Eloquent
 */
class County extends Model
{
    use HasFactory;
    use HasUlids;

    protected $fillable = [
        'id',
        'country_id',
        'name'
    ];
}
