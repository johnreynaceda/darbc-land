<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Sample;
use Filament\Tables\Columns\TextColumn;
use App\Models\BasicInformation;

class Inquiry extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $filters = [
        'number' => null,
        'email' => null,
        'phone' => null,
    ];

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query();
    }

    public function render()
    {
        return view('livewire.admin.inquiry');
    }

    protected function getTableColumns(): array
    {
        return [
            // TextColumn::make('name')
            //     ->searchable()
            //     ->visible(function () {
            //         $count = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($count < 1) {
            //             return true;
            //             # code...
            //         } else {
            //             return $this->filters['name'];
            //         }
            //     })
            //     ->sortable(),

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
}
