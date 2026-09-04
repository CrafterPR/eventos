<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
use App\Models\PurchaseOrder;
use App\Enum\PurchaseOrderStatus;

$pos = PurchaseOrder::select('id','reference','status')->get();
foreach($pos as $po){
    echo "PO: {$po->reference}\n";
    echo "raw status type: " . gettype($po->status) . "\n";
    if (is_object($po->status)){
        echo "status class: " . get_class($po->status) . "\n";
        if (method_exists($po->status,'value')){
            echo "status->value: " . $po->status->value . "\n";
        }
    } else {
        echo "status value: " . var_export($po->status,true) . "\n";
    }
    echo "compare == PAID->value: "; var_export($po->status == PurchaseOrderStatus::PAID->value); echo "\n";
    echo "compare === PAID->value: "; var_export($po->status === PurchaseOrderStatus::PAID->value); echo "\n";
    echo "compare === PAID enum: "; var_export($po->status === PurchaseOrderStatus::PAID); echo "\n";
    echo "---\n";
}
