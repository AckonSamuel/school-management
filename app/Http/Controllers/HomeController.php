<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Models\Student;
use App\Models\Teacher;
use App\Models\Subject;
use Illuminate\Database\QueryException;

class HomeController extends Controller
{
    public function index() {
        $studentsCount = Student::count();
        $teachersCount = Teacher::count();
        $subjectsCount = Subject::count();
        $classroomsCount = Classroom::count();
    
        return view('dashboard', compact('studentsCount', 'teachersCount', 'subjectsCount', 'classroomsCount'));
    }
}