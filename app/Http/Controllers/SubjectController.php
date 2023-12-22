<?php
namespace App\Http\Controllers;

use App\Http\Requests\StoreSubjectRequest;
use App\Http\Requests\UpdateSubjectRequest;
use App\Models\Subject;

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
            return view('subjects.show', compact('subject'))->with('success', 'Subject created successfully');
        } catch (\Exception $exception) {
            return view('error')->with('error', $exception->getMessage());
        }
    }    

    /**
     * Display the specified resource.
     */
    public function show(Subject $subject)
    {
        try {
            return view('subjects.show', compact('subject'));
        } catch (\Exception $exception) {
            return view('error')->with('error', $exception->getMessage());
        }
    }
    

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateSubjectRequest $request, Subject $subject)
    {
        try {
            $validated = $request->validated();
            $subject->update($validated);
            return view('subjects.show', compact('subject'))->with('success', 'Subject updated successfully');
        } catch (\Exception $exception) {
            return view('error')->with('error', $exception->getMessage());
        }
    }

    public function edit($id)
    {
        $subject = Subject::findOrFail($id);
    
        return view('subjects.edit', compact('subject'));
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Subject $subject)
    {
        try {
            $subject->delete();
            return redirect()->route('subjects.index')->with('success', 'Subject deleted successfully');
        } catch (\Exception $exception) {
            return view('error')->with('error', $exception->getMessage());
        }
    }
}
