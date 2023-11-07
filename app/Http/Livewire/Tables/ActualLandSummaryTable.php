<?php

namespace App\Http\Livewire\Tables;

use Filament\Tables;
use App\Models\Actual;
use Livewire\Component;
use App\Models\BasicInformation;
use Filament\Tables\Filters\Layout;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\Paginator;

class ActualLandSummaryTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $record;
    protected $listeners = ['showActualReportData'];

    public function mount($record)
    {
        $this->record = $record;
    }


    public function showActualReportData($label)
    {
        switch ($label) {
            case 'Loss in Case':
                $this->record = 1;
                break;
            case 'Cancelled CLOA':
                $this->record = 2;
                break;
            case 'Exchange Lot':
                $this->record = 3;
                break;
            case 'Free Lot':
                $this->record = 4;
                break;
            case 'Compromise Agreement':
                $this->record = 5;
                break;
            case 'DARBC Projects':
                $this->record = 6;
                break;
              }

    }

    // protected function getTableFilters(): array
    // {
    //     switch ($this->record) {
    //         case 'Leased':
    //             $defaultLandStatus = 'Leased';
    //           break;
    //         case 'Growers':
    //             $defaultLandStatus = 'Growers';
    //           break;
    //         case 'Unplanted':
    //             $defaultLandStatus = 'Unplanted';
    //           break;
    //         default:
    //         $defaultLandStatus = null;
    //       }

    //     return [
    //         SelectFilter::make('land_status')
    //         ->options([
    //             'Leased' => 'Leased',
    //             'Growers' => 'Growers',
    //             'Unplanted' => 'Unplanted',
    //             'Compromise Agreement' => 'Compromise Agreement',
    //             'Deleted' => 'Deleted',
    //             'Others' => 'Others',
    //         ])->default($defaultLandStatus)
    //     ];
    // }

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query()->where('status_id', $this->record);
    }

   // protected function getTableQuery(): Builder
  //  {
        // return BasicInformation::query()->whereHas('basic_status', function (Builder $query) {
        //     $query->where('name', $this->record);
        // });
        // $order = $this->record;
        // switch ($this->record) {
        //         case 'Planted Area':
        //                 $order = 'planted_area';
        //               break;
        //             case 'Gulley Area':
        //                 $order = 'gulley_area';
        //               break;
        //             case 'Total Area':
        //                 $order = 'total_area';
        //               break;
        //             case 'Facilty Area':
        //                 $order = 'facility_area';
        //               break;
        //             case 'Gross Area':
        //                 $order = 'gross_area';
        //               break;
        //             default:
        //             $order = 'planted_area';
        //           }
        // return Actual::query()->with('basic_information')->whereNotNull($order)
        // ->where($order, '!=', '')
        // ->where($order, '!=', ' ')
        // ->orderByRaw("CASE WHEN TRIM($order) REGEXP '^[0-9]+\.?[0-9]*$' THEN CAST(planted_area AS DECIMAL) ELSE 999999 END DESC");
   // }

    protected function paginateTableQuery(Builder $query): Paginator
    {
        return $query->simplePaginate($this->getTableRecordsPerPage() == -1 ? $query->count() : $this->getTableRecordsPerPage());
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('lot_number')
            ->label('Lot No.'),
            TextColumn::make('field_number')
            ->label('Field No.'),
            BadgeColumn::make('basic_status.name')
            ->color('warning')
            ->label('Status'),
            // TextColumn::make('basic_information.lot_number')
            // ->label('Lot No.'),
            // TextColumn::make('basic_information.field_number')
            // ->label('Field No.'),
            // TextColumn::make('planted_area')
            // ->label('Planted Area')->visible(fn ($record) => $this->record == "Planted Area")->sortable(),
            // TextColumn::make('gulley_area')
            // ->label('Gulley Area')->visible(fn ($record) => $this->record == "Gulley Area")->sortable(),
            // TextColumn::make('total_area')
            // ->label('Total Area')->visible(fn ($record) => $this->record == "Total Area")->sortable(),
            // TextColumn::make('facility_area')
            // ->label('Facility Area')->visible(fn ($record) => $this->record == "Facilty Area")->sortable(),
            // TextColumn::make('unutilized_area')
            // ->label('Unutilized Area')->visible(fn ($record) => $this->record == "Unutilized Area")->sortable(),
            // TextColumn::make('gross_area')
            // ->label('Gross Area')->visible(fn ($record) => $this->record == "Gross Area")->sortable(),
        ];
    }


    public function render()
    {
        return view('livewire.tables.actual-land-summary-table');
    }
}
