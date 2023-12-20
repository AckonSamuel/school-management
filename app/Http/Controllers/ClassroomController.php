<?php

namespace App\Http\Controllers;

use App\Http\Requests\ClassroomAddUpdateRequest;
use App\Models\Classroom;
use Illuminate\Database\QueryException;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $classrooms = Classroom::all();
            return $classrooms->toArray();
        } catch (QueryException $exception) {
            return response()->json(['error' => 'Failed to retrieve classrooms.'], 500);
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ClassroomAddUpdateRequest $request)
    {
        try {
            $classroom = Classroom::create($request->validated());
            return $classroom->toArray();
        } catch (QueryException $exception) {
            return response()->json(['error' => 'Failed to store classroom.'], 500);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Classroom $classroom)
    {
        return $classroom->toArray();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateClassroomRequest $request, Classroom $classroom)
    {
        try {
            $classroom->update($request->validated());
            return $classroom->toArray();
        } catch (QueryException $exception) {
            return response()->json(['error' => 'Failed to update classroom.'], 500);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Classroom $classroom)
    {
        try {
            $classroom->delete();
            return ['message' => 'Classroom deleted successfully'];
        } catch (QueryException $exception) {
            return response()->json(['error' => 'Failed to delete classroom.'], 500);
        }
    }
}
