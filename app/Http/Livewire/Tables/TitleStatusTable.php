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
// use App\Models\BasicInformation;

class TitleStatusTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $record;
    public $municipality;
    protected $listeners = ['showTitleStatusReportData'];

    public function mount($record)
    {
         $this->record = $record;

    }

    public function showTitleStatusReportData($index ,$label)
    {
        switch($index)
        {
            case 0:
            $this->municipality = "POLOMOLOK";
            break;
            case 1:
            $this->municipality = "TUPI";
            break;
            case 2:
            $this->municipality = "GENERAL SANTOS";
            break;
        }

        switch($label)
        {
            case 'TWC':
            $this->record = 1;
            break;
            case 'TWOC':
            $this->record = 2;
            break;
            case 'UWC':
            $this->record = 3;
            break;
            case 'UWOC':
            $this->record = 4;
            break;
        }
    }

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query()->where('municipality', 'like', '%' . $this->municipality . '%')->where('title_status_id', $this->record);
    }

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
            BadgeColumn::make('municipality')
            ->color('primary')
            ->label('Municipality'),
            BadgeColumn::make('basic_title_status.name')
            ->color('warning')
            ->label('Status'),
        ];
    }

    public function render()
    {
        return view('livewire.tables.title-status-table');
    }
}
