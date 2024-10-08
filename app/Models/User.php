<?php

namespace App\Models;

use App\Enum\UserStatus;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\DatabaseNotification;
use Illuminate\Notifications\DatabaseNotificationCollection;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Carbon;
use Lab404\Impersonate\Models\Impersonate;
use Laravel\Sanctum\HasApiTokens;
use Laravel\Sanctum\PersonalAccessToken;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Traits\HasRoles;

/**
 * App\Models\User
 *
 * @property int $id
 * @property string|null $salutation
 * @property string $first_name
 * @property string $last_name
 * @property string $email
 * @property string $mobile
 * @property string|null $id_number
 * @property string|null $gender
 * @property string|null $institution
 * @property string|null $disability
 * @property string|null $position
 * @property Carbon|null $email_verified_at

 * @property int|null $category_id
 * @property string|null $other_affiliation
 * @property int $invitation_sent
 * @property string $password
 * @property string|null $avatar
 * @property string|null $profile_photo_path
 * @property array|null $area_of_interest
 * @property int|null $affiliation_id
 * @property int|null $country_id
 * @property int|null $county_id
 * @property Carbon|null $last_login_at
 * @property string|null $last_login_ip
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read int|null $bookings_count
 * @property-read \App\Models\Country|null $country
 * @property-read \App\Models\County|null $county
 * @property-read string $name
 * @property-read string|null $profile_photo_url
 * @property-read DatabaseNotificationCollection<int, DatabaseNotification> $notifications
 * @property-read int|null $notifications_count

 * @property-read int|null $payment_verifications_count
 * @property-read Collection<int, Permission> $permissions
 * @property-read int|null $permissions_count
 * @property-read Collection<int, \Spatie\Permission\Models\Role> $roles
 * @property-read int|null $roles_count
 * @property-read Collection<int, PersonalAccessToken> $tokens
 * @property-read int|null $tokens_count
 * @method static \Database\Factories\DelegateFactory factory($count = null, $state = [])
 * @method static Builder|User newModelQuery()
 * @method static Builder|User newQuery()
 * @method static Builder|User permission($permissions)
 * @method static Builder|User query()
 * @method static Builder|User role($roles, $guard = null)
 * @method static Builder|User whereAffiliationId($value)
 * @method static Builder|User whereAreaOfInterest($value)
 * @method static Builder|User whereAvatar($value)
 * @method static Builder|User whereCategoryId($value)
 * @method static Builder|User whereCountryId($value)
 * @method static Builder|User whereCountyId($value)
 * @method static Builder|User whereCreatedAt($value)
 * @method static Builder|User whereDisability($value)
 * @method static Builder|User whereEmail($value)
 * @method static Builder|User whereEmailVerifiedAt($value)
 * @method static Builder|User whereFirstName($value)
 * @method static Builder|User whereGender($value)
 * @method static Builder|User whereId($value)
 * @method static Builder|User whereIdNumber($value)
 * @method static Builder|User whereInstitution($value)
 * @method static Builder|User whereInvitationSent($value)
 * @method static Builder|User whereLastLoginAt($value)
 * @method static Builder|User whereLastLoginIp($value)
 * @method static Builder|User whereLastName($value)
 * @method static Builder|User whereMobile($value)
 * @method static Builder|User whereOtherAffiliation($value)
 * @method static Builder|User wherePassword($value)
 * @method static Builder|User wherePosition($value)
 * @method static Builder|User whereProfilePhotoPath($value)
 * @method static Builder|User whereRememberToken($value)
 * @method static Builder|User whereSalutation($value)
 * @method static Builder|User whereUpdatedAt($value)
 * @method static Builder|User whereUserType($value)
 * @property string|null $email_delivered_at
 * @property-read Collection<int, \App\Models\UserCoupon> $coupons
 * @property-read int|null $coupons_count
 * @property-read \App\Models\OrderItem|null $orderItem
 * @method static Builder|User whereEmailDeliveredAt($value)
 * @mixin Eloquent
 */
class User extends Authenticatable
{
    use    HasApiTokens;
    use    HasFactory;
    use    Notifiable;
    use    HasRoles;
    use    Impersonate;
    use    HasUlids;


    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $guarded = [
        'id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'last_login_at' => 'datetime',
        'status' => UserStatus::class,
    ];

    protected $appends = [
        "name"
    ];

    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $value) => bcrypt($value),
        );
    }


    /**
     * @return string|null
     */
    public function getProfilePhotoUrlAttribute(): ?string
    {
        if ($this->profile_photo_path) {
            return asset('storage/' . $this->profile_photo_path);
        }

        return $this->profile_photo_path;
    }

    /**
     * @return string
     */
    public function getNameAttribute(): string
    {
        return "$this->salutation $this->first_name $this->last_name";
    }



    public function paymentVerifications(): HasMany
    {
        return $this->hasMany(Order::class);
    }

    public function canImpersonate(): bool
    {
        return $this->hasAnyRole([Role::SUPER_ADMIN, Role::ADMINISTRATOR]);
    }

    public function canBeImpersonated(): bool
    {
        return !$this->hasAnyRole([Role::SUPER_ADMIN, Role::ADMINISTRATOR]);
    }

    public function isSuperAdmin():bool
    {
        return $this->hasRole(Role::SUPER_ADMIN);
    }
}
