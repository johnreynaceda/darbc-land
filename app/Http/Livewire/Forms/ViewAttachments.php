<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use App\Models\BasicInformation;
use App\Models\Attachment;
use Illuminate\Support\Facades\Storage;
use WireUi\Traits\Actions;

class ViewAttachments extends Component
{
    use Actions;
    public $record;
    public $type;

    public $attachments;
    public $basic_information;
    public $attachment_id;

    protected $listeners = ['refreshComponent' => '$refresh'];

    public function mount()
    {
        $this->attachments = Attachment::get();
        $this->basic_information = BasicInformation::where('id', $this->record->id)->first();
    }

    public function getFileUrl($filename)
    {
        return Storage::url($filename);
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

    public function render()
    {
        return view('livewire.forms.view-attachments',[
            'basicInfo' => $this->basic_information,
        ]);
    }
}
