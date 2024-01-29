<?php

namespace App\Http\Livewire\Forms;

use Filament\Forms;
use Livewire\Component;
use App\Models\Attachment;
use WireUi\Traits\Actions;
use App\Models\OtherAttachment;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Filament\Forms\Components\FileUpload;

class ViewOtherAttachments extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use Actions;

    public $record;
    public $id_other;
    public $other_att;
    public $other_attachment_id;
    public $othersAttachmentModal = false;
    public $other_attachment = [];
    public $attachments;

    protected $listeners = ['refreshComponent' => '$refresh'];

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('other_attachment')
                        ->enableOpen()
                        ->label('')
                        ->columnSpan('full')
                        ->multiple()
                        ->disk('public')
                        ->preserveFilenames()
                        ->required()
                        ->reactive()
        ];
    }

    public function saveUpload($id)
    {
        DB::beginTransaction();
        foreach ($this->other_attachment as $file) {
            $this->record->attachments()->create(
                [
                     "path"=>$file->storeAs('public',now()->format("HismdY-").$file->getClientOriginalName()),
                     "document_name"=>$file->getClientOriginalName(),
                     "document_type"=>'OTHERS',
                     "other_attachment_id" => $id,
                ]
            );
        }
        DB::commit();

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been added'
        );
        return redirect()->route('view-other-attachments', $this->record->id);
    }


    public function getFileUrl($filename)
    {
        return Storage::url($filename);
    }

    public function updatedOtherAttachmentId()
    {
        $this->id_other = $this->other_attachment_id;
        $this->othersAttachmentModal = true;
    }

    public function deleteAttachment($curAtt)
    {
        $this->attachment_id = $curAtt;
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Delete attachement? This action cannot be undone',
            'icon'        => 'error',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'deleteAttachmentFinal',
                'params' => 'Saved',
            ],
            'reject' => [
                'label'  => 'No, cancel',
            ],
        ]);
    }

    public function deleteAttachmentFinal()
    {
        $deleted = false;
        if (isset($this->attachment_id)) {
            $deleted = Attachment::where('id',$this->attachment_id)->first()->delete();
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



    public function returnToView()
    {
        return redirect()->route('masterlist-data', $this->record->id);
    }

    public function mount()
    {
       $this->attachments = Attachment::get();
       $this->other_att = OtherAttachment::all();
    }
    public function render()
    {
        return view('livewire.forms.view-other-attachments',
        [
            'other_attachments' => $this->other_att,
        ]);
    }
}
