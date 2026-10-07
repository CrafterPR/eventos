<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\PurchaseOrder;
use Illuminate\Support\Facades\Auth;
use App\Actions\GeneratePaymentReceipt;
use App\Models\Pesaflow\PesaflowRequest;
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

    public function receipt($purchaseOrder)
    {
        $order = PurchaseOrder::whereReference($purchaseOrder)->firstOrFail();
        return GeneratePaymentReceipt::run($order);
    }
    public function callback(Request $request): RedirectResponse
    {
        $reference = $request->reference;

        $pesaflowRequest = PesaflowRequest::query()
            ->where('invoice_number', $reference)
            ->orWhereHas('purchase_order', fn ($query) => $query->where('reference', $reference))
            ->orWhereHas('sponsorship', fn ($query) => $query->where('reference', $reference))
            ->firstOrFail();

        $order = pesaflow_query_status($pesaflowRequest->invoice_number);
        abort_unless($order?->user, 404);

        Auth::login($order->user);

        return redirect()->intended("dashboard?reference={$order->reference}");
    }

    public function invoice_link(Order $order)
    {
        return view('pages.apps.booths.proforma', ['order' => $order]);
    }
}
