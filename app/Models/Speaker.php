<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Speaker
 *
 * @property int $id
 * @property string $name
 * @property string $title
 * @property string|null $description
 * @property string|null $image_path
 * @property string|null $data_src
 * @property int $order
 * @property int $modified_by
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Event> $event
 * @property-read int|null $event_count
 * @property-read \App\Models\User $modifiedBy
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker query()
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker whereDataSrc($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker whereImagePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker whereModifiedBy($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker whereOrder($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Speaker whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Speaker extends Model
{
    use HasFactory;
    protected $guarded = [];


    public function event(): HasMany
    {
        return $this->hasMany(Event::class, 'speaker_id');
    }

    public function modifiedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, 'modified_by', 'id')->withDefault();
    }
}
