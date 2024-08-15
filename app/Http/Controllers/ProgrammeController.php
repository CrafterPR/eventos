<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\Programme;
use App\Models\Speaker;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;

class ProgrammeController extends Controller
{
    public function index(): View
    {
        $days = Programme::query()
            ->with('schedules', 'events')
            ->orderBy('id')->get();
        return View('website.schedule', compact('days'));
    }

    public function manage_events(): View
    {
        if (! Gate::allows('manage-events')) {
            abort(403);
        }

        $days = Programme::with('events', 'schedules')->get();

        return View('pages.programme.show', compact('days'));
    }
}
