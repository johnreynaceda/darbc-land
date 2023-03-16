<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\BasicInformation;
use Filament\Tables\Columns\TextColumn;
use Filament\Forms\Components\FileUpload;
use App\Models\Actual;
use App\Models\Tax;

class Masterlist extends Component implements Tables\Contracts\HasTable
{
    public $add_modal = false;
    public $view_modal = false;
    public $basicInfo = [];
    public $actual = [];
    public $tax_year;
    public $tax_get;
    public $informationId;

    use Tables\Concerns\InteractsWithTable;

    public function mount()
    {
        $this->tax_year = Tax::where('year', '!=', '')
            ->groupBy('year')
            ->pluck('year')
            ->toArray();
    }

    protected function getFormSchema(): array
    {
        return [FileUpload::make('file')->label('UPLOAD LOT IMAGE')];
    }

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query();
    }

    public function getTableContent()
    {
        return view('customs.master', [
            'infos' => BasicInformation::query(),
        ]);
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('number')
                ->label('NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('lot_number')
                ->label('LOT NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('survey_number')
                ->label('SURVEY NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('title_area')
                ->label('TITLE AREA')
                ->searchable()
                ->sortable(),
            TextColumn::make('awarded_area')
                ->label('AWARDED AREA')
                ->searchable()
                ->sortable(),
            TextColumn::make('previous_land_owner')
                ->label('PREVIOUS LAND OWNER')
                ->searchable()
                ->sortable(),
            TextColumn::make('field_number')
                ->label('FIELD NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('location')
                ->label('LOCATION')
                ->searchable()
                ->sortable(),
            TextColumn::make('municipality')
                ->label('MUNICIPALITY')
                ->searchable()
                ->sortable(),
            TextColumn::make('title')
                ->label('TITLE')
                ->searchable()
                ->sortable(),
            TextColumn::make('cloa_number')
                ->label('CLOA NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('page')
                ->label('PAGE')
                ->searchable()
                ->sortable(),
            TextColumn::make('encumbered')
                ->searchable()
                ->sortable(),
            TextColumn::make('previous_copy_of_title')
                ->searchable()
                ->sortable(),
            TextColumn::make('title_status')
                ->searchable()
                ->sortable(),
            TextColumn::make('title_copy')
                ->searchable()
                ->sortable(),
            TextColumn::make('remarks')
                ->searchable()
                ->sortable(),
            TextColumn::make('status')
                ->searchable()
                ->sortable(),
            TextColumn::make('land_bank_amortization')
                ->searchable()
                ->sortable(),
            TextColumn::make('amount')
                ->searchable()
                ->sortable(),
            TextColumn::make('date_paid')
                ->searchable()
                ->sortable(),
            TextColumn::make('date_of_cert')
                ->searchable()
                ->sortable(),
            TextColumn::make('ndc_direct_payment_scheme')
                ->searchable()
                ->sortable(),
            TextColumn::make('ndc_remarks')
                ->searchable()
                ->sortable(),
            TextColumn::make('notes')
                ->searchable()
                ->sortable(),
        ];
    }

    public function render()
    {
        return view('livewire.admin.masterlist', [
            'taxss' => Tax::where('basic_information_id', $this->informationId)
                ->when($this->tax_get, function ($query) {
                    $query->where('year', $this->tax_get);
                })
                ->get(),
        ]);
    }

    public function viewData($id)
    {
        $this->informationId = $id;
        $this->basicInfo = BasicInformation::where('id', $id)->first();
        $this->actual = Actual::where('basic_information_id', $id)->first();
        $this->taxes = $this->view_modal = true;
    }
}
