<?php

namespace App\Http\Livewire\Forms;

use Livewire\Component;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use App\Models\Tax;
use App\Models\TaxReceiptImage;
use WireUi\Traits\Actions;
use DB;

class UploadTaxReceipt extends Component implements Forms\Contracts\HasForms
{
    use Forms\Concerns\InteractsWithForms;
    use Actions;
    public $tax_id;
    public $tax;
    public $attachment = [];

    protected function getFormSchema(): array
    {
        return [
            FileUpload::make('attachment')
                        ->enableOpen()
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
            $receiptImage = TaxReceiptImage::create([
                'tax_id' => $this->tax_id,
                'image_path'=> $file->storeAs('public',now()->format("HismdY-").$file->getClientOriginalName()),
            ]);
        }
        DB::commit();

        $this->dialog()->success(
            $title = 'Success',
            $description = 'Attachment has been added'
        );
        $this->reset();
        $this->emit('close_tax_receipt_modal');
    }

    public function mount()
    {
        $this->tax = Tax::find($this->tax_id);
    }
    public function render()
    {
        return view('livewire.forms.upload-tax-receipt');
    }
}
