<?php
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PurchaseController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// API endpoint for frontend registration/purchase (stateless - no CSRF required)
Route::prefix('v1')->group(function () {
 Route::post('tickets/purchase', [\App\Http\Controllers\PurchaseController::class, 'store'])->name('purchase.store');
 Route::get('tickets/purchase-status/{id}', [\App\Http\Controllers\PurchaseController::class, 'status'])->name('purchase.status');
 Route::webhooks('pesaflow/notification', 'pesaflow-notification');
});

