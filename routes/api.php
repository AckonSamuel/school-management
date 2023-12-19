<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\VerificationApiController;
use App\Http\Controllers\ExcelImportController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\TeacherController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application.
| These routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group.
|
*/

// Public routes
Route::post('/signup', [AuthController::class, 'sign_up']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/password/reset', [AuthController::class, 'resetPassword']);

// Authenticated routes protected by Sanctum
Route::middleware('auth:sanctum')->group(function () {
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    Route::post('/logout', [AuthController::class, 'logout']);
    Route::post('/import/excel', [ExcelImportController::class, 'import']);
    // Add other authenticated routes here
});

// Email verification routes (not requiring authentication)
Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [EmailVerificationController::class, 'resend'])->name('verification.send');
Route::get('/teachers/pdf', [TeacherController::class, 'createPDF'])->name('teachers.pdf');
Route::get('/teachers/excel', [TeacherController::class, 'exportToExcel']);
