<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\PurchaseOrder;
use App\Enum\PurchaseOrderStatus;

$pos = PurchaseOrder::all();
echo "Total PO: " . $pos->count() . "\n";
foreach($pos as $po){
    echo "PO: " . $po->id . " ref:" . $po->reference . " status: ";
    if ($po->status instanceof \BackedEnum) {
        echo $po->status->value;
    } else {
        echo gettype($po->status) . ':' . var_export($po->status, true);
    }
    echo "\n";
    echo "tickets: ";
    var_export($po->tickets);
    echo "\n---\n";
}
