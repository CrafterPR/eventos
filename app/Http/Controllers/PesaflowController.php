<?php

namespace App\Http\Controllers;

use App\Enum\OrderStatus;
use App\Enum\UserType;
use App\Models\Order;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Auth;
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

        $order = PurchaseOrder::whereReference($reference)->firstOrFail();

        $pesaflowRequest = PesaflowRequest::wherePurchaseOrderId($order->id)->firstOrFail();

        $order = pesaflow_query_status($pesaflowRequest->invoice_number);

        $user = $order->user;

        Auth::login($user);

        return redirect()->intended("dashboard?reference={$order->reference}");
    }

    public function invoice_link(Order $order)
    {
        return view('pages.apps.booths.proforma', ['order' => $order]);
    }
}
