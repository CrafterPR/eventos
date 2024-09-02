<?php

namespace App\Http\Controllers\Apps;

use App\Actions\GenerateInvitationLetter;
use App\DataTables\DelegatesDataTable;
use App\Enum\CategoryStatus;
use App\Enum\UserType;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelegateRequest;
use App\Models\Affiliation;
use App\Models\Category;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Delegate;
use App\Models\User;
use App\Models\UserCoupon;
use App\Notifications\SendInvitationNotification;
use App\Rules\CouponValidator;
use Exception;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Password;
use Throwable;

class DelegateController extends Controller
{
    /**
     * @param DelegatesDataTable $dataTable
     * @return mixed
     */
    public function index(DelegatesDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.delegates.delegates');
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|Factory|View|Application
     */
    public function create(): Application|View|Factory|\Illuminate\Contracts\Foundation\Application
    {
        $categories = Category::query()
            ->where('status', CategoryStatus::ACTIVE)
            ->get();

        $countries = Country::orderBy('name')->get();

        return view("pages.apps.delegates.create", compact("categories", "countries"));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(DelegateRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
            $user = User::create($request->validated());

            //save delegate coupon
            $coupon = $data["coupon"] ?? '';
            if (!empty($coupon)) {
                $coupon = Coupon::where('code', $coupon)->first();
                if ($coupon) {
                    UserCoupon::create(['user_id' => $user->id, 'coupon_id' => $coupon->id]);
                }
            }

            // Send a password reset link to the delegate's email
            // Password::sendResetLink(collect($data)->only('email', 'password')->toArray());

        });

        return to_route("users.delegates.index");
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return view('pages.apps.user-management.users.show', compact('user'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
