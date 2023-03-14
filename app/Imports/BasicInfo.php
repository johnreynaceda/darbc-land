<?php

namespace App\Imports;

use App\Models\BasicInformation;
use Maatwebsite\Excel\Concerns\ToModel;

class BasicInfo implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BasicInformation([
            'number' => $row[0],
            'lot_number'
        ]);
    }
}
