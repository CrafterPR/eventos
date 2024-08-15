<?php

namespace App\Transformers;

use App\Models\User;
use App\Models\UserCoupon;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\NullResource;
use League\Fractal\TransformerAbstract;

class ProfileTransformer extends TransformerAbstract
{
    /**
     * List of resources to automatically include
     *
     * @var array
     */
    protected array $defaultIncludes = [
        "country", "county", "affiliation", 'coupon'
    ];

    /**
     * A Fractal transformer.
     *
     * @param User $user
     * @return array
     */
    public function transform(User $user): array
    {
        return [
            "id" => $user->id,
            "salutation" => $user->salutation,
            "first_name" => $user->first_name,
            "last_name" => $user->last_name,
            "name" => $user->name,
            "email" => $user->email,
            "id_number" => $user->id_number,
            "gender" => $user->gender,
            "user_type" => $user->user_type,
            "institution" => $user->institution,
            "position" => $user->position,
            "disability" => $user->disability,
            "profile_photo_url" => $user->profile_photo_url,
            "area_of_interest" => $user->area_of_interest,
            "email_verified" => is_null($user->email_verified_at),
            "last_login_at" => $user->last_login_at,
            "member_since" => $user->created_at->format("M, d Y"),
        ];
    }

    /**
     * @param User $user
     * @return Item|NullResource
     */
    public function includeCountry(User $user): NullResource|Item
    {
        $country = $user->country;

        if ($country) {
            return $this->item($country, new CountryTransformer(), "include");
        }

        return $this->null();
    }

    /**
     * @param User $user
     * @return Item|NullResource
     */
    public function includeCounty(User $user): NullResource|Item
    {
        $county = $user->county;

        if ($county) {
            return $this->item($county, new CountyTransformer(), "include");
        }

        return $this->null();
    }

    /**
     * @param User $user
     * @return Item|NullResource
     */
    public function includeAffiliation(User $user): NullResource|Item
    {
        $affiliation = $user->affiliation;

        if ($affiliation) {
            return $this->item($affiliation, new AffiliationTransformer(), "include");
        }

        return $this->null();
    }

    public function includeCoupon(User $user): NullResource|Item
    {
        $coupon = $user->coupon;

        if ($coupon) {
            return $this->item($coupon, new CouponTransformer(), "include");
        }

        return $this->null();
    }
}
