<?php

use Illuminate\Http\Request;
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

Route::post('/register', [\App\Http\Controllers\Api\AuthController::class, 'register']);
Route::post('/login', [\App\Http\Controllers\Api\AuthController::class, 'login']);

Route::get('email/verify/{id}', [App\Http\Controllers\Api\AuthController::class, 'verify'])->name('verification.verify');
Route::post('email/resend', [App\Http\Controllers\Api\AuthController::class, 'resend'])->name('verification.resend');

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource("/animal", App\Http\Controllers\Api\AnimalController::class);
    Route::apiResource("/cage", App\Http\Controllers\Api\CageController::class);
    Route::post('/logout', [\App\Http\Controllers\Api\AuthController::class, 'logout']);
});
