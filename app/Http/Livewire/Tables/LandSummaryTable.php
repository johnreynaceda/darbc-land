<?php

namespace App\Http\Livewire\Tables;

use Livewire\Component;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\BadgeColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Pagination\Paginator;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\Layout;
use App\Models\Actual;
use App\Models\BasicInformation;

class LandSummaryTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $record;
    protected $listeners = ['showReportData'];

    public function mount($record)
    {
        $this->record = $record;
    }

    public function showReportData($label)
    {
        switch($label)
        {
            case 'Leased':
                $this->record = 'Leased';
                break;
            case 'DARBC Growership':
                $this->record = 'DARBC Growership';
                break;
            case 'Livelihood Program':
                $this->record = 7;
                break;
            case 'Facility':
                $this->record = 8;
                break;
            case 'Unplanted':
                $this->record = 9;
                break;
            case 'Additional Lot':
                $this->record = 10;
                break;
            case 'Deleted Area':
                $this->record = 11;
                break;
            case 'DARBC Quarry':
                $this->record = 12;
                break;
            default:
                $this->record = $label;
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
        if($this->record == "Leased")
        {
            return Actual::query()->with('basic_information')->where('land_status', $this->record);
        }elseif($this->record == "DARBC Growership")
        {
            return Actual::query()->with('basic_information')->where('land_status', 'GROWERS');
        }
        else{
            return Actual::query()->with('basic_information', function($query){
                $query->where('status_id', $this->record);
            });
        //    return BasicInformation::query()->where('status_id', $this->record);
        }

    }

    protected function paginateTableQuery(Builder $query): Paginator
    {
        return $query->simplePaginate($this->getTableRecordsPerPage() == -1 ? $query->count() : $this->getTableRecordsPerPage());
    }



    protected function getTableColumns(): array
    {
        if($this->record == "Leased" || $this->record == "DARBC Growership")
        {
        return [
            TextColumn::make('basic_information.lot_number')
            ->label('Lot No.'),
            TextColumn::make('basic_information.field_number')
            ->label('Field No.'),
            BadgeColumn::make('land_status')
            ->color('warning')
            ->label('Status'),
        ];
        }elseif($this->record == "DARBC Growership")
        {
            return [
                TextColumn::make('basic_information.lot_number')
                ->label('Lot No.'),
                TextColumn::make('basic_information.field_number')
                ->label('Field No.'),
                BadgeColumn::make('land_status')
                ->color('warning')
                ->label('Status'),
            ];
        }
        else{
            return [
                TextColumn::make('lot_number')
                ->label('Lot Nos.'),
                TextColumn::make('field_number')
                ->label('Field No.'),
                BadgeColumn::make('status.name')
                ->color('warning')
                ->label('Status'),
            ];
        }

    }

    public function render()
    {
        return view('livewire.tables.land-summary-table');
    }
}
