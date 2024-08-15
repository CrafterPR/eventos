<?php

use App\Http\Controllers\Apps\DelegateController;
use App\Http\Controllers\Apps\PermissionManagementController;
use App\Http\Controllers\Apps\RoleManagementController;
use App\Http\Controllers\Apps\UserManagementController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\VoteManagementController;
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

        Route::get('/', [DashboardController::class, 'index']);

        Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

        Route::prefix('acl')->name('users.')->group(function () {
            Route::resource('user', UserManagementController::class);
            Route::resource('voter', DelegateController::class);
            Route::resource('role', RoleManagementController::class);
            Route::resource('permission', PermissionManagementController::class);
            Route::get('send-email', [UserManagementController::class, 'viewSendEmail'])->name('send-email');
            Route::post('send-email', [UserManagementController::class, 'sendEmail'])->name('emails.send');
        });

        Route::prefix('vote')->name('vote.')->group(function () {
            Route::get('manage-periods', [VoteManagementController::class, 'periods'])
                ->middleware('can:view-voting-periods')->name('view-periods');
            Route::get('manage-positions', [VoteManagementController::class, 'positions'])
                ->middleware('can:view-voting-positions')->name('view-positions');
            Route::get('manage-contestants', [VoteManagementController::class, 'contestants'])
                ->middleware('can:view-contestants')->name('view-contestants');
            Route::get('voters', [VoteManagementController::class, 'voters'])
                ->middleware('can:view-voters')->name('view-voters');
            Route::post('send-email', [UserManagementController::class, 'sendEmail'])->name('emails.send');
        });


});

Route::get('/error', function () {
    abort(500);
});



require __DIR__ . '/auth.php';
