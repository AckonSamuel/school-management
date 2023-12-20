<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomAddUpdateRequest;
use App\Models\Classroom;
use Illuminate\Database\QueryException;

class ClassroomController extends Controller
{
    public function index()
    {
            $classrooms = Classroom::all();
            return view('classrooms.index', compact('classrooms'));
    }

    public function create()
    {
        return view('classrooms.create');
    }

    public function store(ClassroomAddUpdateRequest $request)
    {
        try {
            $classroom = Classroom::create($request->validated());
            return redirect()->route('classrooms.show', $classroom->id)->with('success', 'Classroom created successfully');
        } catch (QueryException $exception) {
            return back()->withInput()->with('error', 'Failed to store classroom.');
        }
    }

    public function show(Classroom $classroom)
    {
        return view('classrooms.show', compact('classroom'));
    }

    public function edit(Classroom $classroom)
    {
        return view('classrooms.edit', compact('classroom'));
    }

    public function update(ClassroomAddUpdateRequest $request, Classroom $classroom)
    {
        try {
            $classroom->update($request->validated());
            return redirect()->route('classrooms.show', $classroom->id)->with('success', 'Classroom updated successfully');
        } catch (QueryException $exception) {
            return back()->withInput()->with('error', 'Failed to update classroom.');
        }
    }

    public function destroy(Classroom $classroom)
    {
        try {
            $classroom->delete();
            return redirect()->route('classrooms.index')->with('success', 'Classroom deleted successfully');
        } catch (QueryException $exception) {
            return back()->with('error', 'Failed to delete classroom.');
        }
    }
}
