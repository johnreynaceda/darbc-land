<?php

namespace App\Exports;

use App\Models\BasicInformation;
use Maatwebsite\Excel\Concerns\FromCollection;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class ExchangeLotExport implements FromView
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function view(): View
    {
        return view('admin.report.exchange-lot', [
            'exchange_lot' => BasicInformation::where('remarks', 'LIKE','%Exchange Lot%')->get(),
        ]);
    }
}
