<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use App\Models\BasicInformation;
use WireUi\Traits\Actions;
use DB;

class UploadDeedOfSaleAttachment extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use Actions;

    public $basicinfo_id;
    public $basicInfo;
    public $attachment = [];

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('attachment')
                        ->enableOpen()
                        ->multiple()
                        ->disk('public')
                        ->preserveFilenames()
                        ->required()
                        ->reactive()
        ];
    }

    public function save()
    {
        DB::beginTransaction();
        foreach ($this->attachment as $file) {
            $this->basicInfo->attachments()->create(
                [
                     "path"=>$file->storeAs('public',now()->format("HismdY-").$file->getClientOriginalName()),
                     "document_name"=>$file->getClientOriginalName(),
                     "document_type"=>'DEED OF SALE',
                ]
            );
        }
        DB::commit();

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been added'
        );
        $this->reset();
        $this->emit('close_deed_of_sale_modal');
    }

    public function mount()
    {
        $this->basicInfo = BasicInformation::find($this->basicinfo_id);
    }


    public function render()
    {
        return view('livewire.forms.upload-deed-of-sale-attachment');
    }
}
