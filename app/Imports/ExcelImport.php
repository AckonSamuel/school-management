<?php

namespace App\Imports;

use PhpOffice\PhpSpreadsheet\IOFactory;
use Ramsey\Uuid\Uuid;

class ExcelImport
{
    public function importData($filePath, $modelClassName)
    {
        try {
            $spreadsheet = IOFactory::load($filePath);
            $sheet = $spreadsheet->getActiveSheet();
            
            $rows = $sheet->toArray(); // Fetch all rows from the Excel sheet
            
            // Remove headers if present
            $headers = array_shift($rows);

            $model = new $modelClassName(); // Create an instance of the specified model

            foreach ($rows as $row) {
                // Map headers with data
                $data = array_combine($headers, $row);

                // Check if ID is empty, generate a new UUID
                if (empty($data['id'])) {
                    $data['id'] = $this->generateNewId();
                }

                // Create or update the record
                $model->updateOrCreate([
                    'id' => $data['id']
                ], $data);
            }

            return true; // Import successful
        } catch (\Exception $e) {
            // Log the error for debugging
            \Log::error('Excel import error: ' . $e->getMessage());

            // Return a response with an error message
            return false; // Import failed
        }
    }

    private function generateNewId()
    {
        return Uuid::uuid4()->toString();
    }
}
