<?php

namespace App\Http\Controllers;

use App\Enum\BookingStatus;
use App\Enum\Currency;
use App\Enum\OrderItemStatus;
use App\Enum\PaymentStatus;
use App\Enum\UserType;
use App\Models\Booth;
use App\Models\Category;
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
            ...$this->getBoothStats(),
            ...$this->getUsersStats(),
            ...$this->getStaff(),
            ...$this->getCouponData(),
            "kes_earning" => $this->getEarnings(Currency::KES),
            "usd_earning" => $this->getEarnings(Currency::USD),
            ...$this->getRecentTransactions()
        ];

        return view('pages.dashboards.index', ["data" => $data]);
    }

    /**
     * Retrieve booth analytics
     * @return array
     */
    public function getBoothStats(): array
    {
        $totalBooths = Booth::count();

        $paidBooths = Booth::whereRelation("bookings", "booking_status", "=", BookingStatus::RESERVED)
            ->count();

        $pendingBooths = $totalBooths - $paidBooths;

        $percent = $paidBooths / $totalBooths * 100;

        return [
            "booths" => [
                "total" => $totalBooths,
                "paid" => $paidBooths,
                "pending" => $pendingBooths,
                "percent" => number_format($percent, 2)
            ]
        ];
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
     * Retrieve earnings
     * @param Currency $currency
     * @return array
     */
    public function getEarnings(Currency $currency): array
    {
        $orderSum = Order::query()
            ->where("currency", $currency)
            ->where("status", PaymentStatus::SETTLED)
            ->sum("total_amount");

        $orderItemSum = OrderItem::query()
            ->selectRaw("sum(case when itemable_type = 'booth' then total else 0 end) as booth_sum")
            ->selectRaw("sum(case when itemable_type = 'ticket' then total else 0 end) as ticket_sum")
            ->where("currency", $currency)
            ->where("status", OrderItemStatus::PAID)
            ->first();

        return [
            "total_sum" => number_format($orderSum, 2),
            "booth_sum" => format_amount($orderItemSum->booth_sum, $currency),
            "ticket_sum" => format_amount($orderItemSum->ticket_sum, $currency),
        ];
    }



    /**
     * Retrieve recent transactions
     * @return array
     */
    private function getRecentTransactions(): array
    {
        $payments = PesaflowRequest::query()
            ->latest()
            ->limit(10)
            ->get();

        return [
            "transactions" => $payments
        ];
    }

    private function getCouponData(): array
    {
        $coupons = UserCoupon::query()
            ->with('delegate', 'coupon')
            ->get();

        return ['coupons' => $coupons];
    }
}
