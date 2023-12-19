<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Imports\ExcelImport;

class ImportController extends Controller
{
    public function importData(Request $request)
    {
        // Validate the request, ensuring the file is present
        $request->validate([
            'file' => 'required|mimes:xlsx,xls|max:2048', // Adjust file types and size as needed
            'model' => 'required|string', // New parameter for the model class name
        ]);

        $file = $request->file('file');
        $modelClassName = 'App\Models\\' . $request->input('model'); // Assuming input is the model class name

        try {
            $importer = new ExcelImport();
            $importer->importData($file->getRealPath(), $modelClassName); // Pass model class name

            return response()->json(['message' => 'Data imported successfully'], 200);
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('API data import error: ' . $e->getMessage());

            return response()->json(['error' => 'Failed to import data.'], 500);
        }
    }
}
