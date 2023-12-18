<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationApiController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\EmailVerificationController;
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

Route::post('/signup', [AuthController::class, 'sign_up']);

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Auth::routes(['verify' => true]);
Route::middleware('auth:sanctum')->get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');

// Route to resend email verification
Route::middleware('auth:sanctum')->post('/email/resend', [EmailVerificationController::class, 'resend'])->name('verification.send');

Route::middleware('auth:sanctum')->group(function () {
    Route::post('/import/excel', [ExcelImportController::class, 'import']);
    // Add other authenticated routes here
});