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
use App\Models\Attachment;
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
    public $tax_data;
    public $title_status_detailed;
    public $view_modal = false;
    public $addActualModal = false;
    public $updateActualModal = false;
    public $addTaxModal = false;
    public $addTaxReceiptModal = false;
    public $viewTaxModal = false;
    public $updateTaxModal = false;
    public $tax_get;
    public $tax_year;
     //actual lot models
     public $actual_to_update;
     public $actual_to_delete;
     public $land_status;
     public $leased_area;
     public $darbc_grower;
     public $other_area;
     public $status;
     public $remarks;
     public $actual_field_number;
     public $gross_area;
     public $planted_area;
     public $gulley_area;
     public $total_area;
     public $facility_area;
     public $unutilized_area;
     //update actual lot
     public $update_land_status;
     public $update_leased_area;
     public $update_darbc_grower;
     public $update_other_area;
     public $update_status;
     public $update_remarks;
     public $update_actual_field_number;
     public $update_gross_area;
     public $update_planted_area;
     public $update_gulley_area;
     public $update_total_area;
     public $update_facility_area;
     public $update_unutilized_area;

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
     public $tax_to_delete;
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

    //view tax models
    public $view_title_number;
    public $view_tax_declaration_number;
    public $view_owner;
    public $view_lease_to_dolefil;
    public $view_darbc_growers_hip;
    public $view_darbc_not_planted;
    public $view_tax_remarks;
    public $view_market_value;
    public $view_assessed_value;
    public $view_year;
    public $view_square_meter;
    public $view_year_of_payment;
    public $view_official_receipt;


      //update tax models
      public $update_title_number;
      public $update_tax_declaration_number;
      public $update_owner;
      public $update_lease_to_dolefil;
      public $update_darbc_growers_hip;
      public $update_darbc_not_planted;
      public $update_tax_remarks;
      public $update_market_value;
      public $update_assessed_value;
      public $update_year;
      public $update_square_meter;
    //   public $update_tax_payment;
      public $update_year_of_payment;
      public $update_official_receipt;
    //   public $update_receipt_image;

     //attachment variables
     public $title_attachment_id;
     public $deed_of_sale_attachment_id;
     public $tax_attachment_id;
     public $sketch_attachment_id;
     public $actual_attachment_id;
     public $video_attachment_id;
     public $others_attachment_id;
     public $tax_receipt_id;

     //modals
     public $titleAttachmentModal = false;
     public $deedOfSaleAttachmentModal = false;
     public $taxDecAttachmentModal = false;
     public $sketchPlanAttachmentModal = false;
     public $actualPhotoAttachmentModal = false;
     public $videoAttachmentModal = false;
     public $othersAttachmentModal = false;
     protected $listeners = [
        'close_title_modal'=> 'closeTitleModal',
        'close_deed_of_sale_modal'=> 'closeDeedOfSaleModal',
        'close_tax_modal' => 'closeTaxModal',
        'close_sketch_plan_modal' => 'closeSketchPlanModal',
        'close_actual_photo_modal' => 'closeActualPhotoModal',
        'close_video_modal' => 'closeVideoModal',
        'close_others_modal' => 'closeOthersModal',
        'close_tax_receipt_modal' => 'closeTaxReciptModal',
        'refreshComponent' => '$refresh'
    ];


    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('receipt_image')
            ->preserveFilenames()
            ->label('UPLOAD RECEIPT IMAGE')
            ->image()
        ];
    }

    public function getFileUrl($filename)
    {
        return Storage::url($filename);
    }

    public function deleteTitleAttachment($curAtt)
    {
        $this->title_attachment_id = $curAtt;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete attachement? This action cannot be undone',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'deleteTitleAttachmentFinal',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function deleteTitleAttachmentFinal()
    {
        $deleted = false;
        if (isset($this->title_attachment_id)) {
            $deleted = Attachment::where('id',$this->title_attachment_id)->first()->delete();
        }
       if ($deleted) {
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been deleted'
        );
       } else {
        $this->dialog()->error(
            $title = 'An error occured!',
            $description = 'Reload the page and try again!'
        );
       }
       $this->emit('refreshComponent');
    }

    public function deleteDeedOfSaleAttachment($curAtt)
    {
        $this->deed_of_sale_attachment_id = $curAtt;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete attachement? This action cannot be undone',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'deleteDeedOfSaleAttachmentFinal',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function deleteDeedOfSaleAttachmentFinal()
    {
        $deleted = false;
        if (isset($this->deed_of_sale_attachment_id)) {
            $deleted = Attachment::where('id',$this->deed_of_sale_attachment_id)->first()->delete();
        }
       if ($deleted) {
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been deleted'
        );
       } else {
        $this->dialog()->error(
            $title = 'An error occured!',
            $description = 'Reload the page and try again!'
        );
       }
       $this->emit('refreshComponent');
    }

    public function deleteTaxAttachment($curAtt)
    {
        $this->tax_attachment_id = $curAtt;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete attachement? This action cannot be undone',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'deleteTaxAttachmentFinal',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function deleteTaxAttachmentFinal()
    {
        $deleted = false;
        if (isset($this->tax_attachment_id)) {
            $deleted = Attachment::where('id',$this->tax_attachment_id)->first()->delete();
        }
       if ($deleted) {
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been deleted'
        );
       } else {
        $this->dialog()->error(
            $title = 'An error occured!',
            $description = 'Reload the page and try again!'
        );
       }
       $this->emit('refreshComponent');
    }

    public function deleteSketchPlanAttachment($curAtt)
    {
        $this->sketch_attachment_id = $curAtt;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete attachement? This action cannot be undone',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'deleteSketchAttachmentFinal',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function deleteSketchAttachmentFinal()
    {
        $deleted = false;
        if (isset($this->sketch_attachment_id)) {
            $deleted = Attachment::where('id',$this->sketch_attachment_id)->first()->delete();
        }
       if ($deleted) {
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been deleted'
        );
       } else {
        $this->dialog()->error(
            $title = 'An error occured!',
            $description = 'Reload the page and try again!'
        );
       }
       $this->emit('refreshComponent');
    }

    public function deleteActualAttachment($curAtt)
    {
        $this->actual_attachment_id = $curAtt;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete attachement? This action cannot be undone',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'deleteActualAttachmentFinal',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function deleteActualAttachmentFinal()
    {
        $deleted = false;
        if (isset($this->actual_attachment_id)) {
            $deleted = Attachment::where('id',$this->actual_attachment_id)->first()->delete();
        }
       if ($deleted) {
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been deleted'
        );
       } else {
        $this->dialog()->error(
            $title = 'An error occured!',
            $description = 'Reload the page and try again!'
        );
       }
       $this->emit('refreshComponent');
    }

    public function deleteVideoAttachment($curAtt)
    {
        $this->video_attachment_id = $curAtt;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete attachement? This action cannot be undone',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'deleteVideoAttachmentFinal',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function deleteVideoAttachmentFinal()
    {
        $deleted = false;
        if (isset($this->video_attachment_id)) {
            $deleted = Attachment::where('id',$this->video_attachment_id)->first()->delete();
        }
       if ($deleted) {
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been deleted'
        );
       } else {
        $this->dialog()->error(
            $title = 'An error occured!',
            $description = 'Reload the page and try again!'
        );
       }
       $this->emit('refreshComponent');
    }

    public function deleteOthersAttachment($curAtt)
    {
        $this->others_attachment_id = $curAtt;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete attachement? This action cannot be undone',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'deleteOthersAttachmentFinal',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function deleteOthersAttachmentFinal()
    {
        $deleted = false;
        if (isset($this->others_attachment_id)) {
            $deleted = Attachment::where('id',$this->others_attachment_id)->first()->delete();
        }
       if ($deleted) {
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been deleted'
        );
       } else {
        $this->dialog()->error(
            $title = 'An error occured!',
            $description = 'Reload the page and try again!'
        );
       }
       $this->emit('refreshComponent');
    }

    public function deleteTaxReceiptAttachment($curAtt)
    {
        $this->tax_receipt_id = $curAtt;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete attachement? This action cannot be undone',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'deleteTaxReceiptAttachmentFinal',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function deleteTaxReceiptAttachmentFinal()
    {
        $deleted = false;
        if (isset($this->tax_receipt_id)) {
            $deleted = TaxReceiptImage::where('id',$this->tax_receipt_id)->first()->delete();
        }
       if ($deleted) {
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been deleted'
        );
       } else {
        $this->dialog()->error(
            $title = 'An error occured!',
            $description = 'Reload the page and try again!'
        );
       }
       $this->emit('refreshComponent');
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
            'field_number' => $this->actual_field_number,
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

    public function closeTitleModal()
    {
        $this->titleAttachmentModal = false;
        $this->emit('refreshComponent');
    }

    public function closeDeedOfSaleModal()
    {
        $this->deedOfSaleAttachmentModal = false;
        $this->emit('refreshComponent');
    }

    public function closeTaxModal()
    {
        $this->taxDecAttachmentModal = false;
        $this->emit('refreshComponent');
    }

    public function closeSketchPlanModal()
    {
        $this->sketchPlanAttachmentModal = false;
        $this->emit('refreshComponent');
    }

    public function closeActualPhotoModal()
    {
        $this->actualPhotoAttachmentModal = false;
        $this->emit('refreshComponent');
    }

    public function closeVideoModal()
    {
        $this->videoAttachmentModal = false;
        $this->emit('refreshComponent');
    }

    public function closeOthersModal()
    {
        $this->othersAttachmentModal = false;
        $this->emit('refreshComponent');
    }

    public function closeTaxReciptModal()
    {
        $this->addTaxReceiptModal = false;
        $this->emit('refreshComponent');
    }


    public function viewAttachment($record, $type)
    {
        return redirect()->route('view-attachments', ['record' => $record,'type' => $type,]);
    }

    public function updatedLandStatus()
    {
        $this->leased_area = null;
        $this->darbc_grower = null;
        $this->other_area = null;
    }

    public function updatedUpdateLandStatus()
    {
        $this->update_leased_area = null;
        $this->update_darbc_grower = null;
        $this->update_other_area = null;
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

    public function updateActual($id)
    {
        $actual = Actual::find($id);
        $this->actual_to_update = $actual;
        $this->update_land_status = $actual->land_status;
        $this->update_leased_area = $actual->dolephil_leased;
        $this->update_darbc_grower = $actual->darbc_grower;
        $this->update_other_area = $actual->owned_but_not_planted;
        $this->update_status = $actual->status;
        $this->update_remarks = $actual->remarks;
        $this->update_actual_field_number = $actual->field_number;
        $this->update_gross_area = $actual->gross_area;
        $this->update_planted_area = $actual->planted_area;
        $this->update_gulley_area = $actual->gulley_area;
        $this->update_total_area = $actual->total_area;
        $this->update_facility_area = $actual->facility_area;
        $this->update_unutilized_area = $actual->unutilized_area;
        $this->updateActualModal = true;
    }

    public function updateActualLot()
    {
        DB::beginTransaction();
        $this->actual_to_update->land_status = $this->update_land_status;
        $this->actual_to_update->dolephil_leased = $this->update_leased_area;
        $this->actual_to_update->darbc_grower = $this->update_darbc_grower;
        $this->actual_to_update->owned_but_not_planted = $this->update_other_area;
        $this->actual_to_update->status = $this->update_status;
        $this->actual_to_update->remarks = $this->update_remarks;
        $this->actual_to_update->field_number = $this->update_actual_field_number;
        $this->actual_to_update->gross_area = $this->update_gross_area;
        $this->actual_to_update->planted_area = $this->update_planted_area;
        $this->actual_to_update->gulley_area = $this->update_gulley_area;
        $this->actual_to_update->total_area = $this->update_total_area;
        $this->actual_to_update->facility_area = $this->update_facility_area;
        $this->actual_to_update->unutilized_area = $this->update_unutilized_area;
        $this->actual_to_update->save();
        DB::commit();

         $this->updateActualModal = false;

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data successfully updated'
        );
    }

    public function deleteActual($id)
    {
        $actual = Actual::find($id);
        $this->actual_to_delete =  $actual;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete the information?',
            'acceptLabel' => 'Yes, delete it',
            'method'      => 'deleteActualFinal',
        ]);
    }

    public function deleteActualFinal()
    {
        $deleted = false;
        if (isset($this->actual_to_delete)) {
            $deleted = Actual::where('id', $this->actual_to_delete->id)->first()->delete();
        }
       if ($deleted) {
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data has been deleted'
        );
       } else {
        $this->dialog()->error(
            $title = 'An error occured!',
            $description = 'Reload the page and try again!'
        );
       }
       $this->emit('$refresh');
    }

    public function viewTax($id)
    {
        $this->tax_data = Tax::find($id);
        $this->viewTaxModal = true;
        $this->view_title_number = $this->tax_data->title_number;
        $this->view_tax_declaration_number = $this->tax_data->tax_declaration_number;
        $this->view_owner = $this->tax_data->owner;
        $this->view_lease_to_dolefil = $this->tax_data->lease_to_dolefil;
        $this->view_darbc_growers_hip = $this->tax_data->darbc_growers_hip;
        $this->view_darbc_not_planted = $this->tax_data->darbc_area_not_planted_pineapple;
        $this->view_tax_remarks = $this->tax_data->remarks;
        $this->view_market_value = $this->tax_data->market_value;
        $this->view_assessed_value = $this->tax_data->assessed_value;
        $this->view_year = $this->tax_data->year;
        $this->view_square_meter = $this->tax_data->square_meter;
        $this->view_year_of_payment = $this->tax_data->year_of_payment;
        $this->view_official_receipt = $this->tax_data->official_receipt;
    }

    public function updateTax($id)
    {
        $this->tax_data = Tax::find($id);
        $this->updateTaxModal = true;
        $this->update_title_number = $this->tax_data->title_number;
        $this->update_tax_declaration_number = $this->tax_data->tax_declaration_number;
        $this->update_owner = $this->tax_data->owner;
        $this->update_lease_to_dolefil = $this->tax_data->lease_to_dolefil;
        $this->update_darbc_growers_hip = $this->tax_data->darbc_growers_hip;
        $this->update_darbc_not_planted = $this->tax_data->darbc_area_not_planted_pineapple;
        $this->update_tax_remarks = $this->tax_data->remarks;
        $this->update_market_value = $this->tax_data->market_value;
        $this->update_assessed_value = $this->tax_data->assessed_value;
        $this->update_year = $this->tax_data->year;
        $this->update_square_meter = $this->tax_data->square_meter;
        $this->update_year_of_payment = $this->tax_data->year_of_payment;
        $this->update_official_receipt = $this->tax_data->official_receipt;
    }

    public function confirmUpdateTax()
    {
        DB::beginTransaction();
        $this->tax_data->title_number = $this->update_title_number;
        $this->tax_data->tax_declaration_number = $this->update_tax_declaration_number;
        $this->tax_data->owner = $this->update_owner;
        $this->tax_data->lease_to_dolefil = $this->update_lease_to_dolefil;
        $this->tax_data->darbc_growers_hip = $this->update_darbc_growers_hip;
        $this->tax_data->darbc_area_not_planted_pineapple = $this->update_darbc_not_planted;
        $this->tax_data->remarks = $this->update_tax_remarks;
        $this->tax_data->market_value = $this->update_market_value;
        $this->tax_data->assessed_value = $this->update_assessed_value;
        $this->tax_data->year = $this->update_year;
        $this->tax_data->square_meter = $this->update_square_meter;
        $this->tax_data->year_of_payment = $this->update_year_of_payment;
        $this->tax_data->official_receipt = $this->update_official_receipt;
        $this->tax_data->save();
        DB::commit();
        $this->updateTaxModal = false;
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data has been successfully updated'
        );
    }

    public function deleteTax($id)
    {
        $tax = Tax::find($id);
        $this->tax_to_delete =  $tax;

        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'icon' => 'error',
            'description' => 'Delete the information?',
            'acceptLabel' => 'Yes, delete it',
            'method'      => 'deleteTaxFinal',
        ]);
    }

    public function deleteTaxFinal()
    {
        $deleted = false;
        if (isset($this->tax_to_delete)) {
            $deleted = Tax::where('id', $this->tax_to_delete->id)->first()->delete();
        }
       if ($deleted) {
        $this->dialog()->success(
            $title = 'Success',
            $description = 'Data has been deleted'
        );
       } else {
        $this->dialog()->error(
            $title = 'An error occured!',
            $description = 'Reload the page and try again!'
        );
       }
       $this->emit('$refresh');
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
