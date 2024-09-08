<?php

namespace App\Http\Controllers\Apps;

use App\DataTables\DelegatesDataTable;
use App\Enum\CategoryStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\DelegateRequest;
use App\Models\Category;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Delegate;
use App\Models\Event;
use App\Models\User;
use App\Models\UserCoupon;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $events = Event::orderBy('start_date', 'DESC')->get();
        return view("pages.apps.delegates.create", compact("categories", "countries", "events"));
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Throwable
     */
    public function store(DelegateRequest $request): RedirectResponse
    {
        DB::transaction(function () use ($request) {
           Delegate::create($request->validated());

        });

        return to_route("users.delegates.index")->with('success', 'Delegate created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Delegate $delegate)
    {
        return view('pages.apps.delegates.show', compact('delegate'));
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
