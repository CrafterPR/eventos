<?php

namespace App\Models;

use App\Enum\BoothStatus;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use OwenIt\Auditing\Models\Audit;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;
use Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

/**
 * App\Models\Booth
 *
 * @property int $id
 * @property string $label
 * @property string $uuid
 * @property string|null $kes_price
 * @property string|null $usd_price
 * @property string|null $row_name
 * @property int|null $room_no
 * @property string|null $room_size
 * @property string|null $room_size_per_sqm
 * @property bool $open_to_public
 * @property string|null $category
 * @property BoothStatus $status
 * @property int|null $user_id
 * @property string|null $institution
 * @property string|null $description
 * @property array|null $meta
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read Collection<int, Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\User|null $bookedBy
 * @property-read \App\Models\Booking|null $bookings
 * @property-read \App\Models\User|null $createdBy
 * @property-read MediaCollection<int, Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\OrderItem|null $orderItem
 * @method static Builder|Booth newModelQuery()
 * @method static Builder|Booth newQuery()
 * @method static Builder|Booth onlyTrashed()
 * @method static Builder|Booth query()
 * @method static Builder|Booth whereCategory($value)
 * @method static Builder|Booth whereCreatedAt($value)
 * @method static Builder|Booth whereCreatedBy($value)
 * @method static Builder|Booth whereDeletedAt($value)
 * @method static Builder|Booth whereDescription($value)
 * @method static Builder|Booth whereId($value)
 * @method static Builder|Booth whereInstitution($value)
 * @method static Builder|Booth whereKesPrice($value)
 * @method static Builder|Booth whereLabel($value)
 * @method static Builder|Booth whereMeta($value)
 * @method static Builder|Booth whereOpenToPublic($value)
 * @method static Builder|Booth whereRoomNo($value)
 * @method static Builder|Booth whereRoomSize($value)
 * @method static Builder|Booth whereRoomSizePerSqm($value)
 * @method static Builder|Booth whereRowName($value)
 * @method static Builder|Booth whereStatus($value)
 * @method static Builder|Booth whereUpdatedAt($value)
 * @method static Builder|Booth whereUsdPrice($value)
 * @method static Builder|Booth whereUserId($value)
 * @method static Builder|Booth whereUuid($value)
 * @method static Builder|Booth withTrashed()
 * @method static Builder|Booth withoutTrashed()
 * @mixin Eloquent
 */
class Booth extends Model implements Auditable, HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        "open_to_public" => "boolean",
        "meta" => "json",
        "status" => BoothStatus::class
    ];

    public function bookings(): HasOne
    {
        return $this->hasOne(Booking::class);
    }

    public function createdBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "created_by");
    }

    public function bookedBy(): BelongsTo
    {
        return $this->belongsTo(User::class, "user_id");
    }

    public function orderItem(): MorphOne
    {
        return $this->morphOne(OrderItem::class, 'itemable');
    }
}
