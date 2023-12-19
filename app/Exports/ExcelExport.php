<?php

namespace App\Exports;

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use Illuminate\Support\Facades\Response;

class ExcelExport
{
    public function exportDataToExcel($data)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

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
    }
}
