<?php

namespace App\Http\Livewire\Admin;

use DB;
use Carbon\Carbon;
use App\Models\Tax;
use Filament\Forms;
use Filament\Tables;
use App\Models\Actual;
use App\Models\Status;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\TitleStatus;
use App\Models\TaxReceiptImage;
use App\Models\BasicInformation;
use Illuminate\Support\HtmlString;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Grid;
use Filament\Tables\Actions\Action;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\Layout;
use Illuminate\Contracts\View\View;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Wizard;
use Filament\Tables\Actions\Position;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\Textarea;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\TextInput;
use Filament\Tables\Columns\BadgeColumn;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Tables\Filters\SelectFilter;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;

class Masterlist extends Component implements Tables\Contracts\HasTable
{
    protected $listeners = ['close_modal'=> 'closeModal'];
    public $add_modal = false;
    public $update_modal = false;
    public $viewMissingData = false;
    public $missingData = [];
    public $viewMissingDocs = false;
    public $missingDocuments = [];


    //for add
    public $_number;
    public $_lot_number;
    public $_survey_number;
    public $_title_area;
    public $_awarded_area;
    public $_previous_land_owner;
    public $_field_number;
    public $_location;
    public $_municipality;
    public $_title;
    public $_cloa_number;
    public $_page;
    public $_encumbered_area;
    public $_encumbered_variance;
    public $_previous_copy_of_title_type_of_title;
    public $_previous_copy_of_title_number;
    public $_title_status;
    public $_title_copy;
    public $_tax_dec_number;
    public $_remarks;
    public $_status;
    public $_land_bank_amortization;
    public $_amount;
    public $_date_paid;
    public $_date_of_cert;
    public $_ndc_direct_payment_scheme;
    public $_ndc_remarks;
    public $_notes;
    //for update
    public $__number;
    public $__lot_number;
    public $__survey_number;
    public $__title_area;
    public $__awarded_area;
    public $__previous_land_owner;
    public $__field_number;
    public $__location;
    public $__municipality;
    public $__title;
    public $__cloa_number;
    public $__page;
    public $__encumbered_area;
    public $__encumbered_variance;
    public $__previous_copy_of_title_type_of_title;
    public $__previous_copy_of_title_number;
    public $__title_status;
    public $__title_copy;
    public $__tax_dec_number;
    public $__remarks;
    public $__status;
    public $__land_bank_amortization;
    public $__amount;
    public $__date_paid;
    public $__date_of_cert;
    public $__ndc_direct_payment_scheme;
    public $__ndc_remarks;
    public $__notes;


    public $view_modal = false;
    public $basicInfo = [];
    public $encumbered;
    public $previous_copy_of_title;
    public $title_status_detailed;
    public $actual = [];
    public $tax_year;
    public $tax_get;
    public $informationId;

    public $addActualModal = false;
    //actual lot models
    public $land_status;
    public $leased_area;
    public $darbc_grower;
    public $other_area;
    public $status;
    public $remarks;
    public $gross_area;
    public $planted_area;
    public $gulley_area;
    public $total_area;
    public $facility_area;
    public $unutilized_area;
    public $portion_field_array = [
        '0' => null,
        '1' => null,
    ];
    public $planted_area_array = [
        '0' => null,
        '1' => null,
    ];
    public $gulley_area_array = [
        '0' => null,
        '1' => null,
    ];
    public $total_area_array = [
        '0' => null,
        '1' => null,
    ];
    public $unutilized_area_array = [
        '0' => null,
        '1' => null,
    ];
    public $addTaxModal = false;
    //tax models
    public $title_number;
    public $tax_declaration_number;
    public $owner;
    public $lease_to_dolefil;
    public $darbc_growers_hip;
    public $darbc_not_planted;
    public $tax_remarks;
    public $market_value;
    public $assessed_value;
    public $year;
    public $square_meter;
    public $tax_payment;
    public $year_of_payment;
    public $official_receipt;
    public $receipt_image;



