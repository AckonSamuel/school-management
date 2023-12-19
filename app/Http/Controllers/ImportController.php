<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PhpOffice\PhpSpreadsheet\IOFactory;
use Ramsey\Uuid\Uuid;

class ImportController extends Controller
{
    public function importData(Request $request)
    {
        // Validate the incoming request, ensuring a file and model are provided
        $request->validate([
            'file' => 'required|mimes:xlsx,xls',
            'model' => 'required'
        ]);
    
        try {
            $file = $request->file('file');
            $modelClassName = 'App\Models\\' . $request->input('model');
    
            $spreadsheet = IOFactory::load($file);
            $sheet = $spreadsheet->getActiveSheet();
    
            $rows = $sheet->toArray();
            $headers = array_shift($rows);
    
            foreach ($rows as $row) {
                $data = array_combine($headers, $row);
    
                // Remove 'id' field from the data array
                unset($data['id']);
    
                $modelClassName::create($data);
            }
    
            return response()->json(['message' => 'Data imported successfully now'], 200);
        } catch (\Exception $e) {
            \Log::error('Excel import error: ' . $e->getMessage());
    
            return response()->json(['error' => 'Failed to import Excel data'], 500);
        }
    }
    

    private function generateNewId()
    {
        return Uuid::uuid4()->toString();
    }
}
