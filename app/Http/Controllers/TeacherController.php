<?php

namespace App\Http\Controllers\API;

use PDF;
use App\Exports\ExcelExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        try {
            $teachers = Teacher::with('subjects')->paginate(10);
            return response()->json($teachers);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function store(StoreTeacherRequest $request)
    {
        try {
            $validated = $request->validated();
            $teacher = Teacher::create($validated);
            return response()->json($teacher, 201);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function show(Teacher $teacher)
    {
        try {
            return response()->json($teacher);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Teacher not found'], 404);
        }
    }

    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        try {
            $validated = $request->validated();
            $teacher->update($validated);
            return response()->json($teacher);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function destroy(Teacher $teacher)
    {
        try {
            $teacher->delete();
            return response()->json(['message' => 'Teacher deleted successfully']);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Something went wrong'], 500);
        }
    }

    public function createPDF()
    {
        try {
            $teachers = Teacher::all()->toArray();

            $pdf = \PDF::loadView('teacherspdf', compact('teachers'))
                ->setPaper('a4') // Set the paper size to A4
                ->setOptions([
                    'dpi' => 150,
                    'defaultFont' => 'sans-serif', // Set default font
                    'isHtml5ParserEnabled' => true, // Enable HTML5 parsing
                    'isRemoteEnabled' => true, // Enable remote file access
                    'font_size' => 12, // Set font size (example: 12)
                ]);

            $pdfContent = $pdf->output();

            $headers = [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'attachment; filename="teachers_pdf_file.pdf"',
                'Content-Length' => strlen($pdfContent),
            ];

            return response()->streamDownload(function () use ($pdfContent) {
                echo $pdfContent;
            }, 'teachers_pdf_file.pdf', $headers);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('PDF generation error: ' . $e->getMessage());

            // Handle the error (e.g., return a response with an error message)
            return response()->json(['error' => 'PDF generation failed. Please try again later.'], 500);
        }

    }
    public function exportToExcel()
    {
        $teachers = Teacher::all()->toArray();
        $export = new ExcelExport();
        return $export->exportDataToExcel($teachers);
    }
}
