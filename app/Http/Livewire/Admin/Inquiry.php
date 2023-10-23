<?php

namespace App\Http\Livewire\Admin;

use Filament\Tables;
use App\Models\Sample;
use App\Models\Status;
use Livewire\Component;
use App\Models\BasicInformation;
use Illuminate\Contracts\View\View;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Inquiry extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    public $municipalities = [];
    public $locations = [];
    public $title_statuses = [];
    public $title_types = [];
    public $selected_columns = [];
    public $title_filter;
    public $dataToExport;
    public $basic_statuses;
    public $selected_status = [];
    public $search = '';
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
        'encumbered_area' => null,
        'encumbered_variance' => null,
        'previous_copy_of_title' => null,
        'previous_copy_of_title_type' => null,
        'previous_copy_of_title_number' => null,
        'title_status' => null,
        'title_copy' => null,
        'tax_dec_number' => null,
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

    protected $listeners = ['tableDataExported'];

    protected function getTableQuery(): Builder
    {
        return BasicInformation::query();
    }

    public function tableDataExported($tableData)
    {
        return \Excel::download(
            new \App\Exports\InquiryExport(collect($tableData)),
            'inquiry.xlsx'
        );
    }

    public function updatedSelectedColumns()
    {

        foreach ($this->filters as $key => $value) {
            $this->filters[$key] = false;
        }

        // Set the selected column's corresponding filter value to true
        foreach ($this->selected_columns as $column) {
            //if (isset($this->filters[$column])) {
                $this->filters[$column] = true;
           // }
        }
        $this->title_filter = null;
        $this->search = '';
    }

    public function mount()
    {
        $this->basic_statuses = Status::all();
        $this->selected_columns = ['lot_number', 'survey_number', 'title_area', 'awarded_area',
        'location', 'municipality', 'cloa_number', 'previous_copy_of_title_number'];
    }

    public function render()
{
    $query = BasicInformation::query();

    if (!empty($this->municipalities)) {
        $query->whereIn('municipality', $this->municipalities);
    }

    if (!empty($this->locations)) {
        $query->where(function ($query) {
            foreach ($this->locations as $location) {
                $query->orWhere('location', 'LIKE', '%' . $location . '%');
            }
        });
    }

    if (!empty($this->title_statuses)) {
        $query->whereIn('title_status', $this->title_statuses);
    }

    if (!empty($this->title_types)) {
        $query->whereIn('previous_copy_of_title->type of title', $this->title_types);
    }

    if(!empty($this->selected_status)){
        //where basic_status relationship is equal to selected status
        $query->whereHas('basic_status', function ($query) {
            $query->whereIn('id', $this->selected_status);
        });
        // $query->whereIn('status', $this->selected_status);
    }

    if (!empty($this->title_filter) && !empty($this->search)) {
        // Apply the selected filter based on the search input
        switch ($this->title_filter) {
            case 'number':
                $query->where('number', 'LIKE', '%' . $this->search . '%');
                break;
            case 'lot_number':
                $query->where('lot_number', 'LIKE', '%' . $this->search . '%');
                break;
            case 'survey_number':
                $query->where('survey_number', 'LIKE', '%' . $this->search . '%');
                break;
            case 'title_area':
                $query->where('title_area', 'LIKE', '%' . $this->search . '%');
                break;
            case 'awarded_area':
                $query->where('awarded_area', 'LIKE', '%' . $this->search . '%');
                break;
            case 'previous_land_owner':
                $query->where('previous_land_owner', 'LIKE', '%' . $this->search . '%');
                break;
            case 'field_number':
                $query->where('field_number', 'LIKE', '%' . $this->search . '%');
                break;
            case 'location':
                $query->where('location', 'LIKE', '%' . $this->search . '%');
                break;
            case 'municipality':
                $query->where('municipality', 'LIKE', '%' . $this->search . '%');
                break;
            case 'title':
                $query->where('title', 'LIKE', '%' . $this->search . '%');
                break;
            case 'cloa_number':
                $query->where('cloa_number', 'LIKE', '%' . $this->search . '%');
                break;
            case 'page':
                $query->where('page', 'LIKE', '%' . $this->search . '%');
                break;
            case 'encumbered_area':
                $query->where('encumbered->area', 'LIKE', '%' . $this->search . '%');
                break;
            case 'encumbered_variance':
                $query->where('encumbered->variance', 'LIKE', '%' . $this->search . '%');
                break;
            case 'previous_copy_of_title_type':
                $query->where('previous_copy_of_title->type of title', 'LIKE', '%' . $this->search . '%');
                break;
            case 'previous_copy_of_title_number':
                $query->where('previous_copy_of_title->no.', 'LIKE', '%' . $this->search . '%');
                break;
            case 'title_status':
                $query->where('title_status', 'LIKE', '%' . $this->search . '%');
                break;
            case 'title_copy':
                $query->where('title_copy', 'LIKE', '%' . $this->search . '%');
                break;
            case 'tax_dec_number':
                $query->where('tax_dec_number', 'LIKE', '%' . $this->search . '%');
                break;
            case 'remarks':
                $query->where('remarks', 'LIKE', '%' . $this->search . '%');
                break;
            case 'status':
                $query->whereHas('basic_status', function ($query) {
                    $query->where('name', 'LIKE', '%' . $this->search . '%');
                });
                break;
            case 'land_bank_amortization':
                $query->where('land_bank_amortization', 'LIKE', '%' . $this->search . '%');
                break;
            case 'amount':
                $query->where('amount', 'LIKE', '%' . $this->search . '%');
                break;
            case 'ndc_remarks':
                $query->where('ndc_remarks', 'LIKE', '%' . $this->search . '%');
                break;
            case 'notes':
                $query->where('notes', 'LIKE', '%' . $this->search . '%');
                break;
        }
    }

    $records = $query->get();

    return view('livewire.admin.inquiry', [
        'records' => $records,
    ]);
}

