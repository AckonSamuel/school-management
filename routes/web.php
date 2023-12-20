<?php

use App\Http\Controllers\TeacherController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/verified', function () {
    return view('verified'); 
});

Route::get('/teachers/create', [TeacherController::class, 'create'])->name('teachers.create');

Route::get('/teachers/store', function () {
    return view('teachers.store');
} );

Route::get('/teachers/{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
Route::post('/teachers', [TeacherController::class, 'store'])->name('teachers.store');
Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');
Route::get('/teachers/{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
Route::delete('/teachers/{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
Route::put('/teachers/{teacher}', [TeacherController::class, 'update'])->name('teachers.update');