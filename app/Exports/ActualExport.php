<?php

namespace App\Exports;

use App\Models\Actual;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ActualExport implements FromView
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function view(): View
    {
        return view('admin.report.actual-report', [
            'actuals' => Actual::get(),
        ]);
    }
}
