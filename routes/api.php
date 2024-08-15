<?php

use App\Http\Controllers\API\UssdController;
use Illuminate\Support\Facades\Route;

route::prefix('v1')->name('.ussd')->group(function() {

Route::post('ussd',[UssdController::class, 'index'])->name('index');

});

