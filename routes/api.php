<?php

use App\Http\Controllers\BreedController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\SpecieController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'v2', 'namespace' => 'App\Http\Controllers'], function () {
    Route::apiResources([
        'breeds' => BreedController::class,
        'customers' => CustomerController::class,
        'pets' => PetController::class,
        'medical-histories' => MedicalHistoryController::class,
        'consultations' => ConsultationController::class,
        'users' => UserController::class,
    ]);

    Route::apiResource('species', SpecieController::class)->parameter('species', 'specie');

    Route::fallback(function () {
        return response([
            'message' => 'Error 404. The route does not exist. Not Found!',
            'status' => 404
        ], 404);
    });
});
