<?php

namespace App\Models;

use Database\Seeders\SpeakersSeeder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $title
 * @property int $programme_id
 * @property int|null $schedule_id
 * @property int|null $speaker_id
 * @property string|null $start
 * @property string|null $end
 * @property array|null $tags
 * @property string|null $description
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Programme $programme
 * @property-read \App\Models\Schedule|null $schedule
 * @property-read \App\Models\Speaker|null $speaker
 * @method static \Illuminate\Database\Eloquent\Builder|Event newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Event query()
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereEnd($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereProgrammeId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereScheduleId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereSpeakerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereStart($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTags($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereTitle($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Event whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Event extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    protected $casts = [
        'tags' => 'array'
    ];

    /**
     * @return BelongsTo
     */
    public function schedule(): BelongsTo
    {
        return $this->belongsTo(Schedule::class)->withDefault();
    }

    /**
     * @return BelongsTo
     */
    public function programme(): BelongsTo
    {
        return $this->belongsTo(Programme::class);
    }

    public function speaker():BelongsTo
    {
        return $this->belongsTo(Speaker::class);
    }
}
