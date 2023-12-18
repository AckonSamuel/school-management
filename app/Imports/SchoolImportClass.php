<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;

class SchoolImportClass implements ToCollection
{
    /**
    * @param Collection $collection
    */
    public function collection(Collection $collection)
    {
        // foreach ($collection as $row) {
        //     // Assuming the first row contains headers, skipping it during import
        //     if ($row->first() === $collection->first()) {
        //         continue;
        //     }

        //     SchoolModel::create([
        //         'column1' => $row[0], // Replace with your column index or name
        //         'column2' => $row[1], // Replace with your column index or name
        //         // Add other columns as needed
        //     ]);
        // }

    }
}
