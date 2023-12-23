<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmailVerificationController;
use App\Http\Controllers\ClassroomController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ChartJSController;
use Illuminate\Support\Facades\Route;

Route::get('/verified', function () {
    return view('verified');
});

Route::middleware('auth')->group(function () {

    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
Route::get('/', [HomeController::class, 'index'])->name('home');

// Grouping teacher routes
Route::prefix('teachers')->group(function () {
    Route::get('create', [TeacherController::class, 'create'])->name('teachers.create');
    Route::get('{teacher}', [TeacherController::class, 'show'])->name('teachers.show');
    Route::post('/create', [TeacherController::class, 'store'])->name('teachers.store');
    Route::get('/', [TeacherController::class, 'index'])->name('teachers.index');
    Route::get('{teacher}/edit', [TeacherController::class, 'edit'])->name('teachers.edit');
    Route::delete('{teacher}', [TeacherController::class, 'destroy'])->name('teachers.destroy');
    Route::put('{teacher}', [TeacherController::class, 'update'])->name('teachers.update');
    // Route::get('{teacher}/assign', [TeachersController::class, 'showAssignmentForm'])->name('teachers.assignmentForm');
    Route::post('{teacher}/assign', [TeacherController::class, 'assignSubject'])->name('teachers.assign');
    Route::put('{teacher}/assignments/{assignment}', [TeacherController::class, 'updateAssignment'])->name('teachers.updateAssignment');
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
    Route::get('/{student}/assign-to-classroom', [StudentController::class, 'showAssignToClassroomForm'])
        ->name('students.showAssignToClassroomForm');
    Route::post('/assignments', [StudentController::class, 'assignOrUpdateAssignment'])
        ->name('students.assignOrUpdateAssignment');
});

Route::prefix('classrooms')->group(function () {
    Route::get('/', [ClassroomController::class, 'index'])->name('classrooms.index');
    Route::get('/create', function () {
        return view('classrooms.create');
    })->name('classrooms.create');
    Route::post('/', [ClassroomController::class, 'store'])->name('classrooms.store');
    Route::get('/{classroom}', [ClassroomController::class, 'show'])->name('classrooms.show');
    Route::get('{classroom}/edit', [ClassroomController::class, 'edit'])->name('classrooms.edit');
    Route::put('/{classroom}', [ClassroomController::class, 'update'])->name('classrooms.update');
    Route::delete('/{classroom}', [ClassroomController::class, 'destroy'])->name('classrooms.destroy');
});

Route::prefix('subjects')->group(function () {
    Route::get('/', [SubjectController::class, 'index'])->name('subjects.index');
    Route::get('/create', function () {
        return view('subjects.create');
    })->name('subjects.create');
    Route::post('/', [SubjectController::class, 'store'])->name('subjects.store');
    Route::get('/{subject}', [SubjectController::class, 'show'])->name('subjects.show');
    Route::get('{subject}/edit', [SubjectController::class, 'edit'])->name('subjects.edit');
    Route::put('/{subject}', [SubjectController::class, 'update'])->name('subjects.update');
    Route::delete('/{subject}', [SubjectController::class, 'destroy'])->name('subjects.destroy');
});

Route::post('/assign/teacher/classroom', [TeacherController::class, 'assignTeacherToClassroom'])->name('assign.teacher.classroom');

Route::post('/assign/teacher/subject', [TeacherController::class , 'assignTeacherToSubject'])->name('assign.teacher.subject');

Route::post('/assign/student/classroom', [StudentController::class, 'assignStudentToClassroom'])->name('assign.student.classroom');

Route::post('/assign/student/subject', [StudentController::class, 'assignStudentToSubject'])->name('assign.student.subject');

// assignment forms 
Route::get('/assign-teacher-to-classroom', [TeacherController::class, 'assignTeacherToClassroomForm'])->name('assign.teacher.classroom.form');
Route::get('/assign-teacher-to-subject', [TeacherController::class, 'assignTeacherToSubjectForm'])->name('assign.teacher.subject.form');
Route::get('/assign-student-to-classroom', [StudentController::class, 'assignStudentToClassroomForm'])->name('assign.student.classroom.form');
Route::get('/assign-student-to-subject', [StudentController::class, 'assignStudentToSubjectForm'])->name('assign.student.subject.form');


Route::get('logout', function () {
    return view('auth.logout');
})->name('logout');

});


Route::get('/login', function () {
    return view('auth.login');
})->name('auth.login');

Route::get('sign_up', function () {
    return view('auth.sign_up');
});


Route::post('/login', [AuthController::class, 'login'])->name('login');

Route::post('/sign_up', [AuthController::class, 'sign_up'])->name('sign_up');

Route::get('/email/verify/{id}/{hash}', [EmailVerificationController::class, 'verify'])->name('verification.verify');
Route::post('/email/resend', [EmailVerificationController::class, 'resend'])->name('verification.send');