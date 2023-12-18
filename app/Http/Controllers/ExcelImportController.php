<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\SchoolImportClass; // Assuming YourImportClass is the class that handles your import logic

class ExcelImportController extends Controller
{
    public function import(Request $request)
    {
        // Validate the uploaded file
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
        ]);
 
        // Get the uploaded file
        $file = $request->file('file');
 
        try {
            // Process the Excel file
            Excel::import(new SchoolImportClass, $file);
            
            // Return a success response
            return response()->json(['message' => 'Excel file imported successfully'], 200);
        } catch (\Exception $e) {
            // Return an error response if something goes wrong
            return response()->json(['error' => 'Failed to import Excel file'], 500);
        }
    }
}
