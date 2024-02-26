<?php

namespace App\Http\Controllers\API;

use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAssignmentRequest;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateAssignmentRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Assignment;
use App\Models\Teacher;
use Exception;
use Illuminate\Support\Facades\Log;
use PDF;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $teachers = Teacher::all();

        return view('teachers.index', compact('teachers'));
    }

    public function create()
    {
        return view('teachers.create');
    }

    public function store(StoreTeacherRequest $request)
    {
        try {
            $validated = $request->validated();
            $teacher = Teacher::create($validated);

            return redirect()->route('teachers.show', $teacher->id)->with('success', 'Teacher created successfully');
        } catch (Exception $e) {
            Log::error('Teacher creation error: ' . $e->getMessage());

            return back()->withInput()->with('error', 'Failed to create teacher. Please try again.');
        }
    }

    public function show(Teacher $teacher)
    {
        return view('teachers.show', compact('teacher'));
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        try {
            $validated = $request->validated();
            $teacher->update($validated);

            return redirect()->route('teachers.show', $teacher->id)->with('success', 'Teacher updated successfully');
        } catch (Exception $e) {
            Log::error('Teacher update error: ' . $e->getMessage());

            return back()->withInput()->with('error', 'Failed to update teacher. Please try again.');
        }
    }

    public function destroy(Teacher $teacher)
    {
        try {
            $teacher->delete();

            return redirect()->route('teachers.index')->with('success', 'Teacher deleted successfully');
        } catch (Exception $e) {
            Log::error('Teacher deletion error: ' . $e->getMessage());

            return back()->with('error', 'Failed to delete teacher. Please try again.');
        }
    }

    public function createPDF()
    {
        try {
            $teachers = Teacher::all();

            $pdf = PDF::loadView('teacherspdf', compact('teachers'))
                ->setPaper('a4')
                ->setOptions([
                    'dpi' => 150,
                    'defaultFont' => 'sans-serif',
                    'isHtml5ParserEnabled' => true,
                    'isRemoteEnabled' => true,
                    'font_size' => 12,
                ]);

            return $pdf->download('teachers_pdf_file.pdf');
        } catch (Exception $e) {
            Log::error('PDF generation error: ' . $e->getMessage());

            return back()->with('error', 'PDF generation failed. Please try again later.');
        }
    }

    public function exportToExcel()
    {
        $teachers = Teacher::all()->toArray();
        $export = new ExcelExport;

        return $export->exportDataToExcel($teachers);
    }

    public function edit(Teacher $teacher)
    {
        return view('teachers.edit', compact('teacher'));
    }

    public function assignSubject(StoreAssignmentRequest $request, Teacher $teacher)
    {
        $validated = $request->validated();

        $assignment = new Assignment($validated);
        $teacher->assignments()->save($assignment);

        return redirect()->route('teachers.show', $teacher);
    }

    public function updateAssignment(UpdateAssignmentRequest $request, Teacher $teacher, Assignment $assignment)
    {
        $validated = $request->validated();

        $assignment->update($validated);

        return redirect()->route('teachers.show', $teacher);
    }
}
