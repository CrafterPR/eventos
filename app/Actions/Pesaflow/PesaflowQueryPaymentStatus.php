<?php

namespace App\Actions\Pesaflow;

use App\Enum\OrderStatus;
use App\Enum\PaymentStatus;
use App\Events\PesaflowPaymentFailedEvent;
use App\Events\PesaflowPaymentSuccessfulEvent;
use App\Models\Order;
use App\Models\Pesaflow\PesaflowResponse;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
use Lorisleiva\Actions\Concerns\AsAction;

class PesaflowQueryPaymentStatus
{

    use AsAction;

    /**
     * @param $refNo
     * @return Order|null
     * @throws RequestException
     */
    public function handle($refNo): ?Order
    {
        $url = config("services.pesaflow.url");
        $apiClientId = config("services.pesaflow.api_client_id");
        $key = config("services.pesaflow.key");

        $dataString = $apiClientId . $refNo;
        $hash = base64_encode(hash_hmac('sha256', $dataString, $key));

        $payload = [
            'api_client_id' => $apiClientId,
            'ref_no' => $refNo,
            'secure_hash' => $hash,
        ];

        $response = Http::retry(3, 100)
            ->withQueryParameters($payload)
            ->get("$url/api/invoice/payment/status")
            ->throw()
            ->json();

        if (app()->isLocal()) {
            Log::info("PESAFLOW QUERY RESPONSE:", $response);
        }

        $status = $response["status"];

        $pesaflowResponse = PesaflowResponse::updateOrCreate([
            "invoice_number" => $refNo
        ], [
            "invoice_number" => $refNo,
            "status" => $status,
            "name" => $response["name"],
            "currency" => $response["currency"],
            "client_invoice_ref" => $response["client_invoice_ref"],
            "amount_expected" => $response["amount_expected"],
        ]);

        $pesaflowRequest = $pesaflowResponse->pesaflowRequest;

        $order = $pesaflowRequest->order;

        $pesaflowRequest->update([
            "status" => $status,
        ]);

        if ($order->status == OrderStatus::SETTLED) {

            $order->update([
                "status" => PaymentStatus::SETTLED,
                "check_out_completed_at" => now(),
            ]);

            event(new PesaflowPaymentSuccessfulEvent(order: $order));
        }

        if ($status != PaymentStatus::SETTLED->value) {
            event(new PesaflowPaymentFailedEvent(order: $order, status: $status));
        }

        return $order;
    }
}
