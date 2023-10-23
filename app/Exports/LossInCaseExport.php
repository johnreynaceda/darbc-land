<?php

namespace App\Exports;

use App\Models\BasicInformation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class LossInCaseExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.report.loss-in-case', [
            'loss_in_case' => BasicInformation::where('status_id', 1)->get(),
        ]);
    }
}
