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
            ...$this->getRecentCheckins(),
            ...$this->delegatesSummary(),
            ...$this->getPassPrintedStats()
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

    private function delegatesSummary(): array
    {
        $checkinData = Checkin::query()
            ->select([
                DB::raw('DATE(checkin_date) as date'),
                DB::raw('categories.title as category'),
                DB::raw('COUNT(checkins.id) as count')
            ])
            ->join('delegates', 'checkins.delegate_id', '=', 'delegates.id')
            ->join('categories', 'delegates.category_id', '=', 'categories.id')
            ->groupBy('date', 'categories.title')
            ->get()
            ->groupBy('date')
            ->map(function($dateGroup) {
                $data = ['date' => $dateGroup->first()->date];
                foreach ($dateGroup as $row) {
                    $data[$row->category] = $row->count;
                }
                return $data;
            })
            ->values()
            ->toArray();

        return ['delegatesSummary' => json_encode($checkinData), 'categories' => Category::pluck('title')->toJson()];
    }

    private function getPassPrintedStats()
    {
        $passPrintedStats = Category::withCount([
            'delegates as total' => function ($query) {
                $query->select(\DB::raw('count(*)'));
            },
            'delegates as printed' => function ($query) {
                $query->where('pass_printed', true)
                    ->select(\DB::raw('count(*)'));
            }
        ])->get()->map(function($category) {
            return [
                'category' => $category->title, // Assuming 'name' is the column holding the category name
                'total' => $category->total,
                'printed' => $category->printed,
            ];
        })->toArray();

        return ['passPrintedStats' => json_encode($passPrintedStats) , 'totalDelegates' => Delegate::where('pass_printed', true)->count()];
    }

}
