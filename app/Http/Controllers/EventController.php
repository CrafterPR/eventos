<?php

namespace App\Http\Controllers;

use App\DataTables\EventsDataTable;

class EventController extends Controller
{

    public function index(EventsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.event-management.manage-events');
    }
}
