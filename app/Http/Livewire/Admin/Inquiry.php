<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Sample;
use Filament\Tables\Columns\TextColumn;
use App\Models\BasicInformation;

class Inquiry extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $filters = [
        'number' => null,
        'lot_number' => null,
        'survey_number' => null,
        'title_area' => null,
        'awarded_area' => null,
        'previous_land_owner' => null,
        'field_number' => null,
        'location' => null,
        'municipality' => null,
        'title' => null,
        'cloa_number' => null,
        'page' => null,
        'encumbered' => null,
        'previous_copy_of_title' => null,
        'title_status' => null,
        'title_copy' => null,
        'remarks' => null,
        'status' => null,
        'land_bank_amortization' => null,
        'amount' => null,
        'date_paid' => null,
        'date_of_cert' => null,
        'ndc_direct_payment_scheme' => null,
        'ndc_remarks' => null,
        'notes' => null,
    ];

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query();
    }

    public function render()
    {
        return view('livewire.admin.inquiry');
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('number')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['number'];
                    }
                })
                ->label('NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('lot_number')
                ->label('LOT NO.')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['lot_number'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('survey_number')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['survey_number'];
                    }
                })
                ->label('SURVEY NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('title_area')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['title_area'];
                    }
                })
                ->label('TITLE AREA')
                ->searchable()
                ->sortable(),
            TextColumn::make('awarded_area')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['awarded_area'];
                    }
                })
                ->label('AWARDED AREA')
                ->searchable()
                ->sortable(),
            TextColumn::make('previous_land_owner')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['previous_land_owner'];
                    }
                })
                ->label('PREVIOUS LAND OWNER')
                ->searchable()
                ->sortable(),
            TextColumn::make('field_number')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['field_number'];
                    }
                })
                ->label('FIELD NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('location')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['location'];
                    }
                })
                ->label('LOCATION')
                ->searchable()
                ->sortable(),
            TextColumn::make('municipality')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['municipality'];
                    }
                })
                ->label('MUNICIPALITY')
                ->searchable()
                ->sortable(),
            TextColumn::make('title')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['title'];
                    }
                })
                ->label('TITLE')
                ->searchable()
                ->sortable(),
            TextColumn::make('cloa_number')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['cloa_number'];
                    }
                })
                ->label('CLOA NO.')
                ->searchable()
                ->sortable(),
            TextColumn::make('page')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['page'];
                    }
                })
                ->label('PAGE')
                ->searchable()
                ->sortable(),
            TextColumn::make('encumbered')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['encumbered'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('previous_copy_of_title')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['previous_copy_of_title'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('title_status')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['title_status'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('title_copy')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['title_copy'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('remarks')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['remarks'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('status')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['status'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('land_bank_amortization')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['land_bank_amortization'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('amount')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['amount'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('date_paid')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['date_paid'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('date_of_cert')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['date_of_cert'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('ndc_direct_payment_scheme')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['ndc_direct_payment_scheme'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('ndc_remarks')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['ndc_remarks'];
                    }
                })
                ->searchable()
                ->sortable(),
            TextColumn::make('notes')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['notes'];
                    }
                })
                ->searchable()
                ->sortable(),
        ];
    }
}
