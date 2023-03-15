<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\BasicInformation;
use Filament\Tables\Columns\TextColumn;

class Masterlist extends Component implements Tables\Contracts\HasTable
{
    public $add_modal = false;
    use Tables\Concerns\InteractsWithTable;

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query();
    }

    public function getTableContent()
    {
        return view('customs.master', [
            'infos' => BasicInformation::query(),
        ]);
    }

    protected function getTableColumns(): array
    {
        return [
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
                ->label('ENCUMBRANCE (AREA/VARIANCE)')
                ->formatStateUsing(function ($record) {
                    $data = json_decode($record->encumbered, true);

                    return ($data['area'] ?? 'N/A') .
                        ' / ' .
                        ($data['variance'] ?? 'N/A');
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('previous_copy_of_title')
                ->label('PREVIOUS COPY OF TITLE (TYPE OF TITLE/NO.)')
                ->formatStateUsing(function ($record) {
                    $data = json_decode($record->encumbered, true);

                    return ($data['area'] ?? 'N/A') .
                        ' / ' .
                        ($data['variance'] ?? 'N/A');
                })
                ->searchable()
                ->sortable(),
        ];
    }

    public function render()
    {
        return view('livewire.admin.masterlist');
    }
}
