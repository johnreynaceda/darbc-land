<?php

namespace App\Http\Livewire\Components;

use Filament\Forms;
use App\Models\BasicInformation;
use App\Models\Status;
use WireUi\Traits\Actions;
use Filament\Forms\Components\Wizard;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Grid;
use Filament\Forms\Components\Card;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Fieldset;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\HtmlString;
use Livewire\Component;
use DB;
use Filament\Forms\Components\Select;

class AddLot extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use Actions;

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

    protected function getFormSchema(): array
    {
        return [
            Wizard::make([
                Wizard\Step::make('step_1')
                    ->schema([
                        Grid::make(2)
                        ->schema([
                            TextInput::make('_number')->label('No.'),
                            TextInput::make('_lot_number')->label('Lot No.'),
                            TextInput::make('_survey_number')->label('Survey No.'),
                            TextInput::make('_title_area')->label('Title Area'),
                            TextInput::make('_awarded_area')->label('Awarded Area'),
                            TextInput::make('_previous_land_owner')->label('Previous Land Owner'),
                            TextInput::make('_field_number')->label('Field No.'),
                            TextInput::make('_location')->label('Location'),
                            TextInput::make('_municipality')->label('Municipality'),
                            TextInput::make('_title')->label('Title'),
                            TextInput::make('_cloa_number')->label('Cloa No.'),
                            TextInput::make('_page')->label('Page'),
                        ])

                    ])->label('Step 1'),
                Wizard\Step::make('step_2')
                    ->schema([
                        Fieldset::make('Variance of Awarded and Base on Title Area')
                        ->schema([
                            TextInput::make('_encumbered_area')->label('Area'),
                            TextInput::make('_encumbered_variance')->label('Variance'),
                        ])
                        ->columns(2),
                        Fieldset::make('Previous Copy Of Title')
                        ->schema([
                            TextInput::make('_previous_copy_of_title_type_of_title')->label('Type Of Title'),
                            TextInput::make('_previous_copy_of_title_number')->label('No.'),
                        ])
                        ->label('Previous Copy Of Title')
                        ->columns(2)
                    ])->label('Step 2'),
                Wizard\Step::make('step_3')
                    ->schema([
                            Card::make()
                            ->schema([
                                Grid::make(1)
                                ->schema([
                                    TextInput::make('_tax_dec_number')->label('Tax Declaration Number'),
                                ]),
                                TextInput::make('_title_copy')->label('Title Copy'),
                                TextInput::make('_title_status')->label('Title Status'),
                                TextInput::make('_land_bank_amortization')->label('Land Bank Amortization'),
                            ])->columns(3),
                            Card::make()
                            ->schema([
                                Select::make('_status')->label('Status')->options(Status::all()->pluck('name', 'id')->toArray()),
                                TextInput::make('_remarks')->label('Remarks'),
                            ])->columns(1),
                    ])->label('Step 3'),
                Wizard\Step::make('step_4')
                    ->schema([
                        Card::make()
                        ->schema([
                            DatePicker::make('_date_paid')->label('Date Paid'),
                            DatePicker::make('_date_of_cert')->label('Date Of Certificate'),
                            TextInput::make('_amount')->label('Amount'),
                            TextInput::make('_ndc_direct_payment_scheme')->label('NDC Direct Payment Scheme'),
                            TextArea::make('_ndc_remarks')->label('NDC Remarks'),
                            TextArea::make('_notes')->label('Notes'),
                        ])->columns(2)
                    ])->label('Step 4'),
            ])->submitAction(new HtmlString(view('components.forms.save-button')->render()))
        ];
    }

    public function save()
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
            'status_id' => $this->_status,
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
            'tax_dec_number' => $this->_tax_dec_number,
            'remarks' => $this->_remarks,
            // 'status' => $this->_status,
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

        $this->emit('close_modal');

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data successfully saved'
        );
    }

    public function render()
    {
        return view('livewire.components.add-lot');
    }
}
