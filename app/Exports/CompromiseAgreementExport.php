<?php

namespace App\Exports;

use App\Models\BasicInformation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class CompromiseAgreementExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.report.compromise-agreement', [
            'compromise_agreement' => BasicInformation::where('remarks', 'LIKE','%Compromise Agreement%')->get(),
        ]);
    }
}
