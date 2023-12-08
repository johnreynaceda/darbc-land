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

class OverallLandSummaryBasicInformationTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $record;
    protected $listeners = ['showOverallBasicInformationReportData'];

    public function mount($record)
    {
        $this->record = $record;
    }

    public function showOverallBasicInformationReportData($label)
    {
        switch($label)
        {
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
        }
    }

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query()->where('status_id', $this->record);
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
            TextColumn::make('title_area')
            ->formatStateUsing(fn($record) => empty($record->title_area) ? number_format($record->title_area, 2) : '0.00')
            ->label('Title Area'),
            BadgeColumn::make('basic_status.name')
            ->color('warning')
            ->label('Status'),
        ];
    }

    public function render()
    {
        return view('livewire.tables.overall-land-summary-basic-information-table');
    }
}
