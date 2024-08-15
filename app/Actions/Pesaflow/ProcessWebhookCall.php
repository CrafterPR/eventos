<?php

namespace App\Actions\Pesaflow;

use App\Enum\PaymentStatus;
use App\Events\PesaflowPaymentFailedEvent;
use App\Events\PesaflowPaymentSuccessfulEvent;
use App\Models\Pesaflow\PesaflowResponse;
use Illuminate\Support\Carbon;
use Lorisleiva\Actions\Concerns\AsAction;
use Spatie\WebhookClient\Models\WebhookCall;

class ProcessWebhookCall
{
    use AsAction;

    public function handle(WebhookCall $webhookCall): void
    {
        //checks if webhook has already been processed
        if ($webhookCall->processed == 1) {
            return;
        }

        $payload = $webhookCall->payload;

        $status = $payload["status"];

        $timeString = $payload["payment_date"];

        $carbon = Carbon::createFromFormat('Y-m-d H:i:s+P e O', $timeString);

        $transactionRef = $payload["payment_reference"][0]["payment_reference"];

        $pesaflowResponse = PesaflowResponse::updateOrCreate([
            "invoice_number" => $payload["invoice_number"]
        ], [
            "invoice_number" => $payload["invoice_number"],
            "status" => $status,
            "currency" => $payload["currency"],
            "amount_paid" => $payload["amount_paid"],
            "payment_date" => $carbon->toDateTimeString(),
            "phone_number" => $payload["phone_number"],
            "invoice_amount" => $payload["invoice_amount"],
            "payment_channel" => $payload["payment_channel"],
            "payment_reference" => $payload["payment_reference"],
            "client_invoice_ref" => $payload["client_invoice_ref"],
            "last_payment_amount" => $payload["last_payment_amount"],
            "transaction_reference" => $transactionRef
        ]);

        $pesaflowRequest = $pesaflowResponse->pesaflowRequest;

        $order = $pesaflowRequest->order;

        $pesaflowRequest->update([
            "status" => $status,
        ]);

        if ($status == PaymentStatus::SETTLED->value) {

            $order->update([
                "status" => PaymentStatus::SETTLED,
                "check_out_completed_at" => now(),
                "payment_method" => $pesaflowResponse->payment_channel,
                "transaction_reference" => $transactionRef
            ]);

            event(new PesaflowPaymentSuccessfulEvent(order: $order));

        } else {
            event(new PesaflowPaymentFailedEvent(order: $order, status: $status));
        }

        $webhookCall->update([
            "processed" => true
        ]);
    }
}
