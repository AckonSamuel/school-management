<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;
use Exception;
use Log;

class SubjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $subjects = Subject::all();

        return view('subjects.index', compact('subjects'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreSubjectRequest $request)
    {
        try {
            $validated = $request->validated();
            $subject = Subject::create($validated);

            return view('subjects.show', ['success' => 'Subject created successfully']);
        } catch (Exception $e) {
            Log::error('Subject creation error: ' . $e->getMessage());

            return back()->withInput()->with('error', 'Failed to Subject teacher. Please try again.');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        try {
            return view('subjects.show', compact('subject'));
        } catch (Exception $exception) {
            return view('error', ['error' => $exception->getMessage()]);
        }
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);

        return view('subjects.edit', compact('subject'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        try {
            $validated = $request->validated();
            $subject->update($validated);

            return view('subjects.show', ['success' => 'Subject updated successfully']);
        } catch (Exception $exception) {
            return view('error', ['error' => $exception->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();

            return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully');
        } catch (Exception $exception) {
            return view('error', ['error' => $exception->getMessage()]);
        }
    }
}
