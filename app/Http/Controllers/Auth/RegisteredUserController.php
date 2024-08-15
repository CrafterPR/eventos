<?php

namespace App\Http\Controllers\Auth;

use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\RegistrationRequest;
use App\Models\Affiliation;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Role;
use App\Models\User;
use App\Models\UserCoupon;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     *
     * @return View
     */
    public function create(Request $request, ?string $coupon = ''): View
    {
        $affiliations = Affiliation::get();
        $countries = Country::orderBy('name')->get();

        return view('pages.auth.register', compact('affiliations', 'countries', 'coupon'));
    }

    /**
     * Handle an incoming registration request.
     *
     * @param RegistrationRequest $request
     * @return RedirectResponse
     */
    public function store(RegistrationRequest $request): RedirectResponse
    {
        $safeRequest = $request->safe();

        $data = $safeRequest->all() + [
                'last_login_at' => Carbon::now()->toDateTimeString(),
                'last_login_ip' => $request->getClientIp(),
                'email_verified_at' => now()
            ];

        $user = User::create($data);
        if ($safeRequest->coupon) {
            $coupon = Coupon::where('code', $safeRequest->coupon)->first();

            UserCoupon::create(['user_id' => $user->id, 'coupon_id' => $coupon->id]);
        }

        $userType = $user->user_type;

        $user->assignRole(Role::findByName($userType->value));

        event(new Registered($user));

        Auth::login($user);

        if ($userType == UserType::DELEGATE) {
            return redirect(RouteServiceProvider::DELEGATE_HOME);
        }

        if ($userType == UserType::EXHIBITOR) {
            return redirect(RouteServiceProvider::EXHIBITOR_HOME);
        }

        return redirect()->intended(RouteServiceProvider::HOME);
    }
}
