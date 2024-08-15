<?php

namespace App\Http\Controllers;

use App\DataTables\BookingsDataTable;
use App\DataTables\BoothsDataTable;
use App\Models\Booth;
use Illuminate\Http\Request;

class BoothController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(BoothsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.booths.manage-booths');
    }



    /**
     * Update the specified resource in storage.
     */
    public function view_bookings(BookingsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.booths.booth-bookings');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Booth $booth)
    {
        //
    }
}
