<?php

namespace App\Models;

use App\Enum\EventStatus;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Models\Audit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Event
 *
 * @property int $id
 * @property string $title
 * @property string $slug
 * @property string|null $edition_title
 * @property string|null $edition_description
 * @property string|null $theme
 * @property string|null $short_description
 * @property string|null $long_description
 * @property string $banner_type
 * @property string|null $banner_url
 * @property Carbon|null $start_date
 * @property Carbon|null $end_date
 * @property string|null $venue
 * @property EventStatus $status
 * @property array|null $meta
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Audit> $audits
 * @property-read int|null $audits_count
 * @property-read Collection<int, \App\Models\Booking> $bookings
 * @property-read int|null $bookings_count
 * @property-read \App\Models\User|null $createdBy
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @method static Builder|Event newModelQuery()
 * @method static Builder|Event newQuery()
 * @method static Builder|Event onlyTrashed()
 * @method static Builder|Event query()
 * @method static Builder|Event whereBannerType($value)
 * @method static Builder|Event whereBannerUrl($value)
 * @method static Builder|Event whereCreatedAt($value)
 * @method static Builder|Event whereCreatedBy($value)
 * @method static Builder|Event whereDeletedAt($value)
 * @method static Builder|Event whereEditionDescription($value)
 * @method static Builder|Event whereEditionTitle($value)
 * @method static Builder|Event whereEndDate($value)
 * @method static Builder|Event whereId($value)
 * @method static Builder|Event whereLongDescription($value)
 * @method static Builder|Event whereMeta($value)
 * @method static Builder|Event whereShortDescription($value)
 * @method static Builder|Event whereSlug($value)
 * @method static Builder|Event whereStartDate($value)
 * @method static Builder|Event whereStatus($value)
 * @method static Builder|Event whereTheme($value)
 * @method static Builder|Event whereTitle($value)
 * @method static Builder|Event whereUpdatedAt($value)
 * @method static Builder|Event whereVenue($value)
 * @method static Builder|Event withTrashed()
 * @method static Builder|Event withoutTrashed()
 * @mixin Eloquent
 */
class Event extends Model implements Auditable, HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        "status" => EventStatus::class,
        "meta" => "json",
        "start_date" => "date",
        "end_date" => "date",
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by");
    }
}
