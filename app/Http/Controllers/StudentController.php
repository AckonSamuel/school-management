<?php

namespace App\Http\Controllers;

use App\Models\Classroom;
use App\Http\Requests\StoreStudentRequest;
use App\Http\Requests\UpdateStudentRequest;
use App\Models\Student;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;

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

    public function edit(Student $student)
    {
        return view('students.edit', compact('student'));
    }

    public function store(StoreStudentRequest $request)
    {
        try {
            $validated = $request->validated();
            $student = Student::create($validated);
            return redirect()->route('students.show', $student->id)->with('success', 'Student created successfully');
        } catch (\Exception $e) {
            \Log::error('Student creation error: ' . $e->getMessage());
            return back()->withInput()->with('error', 'Failed to create student. Please try again.');
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
}
