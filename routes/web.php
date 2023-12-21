<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/verified', function () {
    return view('verified'); 
});

// Grouping teacher routes
Route::prefix('teachers')->group(function () {
    Route::get('create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::get('store', function () {
        return view('teachers.store');
    });
    Route::get('{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::post('/', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::delete('{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
    Route::put('{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
});

// Grouping student routes
Route::prefix('students')->group(function () {
    Route::get('create', [StudentController::class, 'create'])->name('students.create');
    Route::get('store', function () {
        return view('students.store');
    });
    Route::get('{student}', [StudentController::class, 'show'])->name('students.show');
    Route::post('/', [StudentController::class, 'store'])->name('students.store');
    Route::get('/', [StudentController::class, 'index'])->name('students.index');
    Route::get('{student}/edit', [StudentController::class, 'edit'])->name('students.edit');
    Route::delete('{student}', [StudentController::class, 'destroy'])->name('students.destroy');
    Route::put('{student}', [StudentController::class, 'update'])->name('students.update');
});

Route::prefix('classrooms')->group(function () {
    Route::get('/', [ClassroomController::class, 'index'])->name('classrooms.index');
    Route::post('/', [ClassroomController::class, 'store'])->name('classrooms.store');
    Route::get('/{classroom}', [ClassroomController::class, 'show'])->name('classrooms.show');
    Route::put('/{classroom}', [ClassroomController::class, 'update'])->name('classrooms.update');
    Route::delete('/{classroom}', [ClassroomController::class, 'destroy'])->name('classrooms.destroy');
});

Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::get('logout', function () {
    return view('auth.logout');
});

Route::get('sign_up', function () {
    return view('auth.sign_up');
});

Route::get('/', function () {
    return view('dashboard');
});
Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/sign_up', [AuthController::class, 'sign_up'])->name('sign_up');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [EmailVerificationController::class, 'resend'])->name('verification.send');

// PDF route
Route::get('/teachers/pdf', [TeacherController::class, 'createPDF'])->name('teachers.pdf');

// Excel route
Route::get('/teachers/excel', [TeacherController::class, 'exportToExcel'])->name('teachers.excel');