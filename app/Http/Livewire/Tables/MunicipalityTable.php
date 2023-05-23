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

class MunicipalityTable extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;

    public $record;
    protected $listeners = ['showMunicipalityReportData'];

    public function mount($record)
    {
        $this->record = $record;
    }

    public function showMunicipalityReportData($label)
    {
        $this->record = $label;
    }

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query()->where('municipality', $this->record);
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
            ->color('warning'),
        ];
    }

    public function render()
    {
        return view('livewire.tables.municipality-table');
    }
}
