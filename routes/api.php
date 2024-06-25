<?php

use App\Http\Controllers\AnimalBreedController;
use App\Http\Controllers\AnimalTypeController;
use App\Http\Controllers\ConsultationController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\MedicalHistoryController;
use App\Http\Controllers\PetController;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\VaccineRecordController;
use App\Http\Controllers\UserTypeController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



Route::group(['prefix' => 'v1', 'namespace' => 'App\Http\Controllers'], function () {
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('pets', PetController::class);
    Route::post('pets/bulk', ['uses' => 'PetController@bulkStore']);
    Route::apiResource('animal-types', AnimalTypeController::class);
    Route::apiResource('animal-breeds', AnimalBreedController::class);
    Route::apiResource('medical-histories', MedicalHistoryController::class);
    Route::apiResource('consultations', ConsultationController::class);
    Route::apiResource('recipes', RecipeController::class);
    Route::apiResource('medicines', MedicineController::class);
    Route::apiResource('vaccines', VaccineRecordController::class);
    Route::apiResource('user_types', UserTypeController::class);
    Route::apiResource('users', UserController::class);

    

});
