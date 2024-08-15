<?php

use App\Http\Controllers\API\BoothController;
use App\Http\Controllers\API\CouponController;
use App\Http\Controllers\API\OrderController;
use App\Http\Controllers\API\ProfileController;
use App\Http\Controllers\API\TicketController;
use App\Http\Controllers\API\UserController;
use App\Http\Controllers\Payment\BoothPaymentController;
use App\Http\Controllers\Payment\TicketPaymentController;
use Illuminate\Support\Facades\Route;

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

#webhooks
Route::prefix("webhooks")->group(function () {
    Route::webhooks('pesaflow/notification', 'pesaflow-notification');
});

Route::post('email_delivered/{email}', [UserController::class, 'delivery_time']);

Route::middleware("auth:sanctum")->group(function () {

    #profile
    Route::prefix("profile")->group(function () {
        Route::get('/', [ProfileController::class, "show"]);
        Route::patch('/', [ProfileController::class, "update"]);
        Route::post('upload-photo', [ProfileController::class, "uploadPhoto"]);
    });

    #users
    Route::apiResource("users", UserController::class, ["only" => ["index", "show"]]);

    #booths
    Route::prefix("booths")->group(function () {
        Route::get("/", [BoothController::class, "index"]);
        Route::get("mine", [BoothController::class, "mine"]);
        Route::post("{boothId}/block", [BoothController::class, "blockBooth"]);
        Route::post("checkout", BoothPaymentController::class);
    });

    #tickets
    Route::prefix("tickets")->group(function () {
        Route::get("/", [TicketController::class, "index"]);
        Route::get("mine", [TicketController::class, "mine"]);
        Route::post("checkout", TicketPaymentController::class);
        Route::get("coupon", [TicketController::class, "coupon"])->name("coupon");
        Route::post("coupon/redeem", [TicketController::class, "redeem"])->name("redeem");
    });

    #orders
    Route::apiResource(
        name: "orders",
        controller: OrderController::class,
        options: ["only" => ["index", "show"]]
    );

    #order query
    Route::get("order/query", [OrderController::class, "query"]);
    Route::post("order/{orderId}/complete", [OrderController::class, "complete"]);
    Route::post("order/{orderId}/check-pesaflow-status", [OrderController::class, "checkPesaflowStatus"]);

    #coupons
    Route::get("coupons", [CouponController::class, "index"]);
});
