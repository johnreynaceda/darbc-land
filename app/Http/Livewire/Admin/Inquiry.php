<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Sample;
use Filament\Tables\Columns\TextColumn;

class Inquiry extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $filters = [
        'name' => null,
        'email' => null,
        'phone' => null,
    ];

    protected function getTableQuery(): Builder
    {
        return Sample::query();
    }

    public function render()
    {
        return view('livewire.admin.inquiry');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
                ->searchable()
                ->visible(function () {
                    $count = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($count < 1) {
                        return true;
                        # code...
                    } else {
                        return $this->filters['name'];
                    }
                })
                ->sortable(),
            TextColumn::make('email')
                ->searchable()
                ->visible(function () {
                    $count = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($count < 1) {
                        return true;
                        # code...
                    } else {
                        return $this->filters['email'];
                    }
                })
                ->sortable(),
            TextColumn::make('phone')
                ->searchable()
                ->visible(function () {
                    $count = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($count < 1) {
                        return true;
                        # code...
                    } else {
                        return $this->filters['phone'];
                    }
                })
                ->sortable(),
        ];
    }
}
