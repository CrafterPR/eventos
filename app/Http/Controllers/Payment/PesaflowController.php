<?php

namespace App\Http\Controllers\Payment;

use App\Enum\OrderStatus;
use App\Enum\UserType;
use App\Models\Order;
use App\Models\Pesaflow\PesaflowRequest;
use App\Providers\RouteServiceProvider;
use Exception;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class PesaflowController extends Controller
{
    /**
     * @param Request $request
     * @return RedirectResponse
     * @throws Exception
     */
    public function callback(Request $request): RedirectResponse
    {
        $reference = $request->reference;

        $order = Order::whereReference($reference)->firstOrFail();
        // Order::query()
        //     ->whereUserId($order->user->id)
        //     ->whereStatus(OrderStatus::PENDING->value)
        //     ->whereItemTotal()

        $pesaflowRequest = PesaflowRequest::whereOrderId($order->id)->firstOrFail();

        $order = pesaflow_query_status($pesaflowRequest->invoice_number);

        $userType = $order->user->user_type;

        $path = RouteServiceProvider::HOME;

        if ($userType == UserType::DELEGATE) {
            $path = RouteServiceProvider::DELEGATE_HOME;
        }

        if ($userType == UserType::EXHIBITOR) {
            $path = RouteServiceProvider::EXHIBITOR_HOME;
        }

        return redirect()->intended("$path/receipt?reference={$order->reference}");
    }

    public function invoice_link(Order $order)
    {
        return view('pages.apps.booths.proforma', ['order' => $order]);
    }
}
