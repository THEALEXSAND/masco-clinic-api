<?php

use App\Http\Controllers\CustomerController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v2', 'namespace' => 'App\Http\Controllers'], function () {
    Route::apiResource('customer', CustomerController::class);
});
