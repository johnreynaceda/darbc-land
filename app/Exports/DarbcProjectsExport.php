<?php

namespace App\Exports;

use App\Models\BasicInformation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class DarbcProjectsExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.report.darbc-projects', [
            'darbc_projects' => BasicInformation::where('remarks', 'LIKE','%DARBC Real Estate Project%')->get(),
        ]);
    }
}
