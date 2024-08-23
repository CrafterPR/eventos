<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\EmailLogs
 *
 * @property int $id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLogs newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLogs newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLogs query()
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLogs whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLogs whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|EmailLogs whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class EmailLogs extends Model
{
    use HasFactory;
    use HasUlids;
}
