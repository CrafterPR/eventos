<?php

namespace App\Http\Controllers;

use App\Actions\GeneratePaymentReceipt;
use App\Actions\GetUserAccessToken;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Auth;

class PortalController extends Controller
{
    /**
     * @return View|\Illuminate\Foundation\Application|Factory|Application
     */
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $token = GetUserAccessToken::run(Auth::user())->plainTextToken;
        return view("pages.portal.index", compact("token"));
    }
}
