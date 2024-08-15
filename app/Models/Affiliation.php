<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Affiliation
 *
 * @property int $id
 * @property string $name
 * @property int $status
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation query()
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereStatus($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Affiliation whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Affiliation extends Model
{
    use HasFactory;
    protected $fillable = ['name'];
}
