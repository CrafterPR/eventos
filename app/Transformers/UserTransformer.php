<?php

namespace App\Transformers;

use App\Models\User;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\NullResource;
use League\Fractal\TransformerAbstract;

class UserTransformer extends TransformerAbstract
{
    /**
     * List of resources possible to include
     *
     * @var array
     */
    protected array $availableIncludes = [
        "country", "county", "affiliation"
    ];

    /**
     * @param User $user
     * @return array
     */
    public function transform(User $user): array
    {
        return [
            "id" => $user->id,
            "salutation" => $user->salutation,
            "name" => $user->name,
            "gender" => $user->gender,
            "institution" => $user->institution,
            "position" => $user->position,
            "disability" => $user->disability,
            "profile_photo_url" => $user->profile_photo_url,
            "area_of_interest" => $user->area_of_interest,
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
}
