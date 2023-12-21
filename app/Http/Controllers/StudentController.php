<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreAssignmentRequest;
use App\Models\Classroom;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use App\Models\Assignment;

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

    public function edit($id)
    {
        $student = Student::findOrFail($id);
        $classrooms = Classroom::all();
    
        return view('students.edit', compact('student', 'classrooms'));
    }

    public function store(StoreStudentRequest $request)
    {
        try {
            $validated = $request->validated();
            $student = Student::create($validated);
            return redirect()->route('students.show', $student->id)->with('success', 'Student created successfully');
        } catch (\Exception $e) {
            $errors = collect([$e->getMessage()]); // Collect error message in a collection
            return back()->withInput()->withErrors($errors);
        }
    }

    public function show(Student $student)
    {
        return view('students.show', compact('student'));
    }

    public function update(UpdateStudentRequest $request, Student $student)
    {
        try {
            $validated = $request->validated();
            $student->update($validated);
            return redirect()->route('students.show', $student->id)->with('success', 'Student updated successfully');
        } catch (\Exception $e) {
            \Log::error('Student update error: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to update student. Please try again.');
        }
    }

    public function destroy(Student $student)
    {
        try {
            $student->delete();
            return redirect()->route('students.index')->with('success', 'Student deleted successfully');
        } catch (\Exception $e) {
            \Log::error('Student deletion error: ' . $e->getMessage());
            return back()->with('error', 'Failed to delete student. Please try again.');
        }
    }

    public function showAssignToClassroomForm(Student $student)
{
    $classrooms = Classroom::all();

    return view('students.assign_to_classroom_form', compact('student', 'classrooms'));
}

public function assignOrUpdateAssignment(StoreAssignmentRequest $request, Student $student, Assignment $assignment = null)
{
    $validated = $request->validated();

    if ($assignment) {
        $assignment->update($validated);
    } else {
        $student->assignments()->updateOrCreate(
            ['student_id' => $student->id],
            $validated
        );
    }

    return redirect()->route('students.show', $student);
}

}
