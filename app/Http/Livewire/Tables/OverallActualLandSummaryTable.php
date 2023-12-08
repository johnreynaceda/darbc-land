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

class OverallActualLandSummaryTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $record;
    public $municipality;
    protected $listeners = ['showOverallActualReportData', 'showOverallActualReportDataPolomolok', 'showOverallActualReportDataTupi', 'showOverallActualReportDataGensan'];

    public function mount($record)
    {
        $this->record = $record;

    }

    public function showOverallActualReportData($label)
    {
        $this->municipality = '';
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

    public function showOverallActualReportDataPolomolok($label)
    {
        $this->municipality = 'Polomolok';
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

    public function showOverallActualReportDataTupi($label)
    {
        $this->municipality = 'TUPI';
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

    public function showOverallActualReportDataGensan($label)
    {
        $this->municipality = 'GENERAL SANTOS';
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

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query()->where('municipality', 'like', '%' . $this->municipality . '%')->where('status_id', $this->record);
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
            ->formatStateUsing(fn($record) => is_numeric($record->title_area) ? number_format($record->title_area, 2) : '0.00')
            ->label('Title Area'),
            BadgeColumn::make('basic_status.name')
            ->color('warning')
            ->label('Status'),
        ];
    }


    public function render()
    {
        return view('livewire.tables.overall-actual-land-summary-table');
    }
}
