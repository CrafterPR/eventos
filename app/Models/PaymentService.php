<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;
use OwenIt\Auditing\Contracts\Auditable;

/**
 * App\Models\PaymentService
 *
 * @property int $id
 * @property string $name
 * @property int $code
 * @property string $category
 * @property int $summit_id
 * @property string $agency
 * @property string $type
 * @property string $currency
 * @property string|null $bank_name
 * @property string|null $bank_account_no
 * @property string|null $bank_branch
 * @property string $status
 * @property int|null $created_by
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property Carbon|null $deleted_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \OwenIt\Auditing\Models\Audit> $audits
 * @property-read int|null $audits_count
 * @property-read \App\Models\Summit $summit
 * @method static Builder|PaymentService newModelQuery()
 * @method static Builder|PaymentService newQuery()
 * @method static Builder|PaymentService onlyTrashed()
 * @method static Builder|PaymentService query()
 * @method static Builder|PaymentService whereAgency($value)
 * @method static Builder|PaymentService whereBankAccountNo($value)
 * @method static Builder|PaymentService whereBankBranch($value)
 * @method static Builder|PaymentService whereBankName($value)
 * @method static Builder|PaymentService whereCategory($value)
 * @method static Builder|PaymentService whereCode($value)
 * @method static Builder|PaymentService whereCreatedAt($value)
 * @method static Builder|PaymentService whereCreatedBy($value)
 * @method static Builder|PaymentService whereCurrency($value)
 * @method static Builder|PaymentService whereDeletedAt($value)
 * @method static Builder|PaymentService whereId($value)
 * @method static Builder|PaymentService whereName($value)
 * @method static Builder|PaymentService whereStatus($value)
 * @method static Builder|PaymentService whereSummitId($value)
 * @method static Builder|PaymentService whereType($value)
 * @method static Builder|PaymentService whereUpdatedAt($value)
 * @method static Builder|PaymentService withTrashed()
 * @method static Builder|PaymentService withoutTrashed()
 * @mixin Eloquent
 */
class PaymentService extends Model implements Auditable
{
    use HasFactory;
    use SoftDeletes;
    use \OwenIt\Auditing\Auditable;

    protected $guarded = [];

    public function summit(): BelongsTo
    {
        return $this->belongsTo(Summit::class);
    }
}
