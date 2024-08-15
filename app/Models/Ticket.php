<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

/**
 * App\Models\Ticket
 *
 * @property int $id
 * @property int $summit_id
 * @property string $title
 * @property array|null $covers
 * @property int $priority
 * @property int $days
 * @property int $persons
 * @property string $kes_amount
 * @property string $usd_amount
 * @property string $status
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \Spatie\MediaLibrary\MediaCollections\Models\Collections\MediaCollection<int, \Spatie\MediaLibrary\MediaCollections\Models\Media> $media
 * @property-read int|null $media_count
 * @property-read \App\Models\OrderItem|null $orderItem
 * @property-read \App\Models\Summit $summit
 * @method static Builder|Ticket newModelQuery()
 * @method static Builder|Ticket newQuery()
 * @method static Builder|Ticket onlyTrashed()
 * @method static Builder|Ticket query()
 * @method static Builder|Ticket whereCovers($value)
 * @method static Builder|Ticket whereCreatedAt($value)
 * @method static Builder|Ticket whereCreatedBy($value)
 * @method static Builder|Ticket whereDays($value)
 * @method static Builder|Ticket whereDeletedAt($value)
 * @method static Builder|Ticket whereId($value)
 * @method static Builder|Ticket whereKesAmount($value)
 * @method static Builder|Ticket wherePersons($value)
 * @method static Builder|Ticket wherePriority($value)
 * @method static Builder|Ticket whereStatus($value)
 * @method static Builder|Ticket whereSummitId($value)
 * @method static Builder|Ticket whereTitle($value)
 * @method static Builder|Ticket whereUpdatedAt($value)
 * @method static Builder|Ticket whereUsdAmount($value)
 * @method static Builder|Ticket withTrashed()
 * @method static Builder|Ticket withoutTrashed()
 * @mixin Eloquent
 */
class Ticket extends Model implements Auditable, HasMedia
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;
    use InteractsWithMedia;

    protected $guarded = [];

    protected $casts = [
        //"covers" => "json"
    ];

    public function summit(): BelongsTo
    {
        return $this->belongsTo(Summit::class);
    }

    public function orderItem(): MorphOne
    {
        return $this->morphOne(OrderItem::class, 'itemable');
    }
}
