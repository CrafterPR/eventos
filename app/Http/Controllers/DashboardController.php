<?php

namespace App\Http\Controllers;

use App\Enum\UserType;
use App\Http\Controllers\API\Traits\DataTrait;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    use DataTrait;

    private mixed $activeVotePeriod;

    const TTL = 180;

    public function __construct()
    {
        $this->session_id = session()->getId();
    }

    private string $session_id;

    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        $this->activeVotePeriod = $this->getActiveVotingPeriod();
        $data = $this->getDashboardData();
        $totalCount = count($data['activePositions']);
        $colValue = 12;

        if($totalCount > 0) {
             $colValue = $totalCount < 4 ? (int)floor(12 / $totalCount) : 4;
         }

         $data['colValue'] = $colValue;

       // dd($data);

        return view('pages.dashboards.index', ["data" => $data]);
    }

    /**
     * Retrieve booth analytics
     * @return array
     */


    /**
     * Retrieve users analytics
     *
     * @return string
     */


}
