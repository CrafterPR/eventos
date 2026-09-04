<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Models\PurchaseOrder;
use App\Enum\PurchaseOrderStatus;
use Illuminate\Support\Facades\DB;

$c = PurchaseOrder::where('status', PurchaseOrderStatus::PAID->value)
    ->select('currency', DB::raw('SUM(amount) as total'))
    ->groupBy('currency')
    ->get()
    ->pluck('total','currency');

$keys = $c->keys()->all();
var_dump(array_map(function($k){ return is_object($k) ? get_class($k) : gettype($k); }, $keys));
var_dump($keys);

foreach($keys as $k) {
    echo "KEY: ";
    if (is_object($k)) {
        echo get_class($k) . "\n";
        var_dump($k);
    } else {
        echo gettype($k) . " - "; var_dump($k);
    }
}

echo "Done\n";
