<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Filament\Tables;
use Filament\Forms;
use WireUi\Traits\Actions;
use App\Models\OtherAttachment;
use App\Models\Attachment;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Actions\DeleteAction;
use DB;

class ManageOtherAttachments extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;

    protected function getTableQuery(): Builder
    {
        return OtherAttachment::query();
    }

    protected function getTableHeaderActions(): array
    {
        return [
            CreateAction::make('add_other_attachment')
            ->label('Add Other Attachment')
            ->button()
            ->form([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required()
            ])
            ->after(function () {
                $this->dialog()->success(
                    $title = 'Success',
                    $description = 'Other Attachment successfully saved'
                );
            })
            ->disableCreateAnother()
            ->modalHeading('Add Other Attachment')
            ->modalButton('Save')
            ->requiresConfirmation()
        ];
    }

    protected function getTableActions(): array
    {
        return [
            EditAction::make('edit_other_attachment')
            ->label('Edit Other Attachment')
            ->modalButton('Update')
            ->button()
            ->color('success')
            ->after(function () {
                $this->dialog()->success(
                    $title = 'Success',
                    $description = 'Other Attachment successfully updated'
                );
            })
            ->form([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required()
            ])
            ->requiresConfirmation(),
            DeleteAction::make('delete_other_attachment')
            ->button()
            ->color('danger')
            ->action(fn (OtherAttachment $record) => $record->delete())
            ->visible(function (OtherAttachment $record) {
                $attachment = Attachment::where('other_attachment_id', $record->id)->count();
                return $attachment === 0;
            })
            ->requiresConfirmation(),
        ];
    }


    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
            ->label('NAME')
            ->searchable()
            ->sortable(),
        ];
    }

    public function render()
    {
        return view('livewire.settings.manage-other-attachments');
    }
}
