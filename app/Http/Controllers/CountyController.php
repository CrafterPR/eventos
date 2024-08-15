<?php

namespace App\Http\Controllers;

use App\Models\County;
use App\Models\CouponCategory;
use Illuminate\Http\JsonResponse;

class CountyController extends Controller
{
    public function counties($countryId): JsonResponse
    {
        $counties = County::where('country_id', $countryId)->get();

        return response()->json($counties);
    }

    public function categories(): JsonResponse
    {
        $categories= CouponCategory::all();

        return response()->json($categories);
    }
}
