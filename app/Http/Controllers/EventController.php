<?php

namespace App\Http\Controllers;

use App\DataTables\EventsDataTable;
use App\Http\Requests\CheckinRequest;
use App\Models\checkin;
use App\Models\Event;

class EventController extends Controller
{

    public function index(EventsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.event-management.manage-events');
    }

    public function checkin(Event $event)
    {
        return view('pages.apps.event-management.checkin' , compact('event'));
    }

    public function store(CheckinRequest $request)
    {
        Checkin::create($request->validated());

        return redirect()->back()->with('success', 'Delegate has been checked in successfully!');
    }

}
