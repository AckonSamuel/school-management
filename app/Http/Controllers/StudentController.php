<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Assignment;
use App\Models\Classroom;
use App\Models\Student;
use App\Models\Subject;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();

        return view('students.index', compact('students'));
    }

    public function create()
    {
        $classrooms = Classroom::all(); // Fetch classrooms data

        return view('students.create', compact('classrooms'));
    }

    public function store(StoreStudentRequest $request)
    {
        try {
            $validated = $request->validated();
            $student = Student::create($validated);

            return redirect()->route('students.show', $student->id)->with('success', 'Student created successfully');
        } catch (Exception $e) {
            $errors = collect([$e->getMessage()]); // Collect error message in a collection

            return back()->withInput()->withErrors($errors);
        }
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classrooms = Classroom::all();

        return view('students.edit', compact('student', 'classrooms'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {
            $validated = $request->validated();
            $student->update($validated);

            return redirect()->route('students.show', $student->id)->with('success', 'Student updated successfully');
        } catch (Exception $e) {
            Log::error('Student update error: ' . $e->getMessage());

            return back()->withInput()->with('error', 'Failed to update student. Please try again.');
        }
    }

    public function destroy(Student $student)
    {
        try {
            $student->delete();

            return redirect()->route('students.index')->with('success', 'Student deleted successfully');
        } catch (Exception $e) {
            Log::error('Student deletion error: ' . $e->getMessage());

            return back()->with('error', 'Failed to delete student. Please try again.');
        }
    }

    public function showAssignToClassroomForm(Student $student)
    {
        $classrooms = Classroom::all();

        return view('students.assign_to_classroom_form', compact('student', 'classrooms'));
    }

    public function assignOrUpdateAssignment(UpdateAssignmentRequest $request)
    {
        $validated = $request->validated();

        Assignment::create($validated);

        return redirect()->route('students.index');
    }

    public function assignStudentToSubject(Request $request)
    {
        // Validate request
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'subject_id' => 'required|exists:subjects,id',
        ]);

        $student = Student::findOrFail($request->input('student_id'));
        $student->subjects()->attach($request->input('subject_id'));

        return redirect()->back()->with('success', 'Student assigned to subject successfully.');
    }

    public function assignStudentToClassroom(Request $request)
    {
        // Validate request
        $request->validate([
            'student_id' => 'required|exists:students,id',
            'classroom_id' => 'required|exists:classrooms,id',
        ]);

        $student = Student::findOrFail($request->input('student_id'));
        $student->classrooms()->attach($request->input('classroom_id'));

        return redirect()->back()->with('success', 'Student assigned to classroom successfully.');
    }

    public function assignStudentToClassroomForm()
    {
        $students = Student::all();
        $classrooms = Classroom::all();

        return view('students.assign_students_to_classrooms_form', compact('students', 'classrooms'));
    }

    public function assignStudentToSubjectForm()
    {
        $students = Student::all();
        $subjects = Subject::all();

        return view('students.assign_students_to_subjects_form', compact('students', 'subjects'));
    }
}
