<?php

use App\Actions\GeneratePaymentReceipt;
use App\Http\Controllers\Apps\DelegateController;
use App\Http\Controllers\Apps\ExhibitorController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\BoothController;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\EventController;
use App\Http\Controllers\ExportController;
use App\Http\Controllers\Payment\PesaflowController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\PortalController;
use App\Http\Controllers\ProgrammeController;
use App\Http\Controllers\SpeakerController;
use App\Http\Controllers\SummitController;
use App\Http\Controllers\TicketController;
use App\Http\Livewire\Delegate\ImportDelegatesModal;
use App\Http\Livewire\ErrorPage;
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

        Route::middleware(['can:user-management'])->name('users.')->group(function () {
            Route::resource('user-management/user', UserManagementController::class);
            Route::resource('exhibitor-management/exhibitors', ExhibitorController::class);
            Route::resource('delegate-management/delegates', DelegateController::class);
            Route::get('delegates/import', ImportDelegatesModal::class)->name('delegates.import');
            Route::resource('user-management/role', RoleManagementController::class);
            Route::resource('user-management/permission', PermissionManagementController::class);
            Route::get('send-email', [UserManagementController::class, 'viewSendEmail'])->name('send-email');
            Route::post('send-email', [UserManagementController::class, 'sendEmail'])->name('emails.send');
        });
        // manage tickets
        Route::middleware(['can:ticket-management'])->name('tickets.')->group(function () {
            Route::resource('manage-tickets', TicketController::class);
            Route::resource('manage-coupons', CouponController::class);
            Route::get('view-purchased', [TicketController::class, 'view_purchased'])->name('view-purchased');
            Route::get('view-purchased/{ticketId}', [TicketController::class, 'view_ticket'])->name('view-ticket');
        });
        // manage events
        Route::middleware(['can:event-management'])->name('events.')->group(function () {
            Route::resource('manage-events', EventController::class);
            Route::get('{event}/checkin', [EventController::class, 'checkin'])->name('delegates.checkin');
            Route::post('{event}/checkin', [EventController::class, 'store'])->name('delegates.checkin.store');

        });

        // manage booths
        Route::middleware(['can:booth-management'])->prefix('booths')->name('booths.')->group(function () {
            Route::resource('booth', BoothController::class);
            Route::get('bookings', [BoothController::class, 'view_bookings'])->name('view-booth-bookings');
            Route::get('booking/{boothId}', [BoothController::class, 'view_ticket'])->name('view-booth');
        });

        Route::middleware(['can:manage-speakers'])->prefix('programme')->name('programme.')->group(function () {
            Route::get('events', [ProgrammeController::class, 'manage_events'])->name('manage-event')
                ->middleware('can:manage-events');
            Route::resource('speakers', SpeakerController::class)->middleware('can:manage-speakers');
        });

        Route::middleware(['can:view-reports'])->prefix('reports')->name('reports.')->group(function () {
            Route::get('exhibitors-paid', [ProgrammeController::class, 'exhibitors'])->name('exhibitors.paid')
                ->middleware('can:manage-events');
            Route::get('delegates-paid', [SpeakerController::class, 'delegates'])->name('delegates.paid');
            Route::get('exports', [ExportController::class, 'index'])->name('index');
            Route::post('export', [ExportController::class, 'export'])->name('export');

        });

        Route::prefix('summits')->name('summits.')->group(function () {
            Route::resource('events', SummitController::class)->middleware('can:manage-summits');
        });

        #payments
        Route::group(["prefix" => "payments", "as" => "payments."], function () {
            Route::get("/", [PaymentController::class, "index"])->name("index");
            Route::get("{invoiceNo}/show", [PaymentController::class, "show"])->name("show");
        });

    });

    #exhibitor, delegate
    Route::group([
        "prefix" => "portal/{userType}",
        "as" => "user_type.",
        "middleware" => ["role:exhibitor|delegate"]
    ], function () {
        Route::get('/', [PortalController::class, "index"])->name('index');
        Route::get('{any}', [PortalController::class, "index"])
            ->where("any", ".*")
            ->name('any');
    });

    Route::group(["prefix" => "portal", "as" => "portal."], function () {
        Route::get("exhibitor/", function () {
            redirect('/portal/exhibitor');
        })->name("exhibitor");
        Route::get("delegate/", function () {
            redirect('/portal/delegate');
        })->name("delegate");
    });

    Route::impersonate();
});

Route::get('/error', function () {
    abort(500);
});

#pesaflow
Route::group(["prefix" => "pesaflow", "as" => "pesaflow."], function () {
    Route::get("redirect-callback", [PesaflowController::class, "callback"])->name("redirect");
    Route::get("invoice-link/{order}", [PesaflowController::class, "invoice_link"])->name("invoice_link");

});

#Validate Ticket & checkin
Route::prefix("ticket")->group(function () {
    Route::get("check-in/{ticket_no}", [TicketController::class, "checkin"])->name("checkin-validate");
});

require __DIR__ . '/auth.php';