public function exportInquiry()
{
    return \Excel::download(
        new \App\Exports\InquiryExport($dataToExport),
        'inquiry.xlsx'
    );
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
                // ->searchable()
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
                // ->searchable()
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
                //->searchable()
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
                //->searchable()
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
                //->searchable()
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
                //->searchable()
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
                //->searchable()
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
                //->searchable()
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
                //->searchable()
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
                //->searchable()
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
                //->searchable()
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
                //->searchable()
                ->sortable(),
            TextColumn::make('encumbered')
                ->label('ENCUMBERED AREA')
                ->formatStateUsing(function (string $state) {
                    $encumbered_array = json_decode($state, true);
                    $encumbered =
                        'Area: ' .
                        $encumbered_array['area'] .
                        ' / ' .
                        'Variance: ' .
                        $encumbered_array['variance'];
                    return $encumbered;
                })
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
                }),
            TextColumn::make('previous_copy_of_title')
                ->label('PREVIOUS COPY OF TITLE')
                ->formatStateUsing(function (string $state) {
                    $previous_copy_of_title_array = json_decode($state, true);
                    $previous_copy_of_title =
                        'Type Of Title: ' .
                        $previous_copy_of_title_array['type of title'] .
                        ' / ' .
                        'No.: ' .
                        $previous_copy_of_title_array['no.'];
                    return $previous_copy_of_title;
                })
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
                }),
            TextColumn::make('title_status')
                ->label('TITLE STATUS')
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
                //->searchable()
                ->sortable(),
            TextColumn::make('title_copy')
                ->label('TITLE COPY')
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
                //->searchable()
                ->sortable(),
            TextColumn::make('tax_dec_number')
                ->label('TAX DECLARATION NUMBER')
                ->visible(function ($record) {
                    $column = count(
                        array_filter($this->filters, function ($value) {
                            return $value != null;
                        })
                    );

                    if ($column < 1) {
                        return true;
                    } else {
                        return $this->filters['tax_dec_number'];
                    }
                })
                //->searchable()
                ->sortable(),
            TextColumn::make('remarks')
                ->label('REMARKS')
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
                //->searchable()
                ->sortable(),
            TextColumn::make('status')
                ->label('STATUS')
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
                //->searchable()
                ->sortable(),
            TextColumn::make('land_bank_amortization')
                ->label('LAND BANK AMORTIZATION')
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
                //->searchable()
                ->sortable(),
            TextColumn::make('amount')
                ->label('AMOUNT')
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
                //->searchable()
                ->sortable(),
            TextColumn::make('date_paid')
                ->label('DATE PAID')
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
                //->searchable()
                ->sortable(),
            TextColumn::make('date_of_cert')
                ->label('DATE OF CERT')
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
                //->searchable()
                ->sortable(),
            TextColumn::make('ndc_direct_payment_scheme')
                ->label('NDC DIRECT PAYMENT SCHEME')
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
                //->searchable()
                ->sortable(),
            TextColumn::make('ndc_remarks')
                ->label('NDC REMARKS')
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
               // ->searchable()
                ->sortable(),
            TextColumn::make('notes')
                ->label('NOTES')
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
               // ->searchable()
                ->sortable(),
        ];
    }
}