    use Tables\Concerns\InteractsWithTable;
    use Actions;

    public function mount()
    {
        $this->tax_year = Tax::where('year', '!=', '')
            ->groupBy('year')
            ->pluck('year')
            ->toArray();
    }

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('receipt_image')
            ->preserveFilenames()
            ->label('UPLOAD RECEIPT IMAGE')
            ->image()
        ];
    }

    protected function getTableActionsPosition(): ?string
{
    return Position::BeforeCells;
}


    protected function getTableQuery(): Builder
    {
        return BasicInformation::query();
    }

    protected function getTableFiltersLayout(): ?string
    {
        return Layout::AboveContent;
    }

    protected function getTableFilters(): array
    {
        return [
            Filter::make('deleted')
            ->form([
                Forms\Components\Select::make('is_deleted')
                ->options([
                        true => 'Deleted',
                        false => 'Active',
                    ])->default(false)
                    ->label('Deleted Records'),
            ])
            ->query(function (Builder $query, array $data): Builder {
                if ($data['is_deleted'] == true) {
                        $query->where('is_deleted', true);
                } else {
                        $query->where('is_deleted', false);
                }
                return $query;
            }),
            Filter::make('status')
            ->form([
                Forms\Components\Select::make('status_id')
                ->options(Status::pluck('name', 'id')->toArray())
                    ->label('Status'),
            ])
            ->query(function (Builder $query, array $data): Builder {
                if($data['status_id'])
                {
                    $query->where('status_id', $data['status_id']);
                }else{
                    $query->get();
                }
                return $query;
            }),
            Filter::make('title_status')
            ->form([
                Forms\Components\Select::make('title_status_id')
                ->options(TitleStatus::pluck('name', 'id')->toArray())
                    ->label('Title Status'),
            ])
            ->query(function (Builder $query, array $data): Builder {
                if($data['title_status_id'])
                {
                    $query->where('title_status_id', $data['title_status_id']);
                }else{
                    $query->get();
                }
                return $query;
            }),
        ];
    }


    protected function getTableActions(): array
    {
        return [
            Action::make('update')
            ->button()
            ->color('success')
            ->icon('heroicon-o-pencil')
            ->modalHeading('Update Record')
            ->modalSubheading('Make sure all the data are correct before submitting.')
            ->modalWidth('5xl')
            ->visible(false)
            ->mountUsing(fn (Forms\ComponentContainer $form, BasicInformation $record) => $form->fill([
                '__number' => $record->number,
                '__lot_number' => $record->lot_number,
                '__survey_number' => $record->survey_number,
                '__title_area' => $record->title_area,
                '__awarded_area' => $record->awarded_area,
                '__previous_land_owner' => $record->previous_land_owner,
                '__field_number' => $record->field_number,
                '__location' => $record->location,
                '__municipality' => $record->municipality,
                '__title' => $record->title,
                '__cloa_number' => $record->cloa_number,
                '__page' => $record->page,
                '__encumbered_area' => json_decode($record->encumbered, true)['area'],
                '__encumbered_variance' => json_decode($record->encumbered, true)['variance'],
                '__previous_copy_of_title_type_of_title' => json_decode($record->previous_copy_of_title, true)['type of title'],
                '__previous_copy_of_title_number' => json_decode($record->previous_copy_of_title, true)['no.'],
                '__title_copy' => $record->title_copy,
                '__tax_dec_number' => $record->tax_dec_number,
                '__title_status' => $record->title_status,
                '__land_bank_amortization' => $record->land_bank_amortization,
                '__remarks' => $record->remarks,
                '__status' => $record->status,
                '__date_paid' => $record->date_paid,
                '__date_of_cert' => $record->date_of_cert,
                '__amount' => $record->amount,
                '__ndc_direct_payment_scheme' => $record->ndc_direct_payment_scheme,
                '__ndc_remarks' => $record->ndc_remarks,
                '__notes' => $record->notes,
            ]))
            ->action(function (array $data, BasicInformation $record): void {
                $encumbered = json_encode([
                    'area' => $data['__encumbered_area'],
                    'variance' => $data['__encumbered_variance'],
                ]);
                $previous_copy_of_title = json_encode([
                    'type of title' => $data['__previous_copy_of_title_type_of_title'],
                    'no.' => $data['__previous_copy_of_title_number'],
                ]);

                DB::beginTransaction();
                $record->number = $data['__number'];
                $record->lot_number = $data['__lot_number'];
                $record->survey_number = $data['__survey_number'];
                $record->title_area = $data['__title_area'];
                $record->awarded_area = $data['__awarded_area'];
                $record->previous_land_owner = $data['__previous_land_owner'];
                $record->field_number = $data['__field_number'];
                $record->location = $data['__location'];
                $record->municipality = $data['__municipality'];
                $record->title = $data['__title'];
                $record->cloa_number = $data['__cloa_number'];
                $record->page = $data['__page'];
                $record->encumbered = $encumbered;
                $record->previous_copy_of_title = $previous_copy_of_title;
                $record->title_copy = $data['__title_copy'];
                $record->tax_dec_number = $data['__tax_dec_number'];
                $record->title_status = $data['__title_status'];
                $record->land_bank_amortization = $data['__land_bank_amortization'];
                $record->remarks = $data['__remarks'];
                $record->status = $data['__status'];
                $record->date_paid =  \Carbon\Carbon::parse($data['__date_paid'])->format('Y-m-d');
                $record->date_of_cert = \Carbon\Carbon::parse($data['__date_of_cert'])->format('Y-m-d');
                $record->amount = $data['__amount'];
                $record->ndc_direct_payment_scheme = $data['__ndc_direct_payment_scheme'];
                $record->ndc_remarks = $data['__ndc_remarks'];
                $record->notes = $data['__notes'];
                $record->save();
                DB::commit();

                $this->dialog()->success(
                    $title = 'Success',
                    $description = 'Data successfully saved'
                );
                // $this->record->author()->associate($data['authorId']);
                // $this->record->save();
            })
            ->form([

                Wizard::make([
                    Wizard\Step::make('first')
                        ->schema([
                            Grid::make(2)
                            ->schema([
                                TextInput::make('__number')->label('No.'),
                                TextInput::make('__lot_number')->label('Lot No.'),
                                TextInput::make('__survey_number')->label('Survey No.'),
                                TextInput::make('__title_area')->label('Title Area'),
                                TextInput::make('__awarded_area')->label('Awarded Area'),
                                TextInput::make('__previous_land_owner')->label('Previous Land Owner'),
                                TextInput::make('__field_number')->label('Field No.'),
                                TextInput::make('__location')->label('Location'),
                                TextInput::make('__municipality')->label('Municipality'),
                                TextInput::make('__title')->label('Title'),
                                TextInput::make('__cloa_number')->label('Cloa No.'),
                                TextInput::make('__page')->label('Page'),
                            ])

                        ])->label('Step 1'),
                    Wizard\Step::make('second')
                        ->schema([
                            Fieldset::make('Variance of Awarded and Base on Title Area')
                            ->schema([
                                TextInput::make('__encumbered_area')->label('Area'),
                                TextInput::make('__encumbered_variance')->label('Variance'),
                            ])
                            ->columns(2),
                            Fieldset::make('Previous Copy Of Title')
                            ->schema([
                                TextInput::make('__previous_copy_of_title_type_of_title')->label('Type Of Title'),
                                TextInput::make('__previous_copy_of_title_number')->label('No.'),
                            ])
                            ->label('Previous Copy Of Title')
                            ->columns(2)
                        ])->label('Step 2'),
                    Wizard\Step::make('third')
                        ->schema([
                                Card::make()
                                ->schema([
                                    Grid::make(1)
                                    ->schema([
                                        TextInput::make('__tax_dec_number')->label('Tax Declaration Number'),
                                    ]),
                                    TextInput::make('__title_copy')->label('Title Copy'),
                                    TextInput::make('__title_status')->label('Title Status'),
                                    TextInput::make('__land_bank_amortization')->label('Land Bank Amortization'),
                                ])->columns(3),
                                Card::make()
                                ->schema([
                                TextArea::make('__remarks')->label('Remarks'),
                                TextArea::make('__status')->label('Status'),
                                ])->columns(2),
                        ])->label('Step 3'),
                    Wizard\Step::make('last')
                        ->schema([
                            Card::make()
                            ->schema([
                                DatePicker::make('__date_paid')->label('Date Paid'),
                                DatePicker::make('__date_of_cert')->label('Date Of Certificate'),
                                TextInput::make('__amount')->label('Amount'),
                                TextInput::make('__ndc_direct_payment_scheme')->label('NDC Direct Payment Scheme'),
                                TextArea::make('__ndc_remarks')->label('NDC Remarks'),
                                TextArea::make('__notes')->label('Notes'),
                            ])->columns(2)
                        ])->label('Step 4'),
                ])
                // ->submitAction(new HtmlString(view('components.forms.save-button')->render()))

            ]),
            // Action::make('view')
            // ->button()
            // ->color('warning')
            // ->icon('heroicon-o-eye')
            // ->action(fn ($record) => $this->viewData($record->id)),
            Action::make('view')
            ->label('View')
            ->button()
            ->outlined()
            ->color('warning')
            ->icon('heroicon-o-eye')
            ->url(fn (BasicInformation $record): string => route('masterlist-data', $record))
            ->visible(fn ($record) => $record->is_deleted == false),
            Action::make('restore')
            ->label('Restore')
            ->button()
            ->outlined()
            ->color('success')
            ->icon('heroicon-o-refresh')
            ->visible(fn ($record) => $record->is_deleted == true)
            ->action(function ($record) {
                $record->is_deleted = false;
                $record->save();
                $this->dialog()->success(
                    $title = 'Success',
                    $description = 'Data successfully restored'
                );
            })
            ->requiresConfirmation(),
        ];
    }

    // public function getTableContent()
    // {
    //     return view('customs.master', [
    //         'infos' => BasicInformation::query(),
    //     ]);
    // }

    public function viewEmptyColumns($missingData)
    {
        $this->missingData = $missingData;
        $this->viewMissingData = true;
    }

    public function viewMissingDocuments($missingDocuments)
    {
        $this->missingDocuments = $missingDocuments;
        $this->viewMissingDocs = true;
    }

    protected function getTableColumns(): array
    {
        return [
            BadgeColumn::make('missingDetails')
            // TextColumn::make('missingDetails')
                ->label('MISSING DETAILS')
                ->formatStateUsing(function ($record) {
                    $post = BasicInformation::find($record->id);

                    $empty_columns = 0;
                    $includedColumns = ['land_bank_amortization', 'ndc_direct_payment_scheme'];
                    $includedColumnsEmpty = true;

                    foreach ($post->getAttributes() as $column => $value) {
                        // List the columns to exclude
                        $excludedColumns = ['cloa_number', 'notes', 'remarks', 'ndc_remarks'];

                        if (in_array($column, $includedColumns)) {
                            if (!is_null($value) && !empty($value)) {
                                $includedColumnsEmpty = false;
                            }
                        } elseif (!in_array($column, $excludedColumns) && (is_null($value) || empty($value))) {
                            $empty_columns++;
                        }
                    }

                    if ($includedColumnsEmpty) {
                        $empty_columns -= count($includedColumns);
                    }

                    return $empty_columns;
                })
                ->color('warning')
                ->action(function (BasicInformation $record): void {
                    $post = BasicInformation::find($record->id);

                    $excludedColumns = ['cloa_number', 'variance', 'notes', 'remarks', 'land_bank_amortization', 'ndc_direct_payment_scheme','ndc_remarks'];

                    $emptyColumns = [];
                    $includeColumns = ['land_bank_amortization', 'ndc_direct_payment_scheme'];
                    $includeColumnsEmpty = true;

                    foreach ($post->getAttributes() as $column => $value) {
                        if (in_array($column, $includeColumns)) {
                            if (!is_null($value) && !empty($value)) {
                                $includeColumnsEmpty = false;
                            }
                        } elseif (!in_array($column, $excludedColumns) && (is_null($value) || empty($value))) {
                            $emptyColumns[] = $column;
                        }
                    }

                    if ($includeColumnsEmpty) {
                        foreach ($includeColumns as $column) {
                            $key = array_search($column, $emptyColumns);
                            if ($key !== false) {
                                unset($emptyColumns[$key]);
                            }
                        }
                    }

                    $this->viewEmptyColumns($emptyColumns);

                }),
                BadgeColumn::make('missingDocuments')
                // TextColumn::make('missingDetails')
                    ->label('MISSING DOCUMENTS')
                    ->formatStateUsing(function ($record) {
                        $post = BasicInformation::find($record->id);

                        $attachedDocuments = $post->attachments()->where('documentable_id', $post->id)->pluck('document_type')->toArray();
                        $allDocumentNames = ['TITLE', 'DEED OF SALE', 'TAX DEC', 'SKETCH PLAN', 'ACTUAL PHOTO', 'VIDEO'];
                        $missingDocuments = array_diff($allDocumentNames, $attachedDocuments);


                        return count($missingDocuments);


                    })
                    ->color('warning')
                    ->action(function (BasicInformation $record): void {
                        $post = BasicInformation::find($record->id);

                        $attachedDocuments = $post->attachments()->where('documentable_id', $post->id)->pluck('document_type')->toArray();
                        $allDocumentNames = ['TITLE', 'DEED OF SALE', 'TAX DEC', 'SKETCH PLAN', 'ACTUAL PHOTO', 'VIDEO'];
                        $missingDocuments = array_diff($allDocumentNames, $attachedDocuments);

                        $this->viewMissingDocuments($missingDocuments);

                    }),
            TextColumn::make('lot_number')
                ->label('LOT NUMBER')
                ->searchable(isIndividual: true, isGlobal: false)
                ->sortable(),
            TextColumn::make('survey_number')
                ->label('SURVEY NO.')
                ->searchable()
                // ->toggleable()
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
            TextColumn::make('encumberedArea')
                ->label('ENCUMBERED AREA')
                ->formatStateUsing(function ($record) {
                    $json = json_decode($record->encumbered, true);
                    $area = $json['area'];

                    return $area;
                }),
            TextColumn::make('encumberedVariance')
                ->label('ENCUMBERED VARIANCE')
                ->formatStateUsing(function ($record) {
                    $json = json_decode($record->encumbered, true);
                    $area = $json['variance'];

                    return $area;
                }),
            TextColumn::make('previuscopyType')
                ->label('PREVIOUS COPY OF TITLE (TYPE)')
                ->formatStateUsing(function ($record) {
                    $json = json_decode($record->previous_copy_of_title, true);
                    $type = $json['type of title'];

                    if($type === "TCT")
                    {
                        return $type = "Transfer Certificate Title (TCT)";
                    }elseif($type === "OCT")
                    {
                        return $type = "Original Certificate Title (OCT)";
                    }
                }),
            TextColumn::make('previuscopyNo')
                ->label('PREVIOUS COPY OF TITLE (NO.)')
                ->formatStateUsing(function ($record) {
                    $json = json_decode($record->previous_copy_of_title, true);
                     $number = $json['no.'];

                    return $number;
                }),
            TextColumn::make('basic_title_status.name')
            ->label('TITLE STATUS')
            ->searchable()
            ->sortable()
            ,
            TextColumn::make('title_copy')
                ->label('TITLE COPY')
                ->searchable()
                ->sortable(),
            TextColumn::make('tax_dec_number')
                ->label('TAX DECLARATION NUMBER')
                ->searchable()
                ->sortable(),
            TextColumn::make('remarks')
                ->label('REMARKS')
                ->searchable()
                ->sortable(),
                // Tables\Columns\SelectColumn::make('status_id')
                // ->options(Status::pluck('name', 'id')),
            TextColumn::make('basic_status.name')
                ->label('STATUS')
                ->searchable()
                ->sortable(),
            TextColumn::make('land_bank_amortization')
                ->label('LANDBANK AMORTIZATION')
                ->searchable()
                ->sortable(),
            TextColumn::make('amount')
                ->label('AMOUNT')
                ->searchable()
                ->sortable(),
            TextColumn::make('date_paid')
                ->label('DATE PAID')
                ->date('F d, Y')
                ->searchable()
                ->sortable(),
            TextColumn::make('date_of_cert')
                ->label('DATE OF CERT')
                ->date('F d, Y')
                ->searchable()
                ->sortable(),
            TextColumn::make('ndc_direct_payment_scheme')
                ->label('NDC DIRECT PAYMENT SCHEME')
                ->searchable()
                ->sortable(),
            TextColumn::make('ndc_remarks')
                ->label('NDC REMARKS')
                ->searchable()
                ->sortable(),
            // TextColumn::make('notes')
            //     ->label('NOTES')
            //     ->searchable()
            //     ->sortable(),
        ];
    }

    public function saveBasicInformation()
    {
        $encumbered = json_encode([
            'area' => $this->_encumbered_area,
            'variance' => $this->_encumbered_variance,
        ]);
        $previous_copy_of_title = json_encode([
            'type of title' => $this->_previous_copy_of_title_type_of_title,
            'no.' => $this->_previous_copy_of_title_number,
        ]);
        DB::beginTransaction();
        BasicInformation::create([
            'number' => $this->_number,
            'lot_number' => $this->_lot_number,
            'survey_number' => $this->_survey_number,
            'title_area' => $this->_title_area,
            'awarded_area' => $this->_awarded_area,
            'previous_land_owner' => $this->_previous_land_owner,
            'field_number' => $this->_field_number,
            'location' => $this->_location,
            'municipality' => $this->_municipality,
            'title' => $this->_title,
            'cloa_number' => $this->_cloa_number,
            'page' => $this->_page,
            'encumbered' => $encumbered,
            'previous_copy_of_title' => $previous_copy_of_title,
            'title_status' => $this->_title_status,
            'title_copy' => $this->_title_copy,
            'remarks' => $this->_remarks,
            'status' => $this->_status,
            'land_bank_amortization' => $this->_land_bank_amortization,
            'amount' => $this->_amount,
            'date_paid' => \Carbon\Carbon::parse($this->_date_paid)->format(
                'Y-m-d'
            ),
            'date_of_cert' => \Carbon\Carbon::parse(
                $this->_date_of_cert
            )->format('Y-m-d'),
            'ndc_direct_payment_scheme' => $this->_ndc_direct_payment_scheme,
            'ndc_remarks' => $this->_ndc_remarks,
            'notes' => $this->_notes,
        ]);
        DB::commit();
        $this->add_modal = false;

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data successfully saved'
        );
    }

    public function saveActualLot()
    {
        $portion = json_encode([
            '0' => $this->portion_field_array[0],
            '1' => $this->portion_field_array[1],
        ]);
        $planted = json_encode([
            '0' => $this->planted_area_array[0],
            '1' => $this->planted_area_array[1],
        ]);
        $gulley = json_encode([
            '0' => $this->gulley_area_array[0],
            '1' => $this->gulley_area_array[1],
        ]);
        $total = json_encode([
            '0' => $this->total_area_array[0],
            '1' => $this->total_area_array[1],
        ]);
        $unutilized = json_encode([
            '0' => $this->unutilized_area_array[0],
            '1' => $this->unutilized_area_array[1],
        ]);

        DB::beginTransaction();
        Actual::create([
            'basic_information_id' => $this->basicInfo->id,
            'number' => $this->basicInfo->number,
            'land_status' => $this->land_status,
            'dolephil_leased' => $this->leased_area,
            'darbc_grower' => $this->darbc_grower,
            'owned_but_not_planted' => $this->other_area,
            'status' => $this->status,
            'remarks' => $this->remarks,
            'gross_area' => $this->gross_area,
            'planted_area' => $this->planted_area,
            'gulley_area' => $this->gulley_area,
            'total_area' => $this->total_area,
            'facility_area' => $this->facility_area,
            'unutilized_area' => $this->unutilized_area,
            'portion_field_areas' => $portion,
            'planted_areas' => $planted,
            'gulley_areas' => $gulley,
            'total_areas' => $total,
            'unutilized_areas' => $unutilized,
        ]);
        DB::commit();
        $this->addActualModal = false;

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data successfully saved'
        );
    }

    public function closeModal()
    {
        $this->add_modal = false;
    }

    public function saveTax()
    {
        DB::beginTransaction();
        $tax = Tax::create([
            'basic_information_id' => $this->basicInfo->id,
            'number' => $this->basicInfo->number,
            'title_number' => $this->title_number,
            'tax_declaration_number' => $this->tax_declaration_number,
            'owner' => $this->owner,
            'lease_to_dolefil' => $this->lease_to_dolefil,
            'darbc_growers_hip' => $this->darbc_growers_hip,
            'darbc_area_not_planted_pineapple' => $this->darbc_not_planted,
            'remarks' => $this->remarks,
            'market_value' => $this->market_value,
            'assessed_value' => $this->assessed_value,
            'year' => $this->year,
            'square_meter' => $this->square_meter,
            'tax_payment' => $this->tax_payment,
            'year_of_payment' => $this->year_of_payment,
            'official_receipt' => $this->official_receipt,
        ]);

        if ($this->receipt_image != null) {
            foreach($this->receipt_image as $document){
                $receipt_image_path = $document->storeAs('livewire-tmp',$document->getClientOriginalName());
            }
            // $receipt_image_path = Storage::disk('public')->put('livewire-tmp', $this->receipt_image);
            // $receipt_image_path = $this->receipt_image->storeAs('livewire-tmp',$this->receipt_image->getClientOriginalName());
            $taxReceiptImage = TaxReceiptImage::create([
                'tax_id' => $tax->id,
                'image_path' => $receipt_image_path,
            ]);
        }
        DB::commit();
        $this->addTaxModal = false;

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data successfully saved'
        );
    }

    public function render()
    {
        return view('livewire.admin.masterlist', [
            'taxss' => Tax::where('basic_information_id', $this->informationId)
                ->when($this->tax_get, function ($query) {
                    $query->where('year', $this->tax_get);
                })
                ->get(),
            'tax_years' => Tax::where('year', '!=', '')
                ->when($this->informationId, function ($query) {
                    $query->where('basic_information_id', $this->informationId);
                })
                ->groupBy('year')
                ->pluck('year')
                ->toArray(),

            'actuals' => Actual::where(
                'basic_information_id',
                $this->informationId
            )->get(),
        ]);
    }

    public function viewData($id)
    {
        $this->informationId = $id;
        $this->basicInfo = BasicInformation::where('id', $id)->first();
        $this->encumbered = BasicInformation::where('id', $id)->first()->encumbered;
        $this->previous_copy_of_title = BasicInformation::where('id', $id)->first()->previous_copy_of_title;

        $this->actual = Actual::where('basic_information_id', $id)->first();
        $this->taxes = $this->view_modal = true;

        // $this->title_status_detailed = $this->basicInfo->title_status;
        switch ($this->basicInfo->title_status) {
            case 'TWC':
                $this->title_status_detailed = 'TWC - Title with CLOA';
                break;
            case 'TWOC':
                    $this->title_status_detailed = 'TWOC - Title without CLOA';
                break;
            case 'UWC':
                    $this->title_status_detailed = 'UWC - Untitled with CLOA';
                break;
            case 'UWOC':
                    $this->title_status_detailed = 'UWOC - Untitled without CLOA';
                 break;
            default:
            $this->title_status_detailed = '';
                break;
        }
    }
}
