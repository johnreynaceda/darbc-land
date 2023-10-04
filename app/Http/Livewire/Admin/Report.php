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
            'loss_in_case' => BasicInformation::where('remarks', 'LIKE','%Loss In Case%')->get(),
            'cancelled_cloa' => BasicInformation::where('status', 'LIKE','%Cancelled CLOA%')->get(),
            'exchange_lot' => BasicInformation::where('remarks', 'LIKE','%Exchange Lot%')->get(),
            'free_lot' => BasicInformation::where('remarks', 'LIKE','%Free Lot%')->get(),
            'compromise_agreement' => BasicInformation::where('remarks', 'LIKE','%Compromise Agreement%')->get(),
            'darbc_projects' => BasicInformation::where('remarks', 'LIKE','%DARBC Real Estate Project%')->get(),
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

    public function exportLossInCase()
    {
        return \Excel::download(
            new \App\Exports\LossInCaseExport(),
            'loss-in-case.xlsx'
        );
    }

    public function exportCancelledCloa()
    {
        return \Excel::download(
            new \App\Exports\CancelledCloaExport(),
            'cancelled-cloa.xlsx'
        );
    }

    public function exportExchangeLot()
    {
        return \Excel::download(
            new \App\Exports\ExchangeLotExport(),
            'exchange-lot.xlsx'
        );
    }

    public function exportFreeLot()
    {
        return \Excel::download(
            new \App\Exports\FreeLotExport(),
            'free-lot.xlsx'
        );
    }

    public function exportCompromiseAgreement()
    {
        return \Excel::download(
            new \App\Exports\CompromiseAgreementExport(),
            'compromise-agreement.xlsx'
        );
    }

    public function exportDarbcProjects()
    {
        return \Excel::download(
            new \App\Exports\DarbcProjectsExport(),
            'darbc-projects.xlsx'
        );
    }
}
