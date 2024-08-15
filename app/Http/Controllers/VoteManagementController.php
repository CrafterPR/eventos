<?php

namespace App\Http\Controllers;

use App\DataTables\ContestantsDataTable;
use App\DataTables\PeriodsDataTable;
use App\DataTables\PositionsDataTable;
use App\DataTables\VotersDataTable;

class VoteManagementController extends Controller
{
    public function periods(PeriodsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.voting-periods.index');
    }

    public function positions(PositionsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.voting-positions.index');
    }

    public function contestants(ContestantsDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.voting-contestants.index');
    }

    public function voters(VotersDataTable $dataTable)
    {
        return $dataTable->render('pages.apps.voters.index');
    }
}
