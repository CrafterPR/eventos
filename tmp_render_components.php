<?php
require __DIR__ . '/vendor/autoload.php';
$app = require __DIR__ . '/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use App\Http\Livewire\Events\TicketPurchasesByCategory;
use App\Http\Livewire\Events\PurchaseOrdersDoughnut;

$tp = new TicketPurchasesByCategory();
$tp->mount();
$view1 = $tp->render();

file_put_contents('debug_ticket_purchases.html', $view1->render());

$pd = new PurchaseOrdersDoughnut();
$pd->mount();
$view2 = $pd->render();
file_put_contents('debug_purchase_doughnut.html', $view2->render());

echo "Rendered files: debug_ticket_purchases.html, debug_purchase_doughnut.html\n";
