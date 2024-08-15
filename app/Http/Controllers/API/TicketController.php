<?php

namespace App\Http\Controllers\API;

use App\Enum\PaymentStatus;
use App\Http\Controllers\Controller;
use App\Http\Requests\CouponRequest;
use App\Models\Coupon;
use App\Models\Ticket;
use App\Models\TicketPayment;
use App\Models\User;
use App\Models\UserCoupon;
use App\Transformers\TicketPaymentTransformer;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use League\Fractal\Pagination\IlluminatePaginatorAdapter;

class TicketController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $tickets = Ticket::query()
            ->orderBy("priority")
            ->where("status", "active")
            ->get()
            ->map(function (Ticket $ticket) {
                return [
                    "id" => $ticket->id,
                    "title" => $ticket->title,
                    "slug" =>  Str::slug($ticket->title),
                    "covers" => $ticket->covers,
                    "days" => $ticket->days,
                    "persons" => $ticket->persons,
                    "kes_amount" => $ticket->kes_amount,
                    "usd_amount" => $ticket->usd_amount,
                ];
            });

        return new JsonResponse([
            "data" => $tickets,
            "meta" => [
                "services" => get_payment_services("ticket", ["id", "name", "code", "currency"]),
                "summits" => get_summits()
            ]
        ]);
    }

    /**
     * @return JsonResponse
     */
    public function mine(): JsonResponse
    {
        $tickets = TicketPayment::query()
            ->where("user_id", Auth::id())
            ->with([
                "ticket:id,title", "orderItem:id,price,quantity,total,currency",
                "summit:id,title,edition_title,edition_description,venue", "order:id,reference"
            ])
            ->where("payment_status", PaymentStatus::SETTLED)
            ->orderByDesc("id")
            ->paginate(perPage: request("per_page", 10));

        return fractal()
            ->collection($tickets, new TicketPaymentTransformer())
            ->paginateWith(new IlluminatePaginatorAdapter($tickets))
            ->addMeta([
                "filters" => [
                    "payment_status" => PaymentStatus::cases(),
                ]
            ])
            ->respond(200, [], JSON_PRETTY_PRINT);
    }

    public function coupon(Request $request): JsonResponse
    {
        $coupon = UserCoupon::query()
            ->with('coupon')
            ->where('user_id', auth()->id())
            ->first();

        return  new JsonResponse(
            ['data' => $coupon ?? null]
        );
    }

    /**
     * @throws Exception
     */
    public function redeem(CouponRequest $request)
    {
        $safeRequest = $request->safe();

        $coupon = Coupon::where('code', $safeRequest->code)->firstOrFail();

        if (UserCoupon::query()
        ->where('user_id', auth()->id())
        ->where('coupon_id', $coupon->id)
        ->exists()) {
            throw new Exception('User has already redeemed this coupon', 401);
        }

        UserCoupon::create(['user_id' => auth()->id(), 'coupon_id' => $coupon->id]);

        return  new JsonResponse(
            ['data' => $coupon ?? null]
        );
    }
}
