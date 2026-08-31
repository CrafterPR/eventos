<?php

namespace App\Actions\Pesaflow;

use App\Models\PurchaseOrder;
use App\Enum\Currency;
use App\Enum\PaymentStatus;
use App\Models\Pesaflow\PesaflowRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class PesaflowRequestPayment
{
    use AsAction;

    /**
     * @param PurchaseOrder $order
     * @param string $billDescription
     * @param string $serviceId
     * @param string $currency
     * @return Model|PesaflowRequest
     * @throws RequestException
     */
    public function handle(
        PurchaseOrder  $order,
        string $billDescription,
        string $serviceId,
        string $currency,
    ): Model|PesaflowRequest {
        $billRefNumber = $order->reference;
        $client = $order->user;
        $clientName = $client->name;
        $clientEmail = $order->payment_email;
        $clientMSISDN = $order->payment_phone;
        $clientIDNumber = (string) $client->id_number ?? rand(100000000, 999999999);
        $amountExpected =  (float)$order->amount;

        //use 1 bob for test purposes
        if (!app()->isProduction()) {
            $amountExpected = 1;
        }

        $url = config("services.pesaflow.url");
        $apiClientId = config("services.pesaflow.api_client_id");
        $secret = config("services.pesaflow.secret");
        $key = config("services.pesaflow.key");

        $secureHash = pesaflow_generate_secure_hash(
            apiClientID: $apiClientId,
            amount: $amountExpected,
            serviceID: $serviceId,
            currency: $currency,
            clientIDNumber: $clientIDNumber,
            billRefNumber: $billRefNumber,
            billDesc: $billDescription,
            clientName: $clientName,
            secret: $secret,
            key: $key
        );

        $payload = [
            'apiClientID' => $apiClientId,
            'serviceID' => $serviceId,
            'callBackURLOnSuccess' => config("services.pesaflow.redirect_url") . "?reference=$billRefNumber",
            'notificationURL' => config("services.pesaflow.notification_url"),
            'billDesc' => $billDescription,
            'billRefNumber' => $billRefNumber,
            'clientMSISDN' => $clientMSISDN,
            'clientName' => $clientName,
            'clientIDNumber' => $clientIDNumber,
            'clientEmail' => $clientEmail,
            'currency' => $currency,
            'amountExpected' => $amountExpected,
            'secureHash' => $secureHash,
            'format' => "json",
            'pictureURL' => image('images/2nd KICP-logo-01.png'),
            'sendSTK' => $currency == Currency::KES->value,
        ];

        $response['invoice_number'] = $order->reference;
        $response['invoice_link'] = route('login');

        $response = Http::post("$url/PaymentAPI/iframev2.1.php", $payload)
            ->throw()
            ->json();

        return PesaflowRequest::updateOrCreate(
            [
            'purchase_order_id' => $order->id,
            'user_id' => $client->id
            ],
            ['api_client_id' => $apiClientId,
            'service_id' => $serviceId,
            'currency' => $currency,
            'amount_expected' => $amountExpected,
            'payload' => $payload,
            'invoice_number' => $response['invoice_number'],
            'invoice_link' => $response['invoice_link'],
            'status' => PaymentStatus::PENDING
        ]
        );
    }
}
