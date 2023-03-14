<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Imports\LotAmortization;
use Livewire\WithFileUploads;
use League\Csv\Reader;
use Illuminate\Support\Facades\Storage;
use App\Models\BasicInformationLotAmortization;
use App\Models\BasicInformation;
use App\Models\Tax;
use App\Models\Actual;
use WireUi\Traits\Actions;
class Upload extends Component

{
    use WithFileUploads;
    use Actions;
    public $basic_information;
    public $amortization;
    public $tax;
    public $actual;

    public function render()
    {
        return view('livewire.admin.upload');
    }

    public function uploadBasicInformation(){

        $csvContents = Storage::get($this->basic_information->getClientOriginalName());
        $csvReader = Reader::createFromString($csvContents);
        $csvRecords = $csvReader->getRecords();

        foreach ($csvRecords as $csvRecord) {
            $encumbered = json_encode([
                'area' => $csvRecord[12],
                'variance' => $csvRecord[13],
            ]);
            $previous_copy_of_title = json_encode([
                'type of title' => $csvRecord[14],
                'no.' => $csvRecord[15],
            ]);

            BasicInformation::create([
               'number' => $csvRecord[0],
               'lot_number' => $csvRecord[1],
               'survey_number' => $csvRecord[2],
               'title_area' => $csvRecord[3],
               'awarded_area' => $csvRecord[4],
               'previous_land_owner' => $csvRecord[5],
               'field_number' => $csvRecord[6],
               'location' => $csvRecord[7],
               'municipality' => $csvRecord[8],
               'title' => $csvRecord[9],
               'cloa_number' => $csvRecord[10],
               'page' => $csvRecord[11],
               'encumbered' => $encumbered,
               'previous_copy_of_title' => $previous_copy_of_title,
               'title_status' => $csvRecord[16],
               'title_copy' => $csvRecord[17],
               'remarks' => $csvRecord[18],
               'status' => $csvRecord[19],
               'land_bank_amortization' => $csvRecord[20],
               'amount' => $csvRecord[21],
               'date_paid' => \Carbon\Carbon::parse($csvRecord[22])->format('Y-m-d'),
               'date_of_cert' => \Carbon\Carbon::parse($csvRecord[23])->format('Y-m-d'),
               'ndc_direct_payment_scheme' => $csvRecord[24],
               'ndc_remarks' => $csvRecord[25],
               'notes' => $csvRecord[26],
            ]);
        }

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data uploaded'
        );
    }

    public function uploadLot(){

        $csvContents = Storage::get($this->amortization->getClientOriginalName());
        $csvReader = Reader::createFromString($csvContents);
        $csvRecords = $csvReader->getRecords();

        foreach ($csvRecords as $csvRecord) {
            BasicInformationLotAmortization::create([
               'basic_information_id' => $csvRecord[0],
               'number' => $csvRecord[0],
            ]);
        }

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data uploaded'
        );
    }


    public function uploadTax(){

        $csvContents = Storage::get($this->tax->getClientOriginalName());
        $csvReader = Reader::createFromString($csvContents);
        $csvRecords = $csvReader->getRecords();

        foreach ($csvRecords as $csvRecord) {
            // dd($csvRecord);
            Tax::create([
               'basic_information_id' => $csvRecord[0],
               'number' => $csvRecord[0],
               'title_number' => $csvRecord[1],
               'tax_declaration_number' => $csvRecord[2],
               'owner' => $csvRecord[3],
               'lease_to_dolefil' => $csvRecord[4],
               'darbc_growers_hip' => $csvRecord[5],
               'darbc_area_not_planted_pineapple' => $csvRecord[6],
               'remarks' => $csvRecord[7],
               'market_value' => $csvRecord[8],
               'assessed_value' => $csvRecord[9],
               'year' => $csvRecord[10],
               'square_meter' => $csvRecord[11],
               'tax_payment' => $csvRecord[12],
               'year_of_payment' => $csvRecord[13],
               'official_receipt' => $csvRecord[14],
            ]);
        }

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data uploaded'
        );
    }

    public function uploadActual(){

        $csvContents = Storage::get($this->actual->getClientOriginalName());
        $csvReader = Reader::createFromString($csvContents);
        $csvRecords = $csvReader->getRecords();

        foreach ($csvRecords as $csvRecord) {

            $portion_field_areas = json_encode([
                '1' => $csvRecord[13],
                '2' => $csvRecord[18],
            ]);
            $planted_areas = json_encode([
                '1' => $csvRecord[14],
                '2' => $csvRecord[19],
            ]);
            $gulley_areas = json_encode([
                '1' => $csvRecord[15],
                '2' => $csvRecord[20],
            ]);
            $total_areas = json_encode([
                '1' => $csvRecord[16],
                '2' => $csvRecord[21],
            ]);
            $unutilized_areas = json_encode([
                '1' => $csvRecord[17],
                '2' => $csvRecord[22],
            ]);

            Actual::create([
               'basic_information_id' => $csvRecord[0],
               'number' => $csvRecord[0],
               'land_status' => $csvRecord[1],
               'dolephil_leased' => $csvRecord[2],
               'darbc_grower' => $csvRecord[3],
               'owned_but_not_planted' => $csvRecord[4],
               'status' => $csvRecord[5],
               'remarks' => $csvRecord[6],
               'gross_area' => $csvRecord[7],
               'planted_area' => $csvRecord[8],
               'gulley_area' => $csvRecord[9],
               'total_area' => $csvRecord[10],
               'facility_area' => $csvRecord[11],
               'unutilized_area' => $csvRecord[12],
               'portion_field_areas' => $portion_field_areas,
               'planted_areas' => $planted_areas,
               'gulley_areas' => $gulley_areas,
               'total_areas' => $total_areas,
               'unutilized_areas' => $unutilized_areas,

            ]);
        }

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data uploaded'
        );
    }
}
