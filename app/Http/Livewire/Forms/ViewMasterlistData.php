<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Filament\Tables;
use Filament\Forms;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use App\Models\BasicInformation;
use App\Models\Actual;
use App\Models\Tax;
use App\Models\TaxReceiptImage;
use Filament\Forms\Components\DatePicker;
use Illuminate\Support\HtmlString;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\FileUpload;
use WireUi\Traits\Actions;
use Carbon\Carbon;
use DB;

class ViewMasterlistData extends Component  implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;

    public $record;
    public $informationId;
    public $basicInfo;
    public $encumbered;
    public $previous_copy_of_title;
    public $actual;
    public $taxes;
    public $title_status_detailed;
    public $view_modal = false;
    public $addActualModal = false;
    public $addTaxModal = false;
    public $tax_get;
    public $tax_year;
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

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('receipt_image')
            ->preserveFilenames()
            ->label('UPLOAD RECEIPT IMAGE')
            ->image()
        ];
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

    public function mount()
    {
        $this->tax_year = Tax::where('year', '!=', '')
        ->groupBy('year')
        ->pluck('year')
        ->toArray();

        $id = $this->record->id;
        $this->informationId = $id;
        $this->basicInfo = BasicInformation::where('id', $id)->first();
        $this->encumbered = BasicInformation::where('id', $id)->first()->encumbered;
        $this->previous_copy_of_title = BasicInformation::where('id', $id)->first()->previous_copy_of_title;

        $this->actual = Actual::where('basic_information_id', $id)->first();
        $this->taxes = $this->view_modal = true;

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

    public function render()
    {
        return view('livewire.forms.view-masterlist-data', [
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
}
