<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
use App\Models\PurchaseOrder;
use App\Enum\PurchaseOrderStatus;

$countsPaid = [];
$countsUnpaid = [];
$purchaseOrders = PurchaseOrder::select('tickets','status')->get();
foreach($purchaseOrders as $po){
    $tickets = $po->tickets;
    if (is_string($tickets)){
        $decoded = json_decode($tickets, true);
        if (json_last_error()===JSON_ERROR_NONE) $tickets = $decoded;
    }
    if (!is_array($tickets) && !$tickets instanceof \Illuminate\Support\Collection) continue;
    $status = ($po->status instanceof \BackedEnum) ? $po->status->value : (string)$po->status;
    $isPaid = ($status === PurchaseOrderStatus::PAID->value);
    foreach($tickets as $t){
        if (!is_array($t)) continue;
        $type = $t['type'] ?? ($t['title'] ?? 'Unknown');
        $qty = isset($t['count']) ? (int)$t['count'] : (isset($t['quantity']) ? (int)$t['quantity'] : 1);
        if ($isPaid) $countsPaid[$type] = ($countsPaid[$type] ?? 0) + $qty; else $countsUnpaid[$type] = ($countsUnpaid[$type] ?? 0) + $qty;
    }
}
print_r(['paid'=>$countsPaid,'unpaid'=>$countsUnpaid]);
