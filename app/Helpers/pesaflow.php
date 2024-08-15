<?php

use App\Actions\Pesaflow\PesaflowQueryPaymentStatus;
use App\Actions\Pesaflow\PesaflowRequestPayment;
use App\Enum\Currency;
use App\Models\EventSummit;
use App\Models\Order;
use App\Models\PaymentService;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\HigherOrderWhenProxy;

if (!function_exists("pesaflow_request_payment")) {
    /**
     * Request pesaflow payment
     * @param Order $order
     * @param string $billDescription
     * @param string $serviceId
     * @param string $currency
     * @return mixed
     */
    function pesaflow_request_payment(
        Order  $order,
        string $billDescription,
        string $serviceId,
        string $currency
    ): mixed {
        return PesaflowRequestPayment::run($order, $billDescription, $serviceId, $currency);
    }
}

if (!function_exists("pesaflow_query_status")) {
    /**
     * Confirms a payment of an invoice
     * @param string $invoiceNo
     * @return mixed
     * @throws Exception
     */
    function pesaflow_query_status(string $invoiceNo): mixed
    {
        return PesaflowQueryPaymentStatus::run($invoiceNo);
    }
}

if (!function_exists("pesaflow_generate_secure_hash")) {
    /**
     * Pesaflow secure hash generator
     * @param string $apiClientID
     * @param float $amount
     * @param int $serviceID
     * @param string $currency
     * @param string $clientIDNumber
     * @param string $billRefNumber
     * @param string $billDesc
     * @param string $clientName
     * @param string $secret
     * @param string $key
     * @return string
     */
    function pesaflow_generate_secure_hash(
        string $apiClientID,
        float  $amount,
        int    $serviceID,
        string $currency,
        string $clientIDNumber,
        string $billRefNumber,
        string $billDesc,
        string $clientName,
        string $secret,
        string $key
    ): string {
        $dataString = $apiClientID . $amount . $serviceID . $clientIDNumber . $currency . $billRefNumber . $billDesc . $clientName . $secret;
        $hash = hash_hmac('sha256', $dataString, $key);
        return base64_encode($hash);
    }
}

if (!function_exists("get_payment_services")) {
    /**
     * Returns payment services
     * @param string|null $category
     * @param array $columns
     * @return PaymentService[]|array|Builder[]|Collection|HigherOrderWhenProxy[]
     */
    function get_payment_services(?string $category = null, array $columns = []): Collection|array
    {
        return PaymentService::query()
            ->when($category)
            ->where("category", $category)
            ->when($columns)
            ->select($columns)
            ->where("status", "active")
            ->get()
            ->each(function ($service) {
                return $service->slug =  Str::slug($service->name);
            });
    }
}

if (!function_exists("get_summits")) {
    /**
     * Returns payment services
     * @param string|null $category
     * @param array $columns
     * @return PaymentService[]|array|Builder[]|Collection|HigherOrderWhenProxy[]
     */
    function get_summits(): Collection|array
    {
        return EventSummit::query()
            ->select(['title', 'id'])
            ->orderBy("title")
            ->get();
    }
}

if (!function_exists("format_amount")) {
    /**
     * @param $amount
     * @param Currency $currency
     * @return string
     */
    function format_amount($amount, Currency $currency): string
    {
        return $currency == Currency::KES ? "KES " . number_format($amount, 2)
            : "$" . number_format($amount, 2);
    }
}
