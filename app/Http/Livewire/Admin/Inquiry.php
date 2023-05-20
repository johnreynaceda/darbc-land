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
use Filament\Tables\Filters\Layout;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;

class Inquiry extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    // public $filters = [
    //     'number' => null,
    //     'lot_number' => null,
    //     'survey_number' => null,
    //     'title_area' => null,
    //     'awarded_area' => null,
    //     'previous_land_owner' => null,
    //     'field_number' => null,
    //     'location' => null,
    //     'municipality' => null,
    //     'title' => null,
    //     'cloa_number' => null,
    //     'page' => null,
    //     'encumbered' => null,
    //     'previous_copy_of_title' => null,
    //     'title_status' => null,
    //     'title_copy' => null,
    //     'remarks' => null,
    //     'status' => null,
    //     'land_bank_amortization' => null,
    //     'amount' => null,
    //     'date_paid' => null,
    //     'date_of_cert' => null,
    //     'ndc_direct_payment_scheme' => null,
    //     'ndc_remarks' => null,
    //     'notes' => null,
    // ];

    public $filters = [];

    public $search = '';

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query();
    }

    protected function getTableFilters(): array
    {
        return [
       Filter::make('lot_number')->label('LOT NO.')->default(),
              Filter::make('survey_number')->label('SURVEY NO.')->default(),
              Filter::make('title_area')->label('TITLE AREA')->default(),
              Filter::make('awarded_area')->label('AWARDED AREA.')->default(),
              Filter::make('location')->label('BARANGAY')->default(),
              Filter::make('municipality')->label('MUNICAPALITY')->default(),
              Filter::make('cloa_number')->label('CLOA NO.')->default(),
              Filter::make('previous_land_owner')->label('PREVIOUS')->default(),
              SelectFilter::make('municipality')
              ->options([
              'POLOMOLOK' => 'POLOMOLOK',
              'TUPI' => 'TUPI',
              'GENSAN' => 'GENSAN',
              ])
        ];
    }
    protected function getTableFiltersLayout(): ?string
        {
            return Layout::AboveContent;
        }

    protected function getTableFiltersFormColumns(): int
    {
    return 6;
    }



    public function render()
    {
        return view('livewire.admin.inquiry'
        // , [
        //     'records' => BasicInformation::where(
        //         'number',
        //         'like',
        //         '%' . $this->search . '%'
        //     )
        //         ->orWhere('lot_number', 'like', '%' . $this->search . '%')
        //         ->orWhere('survey_number', 'like', '%' . $this->search . '%')
        //         ->orWhere('title_area', 'like', '%' . $this->search . '%')
        //         ->orWhere('awarded_area', 'like', '%' . $this->search . '%')
        //         ->orWhere('previous_land_owner', 'like', '%' . $this->search . '%')
        //         ->orWhere('field_number', 'like', '%' . $this->search . '%')
        //         ->orWhere('location', 'like', '%' . $this->search . '%')
        //         ->orWhere('municipality', 'like', '%' . $this->search . '%')
        //         ->orWhere('title', 'like', '%' . $this->search . '%')
        //         ->orWhere('cloa_number', 'like', '%' . $this->search . '%')
        //         ->orWhere('page', 'like', '%' . $this->search . '%')
        //         ->orWhere('encumbered', 'like', '%' . $this->search . '%')
        //         ->orWhere('previous_copy_of_title', 'like', '%' . $this->search . '%')
        //         ->orWhere('title_status', 'like', '%' . $this->search . '%')
        //         ->orWhere('title_copy', 'like', '%' . $this->search . '%')
        //         ->orWhere('remarks', 'like', '%' . $this->search . '%')
        //         ->orWhere('status', 'like', '%' . $this->search . '%')
        //         ->orWhere('land_bank_amortization', 'like', '%' . $this->search . '%')
        //         ->orWhere('amount', 'like', '%' . $this->search . '%')
        //         ->orWhere('date_paid', 'like', '%' . $this->search . '%')
        //         ->orWhere('date_of_cert', 'like', '%' . $this->search . '%')
        //         ->orWhere('ndc_direct_payment_scheme', 'like', '%' . $this->search . '%')
        //         ->orWhere('ndc_remarks', 'like', '%' . $this->search . '%')
        //         ->orWhere('notes', 'like', '%' . $this->search . '%')
        //         ->get(),
        // ]
    );
    }

    protected function getTableColumns(): array
    {
        return [
            // TextColumn::make('number')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['number'];
            //         }
            //     })
            //     ->label('NO.')
            //     ->searchable()
            //     ->sortable(),
            TextColumn::make('lot_number')
                ->label('LOT NO.')
                 ->visible(fn () => $this->tableFilters['lot_number']['isActive'])
                ->searchable()
                ->sortable(),
            TextColumn::make('survey_number')
                ->visible(fn () => $this->tableFilters['survey_number']['isActive'])
                ->label('SURVEY NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('title_area')
                ->visible(fn () => $this->tableFilters['title_area']['isActive'])
                ->label('TITLE AREA')
                ->searchable()
                ->sortable(),
            TextColumn::make('awarded_area')
               ->visible(fn () => $this->tableFilters['awarded_area']['isActive'])
                ->label('AWARDED AREA')
                ->searchable()
                ->sortable(),
            // TextColumn::make('previous_land_owner')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['previous_land_owner'];
            //         }
            //     })
            //     ->label('PREVIOUS LAND OWNER')
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('field_number')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['field_number'];
            //         }
            //     })
            //     ->label('FIELD NO.')
            //     ->searchable()
            //     ->sortable(),
            TextColumn::make('location')
                ->visible(fn () => $this->tableFilters['location']['isActive'])
                ->label('BARANGAY')
                ->searchable()
                ->sortable(),
            TextColumn::make('municipality')
            //   ->visible(fn () => $this->tableFilters['municipality']['isActive'])
                ->label('MUNICIPALITY')
                ->searchable()
                ->sortable(),
            // TextColumn::make('title')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['title'];
            //         }
            //     })
            //     ->label('TITLE')
            //     ->searchable()
            //     ->sortable(),
            TextColumn::make('cloa_number')
               ->visible(fn () => $this->tableFilters['cloa_number']['isActive'])
                ->label('CLOA NO.')
                ->searchable()
                ->sortable(),
                 TextColumn::make('previous_land_owner')
             ->visible(fn () => $this->tableFilters['previous_land_owner']['isActive'])
                ->label('PREVIOUS')
                ->searchable()
                ->sortable(),
            // TextColumn::make('page')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['page'];
            //         }
            //     })
            //     ->label('PAGE')
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('encumbered')
            //     ->label('ENCUMBERED AREA')
            //     ->formatStateUsing(function (string $state) {
            //         $encumbered_array = json_decode($state, true);
            //         $encumbered =
            //             'Area: ' .
            //             $encumbered_array['area'] .
            //             ' / ' .
            //             'Variance: ' .
            //             $encumbered_array['variance'];
            //         return $encumbered;
            //     })
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['encumbered'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('previous_copy_of_title')
            //     ->label('PREVIOUS COPY OF TITLE')
            //     ->formatStateUsing(function (string $state) {
            //         $previous_copy_of_title_array = json_decode($state, true);
            //         $previous_copy_of_title =
            //             'Type Of Title: ' .
            //             $previous_copy_of_title_array['type of title'] .
            //             ' / ' .
            //             'No.: ' .
            //             $previous_copy_of_title_array['no.'];
            //         return $previous_copy_of_title;
            //     })
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['previous_copy_of_title'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('title_status')
            //     ->label('TITLE STATUS')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['title_status'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('title_copy')
            //     ->label('TITLE COPY')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['title_copy'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('remarks')
            //     ->label('REMARKS')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['remarks'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('status')
            //     ->label('STATUS')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['status'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('land_bank_amortization')
            //     ->label('LAND BANK AMORTIZATION')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['land_bank_amortization'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('amount')
            //     ->label('AMOUNT')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['amount'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('date_paid')
            //     ->label('DATE PAID')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['date_paid'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('date_of_cert')
            //     ->label('DATE OF CERT')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['date_of_cert'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('ndc_direct_payment_scheme')
            //     ->label('NDC DIRECT PAYMENT SCHEME')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['ndc_direct_payment_scheme'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('ndc_remarks')
            //     ->label('NDC REMARKS')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['ndc_remarks'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
            // TextColumn::make('notes')
            //     ->label('NOTES')
            //     ->visible(function ($record) {
            //         $column = count(
            //             array_filter($this->filters, function ($value) {
            //                 return $value != null;
            //             })
            //         );

            //         if ($column < 1) {
            //             return true;
            //         } else {
            //             return $this->filters['notes'];
            //         }
            //     })
            //     ->searchable()
            //     ->sortable(),
        ];
    }
}
