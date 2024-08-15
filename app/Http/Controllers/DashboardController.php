<?php

namespace App\Http\Controllers;

use App\Enum\BookingStatus;
use App\Enum\Currency;
use App\Enum\OrderItemStatus;
use App\Enum\PaymentStatus;
use App\Enum\UserType;
use App\Models\Booth;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Pesaflow\PesaflowRequest;
use App\Models\TicketPayment;
use App\Models\User;
use App\Models\UserCoupon;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index(): View|\Illuminate\Foundation\Application|Factory|Application
    {
        addVendors(['amcharts', 'amcharts-maps', 'amcharts-stock']);

        $data = [
            ...$this->getBoothStats(),
            ...$this->getTicketsStats(),
            ...$this->getUsersStats(),
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
        $userTypeCount = User::query()
            ->selectRaw("count(case when user_type = '" . UserType::STAFF->value . "' then 1 end) as staff")
            ->selectRaw("count(case when user_type = '" . UserType::EXHIBITOR->value . "' then 1 end) as exhibitor")
            ->selectRaw("count(case when user_type = '" . UserType::DELEGATE->value . "' then 1 end) as delegate")
            ->first();

        $staff = User::query()
            ->select(["id", "first_name", "last_name", "profile_photo_path"])
            ->where("user_type", UserType::STAFF->value)
            ->orderByDesc("id")
            ->limit(6)
            ->get();

        $exhibitors = User::query()
            ->select(["id", "first_name", "last_name", "profile_photo_path"])
            ->where("user_type", UserType::EXHIBITOR->value)
            ->orderByDesc("id")
            ->limit(6)
            ->get();

        $delegates = User::query()
            ->select(["id", "first_name", "last_name", "profile_photo_path"])
            ->where("user_type", UserType::DELEGATE->value)
            ->orderByDesc("id")
            ->limit(6)
            ->get();

        $couponDelegates = User::query()
            ->select(["id", "first_name", "last_name", "profile_photo_path"])
            ->where("user_type", UserType::DELEGATE->value)
            ->whereIn('id', UserCoupon::pluck('user_id')->toArray())
            ->orderByDesc("id");
        ;

        return [
            "staff" => [
                "total" => $userTypeCount->staff,
                "list" => $staff
            ],
            "exhibitor" => [
                "total" => $userTypeCount->exhibitor,
                "list" => $exhibitors
            ],
            "delegate" => [
                "total" => $userTypeCount->delegate,
                "list" => $delegates
            ],
            "coupons" => [
                "total" => $couponDelegates->count(),
                "list" => $couponDelegates->limit(6)->get()
    ]
        ];
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
     * Retrieve ticket stats
     * @return array[]
     */
    public function getTicketsStats(): array
    {
        $ticketCount = TicketPayment::query()
            ->where("payment_status", PaymentStatus::SETTLED)
            ->orWhere("payment_status", PaymentStatus::APPROVED)
            ->selectRaw("count(*) as total")
            ->selectRaw("count(case when ticket_id = '7' then 1 end) as one_day")
            ->selectRaw("count(case when ticket_id = '8' then 1 end) as five_day")
            ->selectRaw("count(case when ticket_id = '9' then 1 end) as summit")
            ->selectRaw("count(case when ticket_id = '10' then 1 end) as students")
            ->first();

        return [
            "ticket" => [
                "total" => number_format($ticketCount->total),
                "one_day" => number_format($ticketCount->one_day),
                "five_day" => number_format($ticketCount->five_day),
                "summit" => number_format($ticketCount->five_day),
                "students" => number_format($ticketCount->five_day),
            ]
        ];
    }

    /**
     * Retrieve recent transactions
     * @return array
     */
    public function getRecentTransactions(): array
    {
        $payments = PesaflowRequest::query()
            ->latest()
            ->limit(10)
            ->get();

        return [
            "transactions" => $payments
        ];
    }
}
