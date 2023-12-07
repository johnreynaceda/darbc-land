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

class OverallLandSummaryTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $record;
    protected $listeners = ['showOverallReportData'];

    public function mount($record)
    {
        $this->record = $record;
    }

    public function showOverallReportData($label)
    {
        if($label == 'DARBC Growership')
        {
            $this->record = 'GROWERS';
        }elseif($label == 'Areas Leased by Dolefil'){
            $this->record = 'Leased';
        }else{
            $this->record = $label;
        }
    }

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
            TextColumn::make('basic_information.title_area')
            ->formatStateUsing(fn($record) => $record->basic_information->title_area != ' ' ? number_format($record->basic_information->title_area, 2) : '0.00')
            ->label('Title Area'),
            BadgeColumn::make('land_status')
            ->color('warning')
            ->label('Status'),
        ];
    }

    public function render()
    {
        return view('livewire.tables.overall-land-summary-table');
    }
}
