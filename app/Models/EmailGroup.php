<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EmailGroup
 *
 * @property string $id
 * @property string $name
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmailGroup newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailGroup newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailGroup query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailGroup whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailGroup whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailGroup whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailGroup whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmailGroup extends Model
{
    use HasFactory;
    use HasUlids;
}
