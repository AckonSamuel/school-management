<?php

namespace App\Exports;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

class ExcelExport
{
    public function exportDataToExcel($data)
    {
        try {
            $spreadsheet = new Spreadsheet;
            $sheet = $spreadsheet->getActiveSheet();

            // Set headers (optional)
            $headers = array_keys($data[0]); // Assuming the keys of the first array are headers
            $sheet->fromArray([$headers], null, 'A1');

            // Populate data starting from row 2
            $rowData = [];
            foreach ($data as $rowIndex => $row) {
                $rowData[] = array_values($row);
            }
            $sheet->fromArray($rowData, null, 'A2');

            // Create a temporary file to store the Excel data
            $tempFilePath = tempnam(sys_get_temp_dir(), 'exported_data');
            $writer = new Xlsx($spreadsheet);
            $writer->save($tempFilePath);

            // Store the Excel file in Laravel's storage
            $fileName = 'exported_data.xlsx';
            Storage::disk('local')->put($fileName, file_get_contents($tempFilePath));

            // Get the file content from storage
            $fileContent = Storage::disk('local')->get($fileName);

            // Return a downloadable response
            return response()->make($fileContent, 200, [
                'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                'Content-Disposition' => 'attachment; filename="' . $fileName . '"',
            ]);
        } catch (Exception $e) {
            // Log the error for debugging
            Log::error('Excel export error: ' . $e->getMessage());

            // Return a response with an error message
            return response()->json(['error' => 'Failed to export Excel file.'], 500);
        }
    }
}
