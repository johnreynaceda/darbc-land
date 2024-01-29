<?php

namespace App\Http\Livewire\Forms;

use DB;
use Filament\Forms;
use Livewire\Component;
use WireUi\Traits\Actions;
use App\Models\OtherAttachment;
use App\Models\BasicInformation;
use Filament\Forms\Components\FileUpload;

class UploadOthersAttachment extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use Actions;

    public $basicinfo_id;
    public $basicInfo;
    public $other_id;
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
                     "document_type"=>'OTHERS',
                     "other_attachment_id" => $this->other_attachment_id,
                ]
            );
        }
        DB::commit();

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been added'
        );
        $this->reset();
        $this->emit('close_others_modal');
    }

    public function mount($basicinfo_id, $other_id)
    {
        $this->basicinfo_id = $basicinfo_id;
        $this->other_id = $other_id;

        $this->basicInfo = BasicInformation::find($this->basicinfo_id);
        $this->other_attachment = OtherAttachment::find($this->other_id);
    }


    public function render()
    {
        return view('livewire.forms.upload-others-attachment');
    }
}
