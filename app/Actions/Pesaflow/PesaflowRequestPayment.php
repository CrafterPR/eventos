<?php

namespace App\Actions\Pesaflow;

use App\Actions\GenerateProformaInvoice;
use App\Enum\Currency;
use App\Enum\PaymentStatus;
use App\Models\Order;
use App\Models\Pesaflow\PesaflowRequest;
use App\Notifications\SendProformaInvoiceNotification;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;
use Lorisleiva\Actions\Concerns\AsAction;

class PesaflowRequestPayment
{
    use AsAction;

    /**
     * @param Order $order
     * @param string $billDescription
     * @param string $serviceId
     * @param string $currency
     * @return Model|PesaflowRequest
     * @throws RequestException
     */
    public function handle(
        Order  $order,
        string $billDescription,
        string $serviceId,
        string $currency,
    ): Model|PesaflowRequest {
        $billRefNumber = $order->reference;
        $client = $order->user;
        $clientName = $client->name;
        $clientEmail = $client->email;
        $clientMSISDN = $client->mobile;
        $clientIDNumber = (string) $client->id_number ?? rand(100000000, 999999999);
        $amountExpected =  (float)$order->total_amount;

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
            'pictureURL' => image('images/green_logo.svg'),
            'sendSTK' => $currency == Currency::KES->value,
        ];

        $response['invoice_number'] = $order->reference;
        $response['invoice_link'] = route('login');

        $response = Http::post("$url/PaymentAPI/iframev2.1.php", $payload)
            ->throw()
            ->json();

        return PesaflowRequest::updateOrCreate(
            [
            'order_id' => $order->id,
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
