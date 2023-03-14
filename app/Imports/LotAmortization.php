<?php

namespace App\Imports;

use App\Models\BasicInformationLotAmortization;
use Maatwebsite\Excel\Concerns\ToModel;

class LotAmortization implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new BasicInformationLotAmortization([
            'basic_information_id' => $row[0],
            'number' => $row[0],
        ]);
    }
}
