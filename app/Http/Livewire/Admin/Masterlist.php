<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use Filament\Tables;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\BasicInformation;
use Filament\Tables\Columns\TextColumn;
use WireUi\Traits\Actions;
use Filament\Forms\Components\FileUpload;
use Illuminate\Support\Facades\Storage;
use App\Models\Actual;
use App\Models\Tax;
use App\Models\TaxReceiptImage;
use DB;

class Masterlist extends Component implements Tables\Contracts\HasTable
{
    public $add_modal = false;
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
    public $_remarks;
    public $_status;
    public $_land_bank_amortization;
    public $_amount;
    public $_date_paid;
    public $_date_of_cert;
    public $_ndc_direct_payment_scheme;
    public $_ndc_remarks;
    public $_notes;
    public $view_modal = false;
    public $basicInfo = [];
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
                ->searchable()
                ->sortable(),
            TextColumn::make('previous_copy_of_title')
                ->searchable()
                ->sortable(),
            TextColumn::make('title_status')
                ->searchable()
                ->sortable(),
            TextColumn::make('title_copy')
                ->searchable()
                ->sortable(),
            TextColumn::make('remarks')
                ->searchable()
                ->sortable(),
            TextColumn::make('status')
                ->searchable()
                ->sortable(),
            TextColumn::make('land_bank_amortization')
                ->searchable()
                ->sortable(),
            TextColumn::make('amount')
                ->searchable()
                ->sortable(),
            TextColumn::make('date_paid')
                ->searchable()
                ->sortable(),
            TextColumn::make('date_of_cert')
                ->searchable()
                ->sortable(),
            TextColumn::make('ndc_direct_payment_scheme')
                ->searchable()
                ->sortable(),
            TextColumn::make('ndc_remarks')
                ->searchable()
                ->sortable(),
            TextColumn::make('notes')
                ->searchable()
                ->sortable(),
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
        $this->actual = Actual::where('basic_information_id', $id)->first();
        $this->taxes = $this->view_modal = true;
    }
}
