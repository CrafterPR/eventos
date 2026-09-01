<?php

namespace App\Actions\Pesaflow;

use Carbon\Carbon;
use App\Enum\OrderStatus;
use App\Enum\PaymentStatus;
use App\Enum\PurchaseOrderStatus;
use App\Events\PesaflowPaymentFailedEvent;
use App\Events\PesaflowPaymentSuccessfulEvent;
use App\Models\PurchaseOrder;
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
     * @return PurchaseOrder|null
     * @throws RequestException
     */
    public function handle($refNo): ?PurchaseOrder
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

        if (!app()->isProduction()) {
            Log::info("PESAFLOW QUERY RESPONSE:", $response);
        }

        $status = $response["status"];

        $pesaflowResponse = PesaflowResponse::updateOrCreate([
            "invoice_number" => $refNo
        ], [
            "invoice_number" => $refNo,
            "status" => $status,
            "name" => $response["name"],
            "payment_date" => Carbon::parse($response["payment_date"])->format('Y-m-d H:i:s'),
            "currency" => $response["currency"],
            "client_invoice_ref" => $response["client_invoice_ref"],
            "amount_paid" => $response["amount_paid"],
            "amount_expected" => $response["amount_expected"],
        ]);

        $pesaflowRequest = $pesaflowResponse->pesaflowRequest;

        $order = $pesaflowRequest->purchase_order;

        $pesaflowRequest->update([
            "status" => $status,
        ]);

        if ($status === PaymentStatus::SETTLED->value) {

            $order->update([
                "status" => PurchaseOrderStatus::PAID,
                'payment_receipt' => $response["ref_no"],
                "check_out_completed_at" => now(),
            ]);

            event(new PesaflowPaymentSuccessfulEvent(purchase_order: $order));
        }

        if ($status !== PaymentStatus::SETTLED->value) {
            event(new PesaflowPaymentFailedEvent(purchase_order: $order, status: $status));
        }

        return $order;
    }
}
