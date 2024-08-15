<?php

namespace App\Models;

use App\Enum\SummitStatus;
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
 * App\Models\Summit
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
 * @property SummitStatus $status
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
 * @method static Builder|Summit newModelQuery()
 * @method static Builder|Summit newQuery()
 * @method static Builder|Summit onlyTrashed()
 * @method static Builder|Summit query()
 * @method static Builder|Summit whereBannerType($value)
 * @method static Builder|Summit whereBannerUrl($value)
 * @method static Builder|Summit whereCreatedAt($value)
 * @method static Builder|Summit whereCreatedBy($value)
 * @method static Builder|Summit whereDeletedAt($value)
 * @method static Builder|Summit whereEditionDescription($value)
 * @method static Builder|Summit whereEditionTitle($value)
 * @method static Builder|Summit whereEndDate($value)
 * @method static Builder|Summit whereId($value)
 * @method static Builder|Summit whereLongDescription($value)
 * @method static Builder|Summit whereMeta($value)
 * @method static Builder|Summit whereShortDescription($value)
 * @method static Builder|Summit whereSlug($value)
 * @method static Builder|Summit whereStartDate($value)
 * @method static Builder|Summit whereStatus($value)
 * @method static Builder|Summit whereTheme($value)
 * @method static Builder|Summit whereTitle($value)
 * @method static Builder|Summit whereUpdatedAt($value)
 * @method static Builder|Summit whereVenue($value)
 * @method static Builder|Summit withTrashed()
 * @method static Builder|Summit withoutTrashed()
 * @mixin Eloquent
 */
class Summit extends Model implements Auditable, HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        "status" => SummitStatus::class,
        "meta" => "json",
        "start_date" => "datetime",
        "end_date" => "datetime",
    ];

    public function bookings(): HasMany
    {
        return $this->hasMany(Booking::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by");
    }
}
