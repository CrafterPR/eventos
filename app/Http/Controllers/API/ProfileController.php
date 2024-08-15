<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserCoupon;
use App\Transformers\ProfileTransformer;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProfileController extends Controller
{
    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function show(Request $request): JsonResponse
    {
        $user = $request->user();

        $user->load(["country", "county", "affiliation", "coupon"]);

        return fractal()
            ->item($user, new ProfileTransformer())
            ->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function update(Request $request): JsonResponse
    {
        $user = $request->user();

        $data = $request->validate([
            'salutation' => "required",
            'first_name' => ['required', 'string', 'max:255'],
            'last_name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'mobile' => ['required', 'string', 'unique:users,mobile,' . $user->id],
            'country_id' => ['required', 'exists:countries,id'],
            'county_id' => ["nullable"],
            'institution' => ['required', 'max:255'],
            'position' => ['required', 'max:255'],
            'gender' => ['required'],
            'affiliation' => ['required', 'max:255'],
            'disability' => ['required', 'max:255'],
            'area_of_interest' => ['array', 'required', 'min:1'],
        ]);

        $user->update($data);

        return fractal()
            ->item($user, new ProfileTransformer())
            ->respond(200, [], JSON_PRETTY_PRINT);
    }

    /**
     * @param Request $request
     * @return JsonResponse
     */
    public function uploadPhoto(Request $request): JsonResponse
    {
        $request->validate([
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $user = $request->user();

        $previousPhotoPath = $user->profile_photo_path;

        if ($previousPhotoPath) {
            Storage::delete('public/' . $previousPhotoPath);
        }

        $imagePath = $request->file('photo')
            ->store('photos', 'public');

        $user->profile_photo_path = $imagePath;
        $user->save();

        return fractal()
            ->item($user, new ProfileTransformer())
            ->respond(200, [], JSON_PRETTY_PRINT);
    }
}
