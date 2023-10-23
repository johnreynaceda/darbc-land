<?php

namespace App\Exports;

use App\Models\BasicInformation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class FreeLotExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.report.free-lot', [
            'free_lot' => BasicInformation::where('status_id', 4)->get(),
        ]);
    }
}
