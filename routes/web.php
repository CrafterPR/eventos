<?php

use App\Actions\GenerateCertificate;
use App\Actions\GeneratePaymentReceipt;
use App\Http\Controllers\Apps\DelegateController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\PesaflowController;
use App\Http\Livewire\Delegate\ImportDelegatesModal;
use App\Models\Delegate;
use Illuminate\Support\Facades\Route;

Route::get('kicp2/programme', function () {
    return response()->file(public_path('assets/media/2ND KICP PROGRAMME 25102026.pdf'));
})->name('programme');

Route::get('certificates/{delegate}', GenerateCertificate::class)->name('certificates.show');

Route::get('certificate-validate/{serial_number}', function (string $serial_number) {
    $delegate = Delegate::query()
        ->with('event')
        ->where('serial_number', $serial_number)
        ->firstOrFail();

    return view('certificates.validate', compact('delegate'));
})->name('certificate-validate');

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
    Route::post('user/access-token', GeneratePaymentReceipt::class);

    Route::middleware('auth')->group(function () {
        Route::get('/', [DashboardController::class, 'index']);

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        // Tickets purchase page for delegates and other users
        Route::get('/tickets', [App\Http\Controllers\TicketController::class, 'index'])->name('tickets.index');
        Route::get('/tickets/{purchaseOrder}/tickets/{ticketIndex}/print', [App\Http\Controllers\TicketController::class, 'printTicket'])
            ->whereNumber('ticketIndex')->name('tickets.print');
        Route::get('/tickets/{purchaseOrder}', [App\Http\Controllers\TicketController::class, 'show'])->name('tickets.show');

        // Purchase orders management
        Route::middleware(['can:event-management'])->prefix('events')->name('events.')->group(function () {
            Route::get('payment-requests', [App\Http\Controllers\Apps\PaymentRequestsController::class, 'index'])
                ->name('payment-requests.index');
            Route::get('payment-requests/export', [App\Http\Controllers\Apps\PaymentRequestsController::class, 'export'])
                ->name('payment-requests.export');
            Route::get('purchases', [App\Http\Controllers\TicketController::class, 'orders'])->name('purchases.index');
            Route::get('sponsorships', [App\Http\Controllers\Apps\SponsorshipManagementController::class, 'index'])
                ->name('sponsorships.index');
            Route::get('purchases/export', [App\Http\Controllers\Apps\PurchaseManagementController::class, 'export'])->name('purchases.export');
            Route::resource('delegates', DelegateController::class);
            Route::get('purchases/{purchaseOrder}', [App\Http\Controllers\Apps\PurchaseManagementController::class, 'show'])->name('purchases.show');
            Route::post('purchases/{purchaseOrder}/receipt', [App\Http\Controllers\Apps\PurchaseManagementController::class, 'uploadReceipt'])->name('purchases.receipt.upload');
            Route::post('purchases/{purchaseOrder}/approve', [App\Http\Controllers\Apps\PurchaseManagementController::class, 'approve'])->name('purchases.approve');
            Route::post('purchases/{purchaseOrder}/resend-reminder', [App\Http\Controllers\Apps\PurchaseManagementController::class, 'resendReminder'])->name('purchases.resend_reminder');
            Route::post(
                'purchases/{purchaseOrder}/mark-paid',
                [App\Http\Controllers\Apps\PurchaseManagementController::class, 'markAsPaid']
            )->name('purchases.mark_paid');
            Route::post('purchases/{purchaseOrder}/generate-delegates', [App\Http\Controllers\Apps\PurchaseManagementController::class, 'generateDelegates'])->name('purchases.generate_delegates');
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
                ->middleware('can:checkin-event');
        });
        Route::middleware(['can:view-reports'])->prefix('reports')->name('reports.')->group(function () {
            Route::get('exports', [ExportController::class, 'index'])->name('index');
            Route::post('export', [ExportController::class, 'export'])->name('export');
            Route::get('delegate-activity', [App\Http\Controllers\Apps\DelegateActivityController::class, 'index'])
                ->name('delegate-activity.index');
            Route::get('delegate-activity/export', [App\Http\Controllers\Apps\DelegateActivityController::class, 'export'])
                ->name('delegate-activity.export');
        });
    });

    Route::impersonate();
});

Route::group(['prefix' => 'pesaflow', 'as' => 'pesaflow.'], function () {
    Route::get('redirect-callback', [PesaflowController::class, 'callback'])->name('redirect');
});

Route::get('/error', function () {
    abort(500);
});

require __DIR__ . '/auth.php';
