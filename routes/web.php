<?php

use App\Actions\GeneratePaymentReceipt;
use App\Http\Controllers\PesaflowController;
use App\Http\Controllers\Apps\DelegateController;
use App\Http\Controllers\Apps\ExhibitorController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExportController;
use App\Http\Livewire\Delegate\ImportDelegatesModal;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth', 'verified'])->group(function () {
    Route::post("user/access-token", GeneratePaymentReceipt::class);

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Tickets purchase page for delegates and other users
        Route::get('/tickets', [\App\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');
        Route::get('/tickets/{purchaseOrder}', [\App\Http\Controllers\TicketController::class, 'show'])->name('tickets.show');

        // Purchase orders management
        Route::middleware(['can:event-management'])->prefix('events')->name('events.')->group(function () {
            Route::get('purchases', [\App\Http\Controllers\Apps\PurchaseManagementController::class, 'index'])->name('purchases.index');
            Route::resource('delegates', DelegateController::class);
            Route::get('purchases/{purchaseOrder}', [\App\Http\Controllers\Apps\PurchaseManagementController::class, 'show'])->name('purchases.show');
            Route::post('purchases/{purchaseOrder}/receipt', [\App\Http\Controllers\Apps\PurchaseManagementController::class, 'uploadReceipt'])->name('purchases.receipt.upload');
            Route::post('purchases/{purchaseOrder}/approve', [\App\Http\Controllers\Apps\PurchaseManagementController::class, 'approve'])->name('purchases.approve');
            Route::post('purchases/{purchaseOrder}/resend-reminder', [\App\Http\Controllers\Apps\PurchaseManagementController::class, 'resendReminder'])->name('purchases.resend_reminder');
        });

        Route::middleware(['can:user-management'])->name('users.')->group(function () {
            Route::resource('user-management/user', UserManagementController::class)
                ->middleware('can:manage-staff');
            Route::get('delegates/import', ImportDelegatesModal::class)->name('delegates.import');
            Route::post('print-count', [DelegateController::class, 'increment'])->name('delegate.print-count');
            Route::resource('user-management/role', RoleManagementController::class);
            Route::resource('user-management/permission', PermissionManagementController::class);
            Route::get('send-email', [UserManagementController::class, 'viewSendEmail'])->name('send-email');
            Route::post('send-email', [UserManagementController::class, 'sendEmail'])->name('emails.send');
        });

        // manage events
        Route::middleware(['can:events-management'])->name('events.')->group(function () {
            Route::resource('manage-events', EventController::class)
                ->middleware('can:manage-events');
            Route::get('{event}/checkin', [EventController::class, 'checkin'])->name('delegates.checkin')
                ->middleware('can:checkin-event');
            Route::post('{event}/checkin', [EventController::class, 'store'])->name('delegates.checkin.store')
                ->middleware('can:checkin-event');;

        });
        Route::middleware(['can:view-reports'])->prefix('reports')->name('reports.')->group(function () {
            Route::get('exports', [ExportController::class, 'index'])->name('index');
            Route::post('export', [ExportController::class, 'export'])->name('export');

        });


    });


    Route::impersonate();
});

Route::group(["prefix" => "pesaflow", "as" => "pesaflow."], function () {
    Route::get("redirect-callback", [PesaflowController::class, "callback"])->name("redirect");
    Route::get("invoice-link/{order}", [PesaflowController::class, "invoice_link"])->name("invoice_link");

});

Route::get('/error', function () {
    abort(500);
});


require __DIR__ . '/auth.php';
