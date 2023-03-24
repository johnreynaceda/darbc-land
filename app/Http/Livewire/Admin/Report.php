<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\BasicInformation;
use App\Models\Actual;
use App\Models\Tax;

class Report extends Component
{
    public $report = 1;
    public function render()
    {
        return view('livewire.admin.report', [
            'actuals' => Actual::get(),
            'tax' => Tax::get(),
        ]);
    }

    public function exportActual()
    {
        return \Excel::download(
            new \App\Exports\ActualExport(),
            'actuals.xlsx'
        );
    }

    public function exportTax()
    {
        return \Excel::download(
            new \App\Exports\TaxExport(),
            'tax.xlsx'
        );
    }
}
