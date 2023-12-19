<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\Log;

class ExcelExport
{
    public function exportDataToExcel($data)
    {
        try {
            $spreadsheet = new Spreadsheet();
            $sheet = $spreadsheet->getActiveSheet();

            // Assuming $data is an array of data you want to export
            // Example: $data = [['Name', 'Email'], ['John Doe', 'john@example.com']];
            
            foreach ($data as $row => $rowData) {
                foreach ($rowData as $column => $value) {
                    $sheet->setCellValueByColumnAndRow($column + 1, $row + 1, $value);
                }
            }

            $writer = new Xlsx($spreadsheet);

            // Store the Excel file in memory
            ob_start();
            $writer->save('php://output');
            $excelContent = ob_get_clean();

            // Return the Excel file as a downloadable response
            return Response::make(
                $excelContent,
                200,
                [
                    'Content-Type' => 'application/vnd.openxmlformats-officedocument.spreadsheetml.sheet',
                    'Content-Disposition' => 'attachment; filename="exported_data.xlsx"',
                ]
            );
        } catch (\Exception $e) {
            // Log the error for debugging
            Log::error('Excel export error: ' . $e->getMessage());

            // Return a response with an error message
            return Response::json(['error' => 'Failed to export Excel file.'], 500);
        }
    }
}
