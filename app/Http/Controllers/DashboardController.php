<?php

namespace App\Http\Controllers;

use App\Enum\BookingStatus;
use App\Enum\Currency;
use App\Enum\OrderItemStatus;
use App\Enum\PaymentStatus;
use App\Enum\UserType;
use App\Models\Booth;
use App\Models\Category;
use App\Models\Checkin;
use App\Models\Delegate;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pesaflow\PesaflowRequest;
use App\Models\TicketPayment;
use App\Models\User;
use App\Models\UserCoupon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        $data = [
            ...$this->getUsersStats(),
            ...$this->getStaff(),
            ...$this->getDelegatesStats(),
            ...$this->getRecentCheckins()
        ];

        return view('pages.dashboards.index', ["data" => $data]);
    }


    /**
     * Retrieve users analytics
     * @return array[]
     */
    public function getUsersStats(): array
    {
        $categories = Category::all();
        $delegatesData= [];

        $categories->map(function ($category) use (&$delegatesData) {
             $delegates = Delegate::query()
                ->where("category_id", $category->id)
                ->get();
            $delegatesData[$category->title] = ['count' => $delegates->count(), 'list' => $delegates];

        });

        return ['delegates' => $delegatesData];
    }

    public function getStaff(): array
    {
        return ['staff' => User::query()->get()];
    }



    /**
     * Retrieve recent transactions
     * @return array
     */
    private function getRecentCheckins(): array
    {
        $checkins = Checkin::query()
            ->with(['delegate.event', 'delegate.country'])
            ->latest()
            ->limit(10)
            ->get();

        return [
            "checkins" => $checkins
        ];
    }

    private function getDelegatesStats(): array
    {
        $totalsByCategory = Delegate::query()
            ->with('category')
            ->select(
                'category_id', // Grouping by category_id
                DB::raw('COUNT(*) as total_delegates'), // Total number of delegates per category
                DB::raw('SUM(CASE WHEN print_count > 0 THEN 1 ELSE 0 END) as printed_passes'), // Count of printed passes per category
                DB::raw('SUM(print_count) as total_prints'), // Total number of prints per category
                DB::raw('SUM(CASE WHEN print_count = 0 THEN 1 ELSE 0 END) as unprinted_passes') // Count of unprinted passes per category
            )
            ->groupBy('category_id') // Group by category_id
            ->get();

        return ['delegateCategoryStats' => $totalsByCategory];
    }

}
