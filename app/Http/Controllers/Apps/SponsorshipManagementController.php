<?php

namespace App\Http\Controllers\Apps;

use App\Http\Controllers\Controller;
use App\Models\Sponsorship;
use Illuminate\View\View;

class SponsorshipManagementController extends Controller
{
    public function index(): View
    {
        $sponsorships = Sponsorship::query()
            ->with(['user', 'pesaflow_request.pesaflowResponse'])
            ->latest()
            ->paginate(30);

        return view('pages.apps.event-management.sponsorships', compact('sponsorships'));
    }
}
