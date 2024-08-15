<?php

namespace App\Http\Controllers;

use App\Models\Pesaflow\PesaflowRequest;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;

class PaymentController extends Controller
{

    public function show($invoiceNo): View|\Illuminate\Foundation\Application|Factory|Application
    {
        $payment = PesaflowRequest::where("invoice_number", $invoiceNo)
            ->with(["user", "order", "order.orderItems"])
            ->firstOrFail();

        $data["payment"] = $payment;
        $data["user"] = $payment->user;
        $data["order"] = $payment->order;
        $data["orderItems"] = $payment->order->orderItems;

        return view("pages.payments.show", ["data" => $data]);
    }
}
