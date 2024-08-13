<?php

namespace App\Imports;

use App\Models\Jobs;
use Maatwebsite\Excel\Concerns\ToModel;

class ExcelImports implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Jobs([
            'USER_ID' => $row[0],
            'NAME' => $row[1], 
            'COMPANY' => $row[2],
            'SALARY' => $row[3],
            'POSITION' => $row[4],
            'EXPERIENCE' => $row[5],
            'REQUIREMENTS' => $row[6],
            'TIME' => $row[7],
            'ADDRESS' => $row[8],

            'LINK' => $row[9]
        ]);
    }
}
