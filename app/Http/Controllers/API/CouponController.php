<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\UserCoupon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class CouponController extends Controller
{

    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $coupons = UserCoupon::where("user_id", Auth::id())
            ->with("coupons")
            ->get()
            ->map(function (UserCoupon $userCoupon) {
                return [
                    "id" => $userCoupon->coupon->id,
                    "code" => $userCoupon->coupon->code,
                    "organization" => $userCoupon->coupon->organization,
                    "type" => $userCoupon->coupon->type,
                    "created_at" => format_date($userCoupon->created_at),
                    "updated_at" => format_date($userCoupon->updated_at)
                ];
            });

        return new JsonResponse([
            "data" => $coupons
        ]);
    }
}
