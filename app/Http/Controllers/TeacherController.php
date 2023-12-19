<?php

namespace App\Http\Controllers;

use PDF;
use App\Exports\ExcelExport;
use App\Http\Requests\StoreTeacherRequest;
use App\Http\Requests\UpdateTeacherRequest;
use App\Models\Teacher;

class TeacherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTeacherRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Teacher $teacher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Teacher $teacher)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTeacherRequest $request, Teacher $teacher)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Teacher $teacher)
    {
        //
    }
    
public function createPDF() {
    try {
        $teachers = Teacher::all()->toArray();

        $pdf = PDF::loadView('teacherspdf', compact('teachers'))
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
    $data = Teacher::all()->toArray();
    $export = new ExcelExport();
    return $export->exportDataToExcel($data);
}   
}
