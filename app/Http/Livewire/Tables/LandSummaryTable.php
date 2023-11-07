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
        if($label == 'DARBC Growership')
        {
            $this->record = 'GROWERS';
        }else{
            $this->record = $label;
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
        return Actual::query()->with('basic_information')->where('land_status', $this->record);
    }

    protected function paginateTableQuery(Builder $query): Paginator
    {
        return $query->simplePaginate($this->getTableRecordsPerPage() == -1 ? $query->count() : $this->getTableRecordsPerPage());
    }



    protected function getTableColumns(): array
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

    public function render()
    {
        return view('livewire.tables.land-summary-table');
    }
}
