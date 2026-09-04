<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();
use App\Models\PurchaseOrder;
use App\Enum\PurchaseOrderStatus;

echo 'paid:'.PurchaseOrder::where('status', PurchaseOrderStatus::PAID->value)->count()."\n";
echo 'notPaid:'.PurchaseOrder::where('status', PurchaseOrderStatus::NEW->value)->count()."\n";
