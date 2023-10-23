<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Filament\Tables;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Models\Status;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Illuminate\Support\Facades\Hash;
use WireUi\Traits\Actions;
use DB;
use Filament\Tables\Actions\CreateAction;
use Filament\Tables\Actions\DeleteAction;

class ManageStatus extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;

    protected function getTableQuery(): Builder
    {
        return Status::query();
    }

    protected function getTableHeaderActions(): array
    {
        return [
            CreateAction::make('add_status')
            ->label('Add Status')
            ->button()
            ->form([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required()
            ])
            ->after(function () {
                $this->dialog()->success(
                    $title = 'Success',
                    $description = 'Status successfully saved'
                );
            })
            ->disableCreateAnother()
            ->modalHeading('Add Status')
            ->modalButton('Save')
            ->requiresConfirmation()
        ];
    }

    protected function getTableActions(): array
    {
        return [
            EditAction::make('edit_status')
            ->label('Edit Status')
            ->modalButton('Update')
            ->button()
            ->color('success')
            ->after(function () {
                $this->dialog()->success(
                    $title = 'Success',
                    $description = 'Status successfully updated'
                );
            })
            ->form([
                Forms\Components\TextInput::make('name')
                ->label('Name')
                ->required()
            ])
            ->requiresConfirmation(),
            DeleteAction::make('delete_status')
            ->button()
            ->color('danger')
            ->action(fn (Status $record) => $record->delete())
            ->visible(fn ($record) => $record->basic_informations()->count() == 0)
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
        return view('livewire.settings.manage-status');
    }
}
