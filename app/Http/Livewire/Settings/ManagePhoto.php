<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Filament\Tables;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Models\MapImage;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ImageColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\DeleteAction;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Livewire\WithFileUploads;
use WireUi\Traits\Actions;
use DB;

class ManagePhoto extends Component implements Tables\Contracts\HasTable
{
    use WithFileUploads;
    use Tables\Concerns\InteractsWithTable;
    use Actions;

    public $map_image = [];

    protected function getTableQuery(): Builder
    {
        return MapImage::query();
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Action::make('upload_new')
            ->button()
            ->label('Upload New Image')
            ->action(function (array $data): void {





                DB::beginTransaction();
                MapImage::create([
                    'path'=> $data['map_image'],
                    'document_name' => $data['map_image'],
                ]);

                //'document_name' => $data['file'],
                DB::commit();

                $this->dialog()->success(
                    $title = 'Success',
                    $description = 'Photo has been added'
                );
            })
            ->form([
                Forms\Components\FileUpload::make('map_image')
                ->enableOpen()
                ->image()
                ->preserveFilenames()
                ->required()
                ->reactive()
            ])->visible(function () {
                if(MapImage::get()->count() === 0)
                {
                    return true;
                }else{
                    return false;
                }
            }),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('change_photo')
            ->label('Update Photo')
            ->button()
            ->icon('heroicon-o-pencil')
            ->color('success')
            ->action(function (MapImage $record, array $data): void {
                $record->path = $data['map_photo'];
                $record->document_name = $data['map_photo'];
                $record->save();

                $this->dialog()->success(
                 $title = 'Success',
                 $description = 'Photo successfully changed'
                 );
            })
            ->form([
                Forms\Components\FileUpload::make('map_photo')
                ->enableOpen()
                ->image()
                ->disk('public')
                ->preserveFilenames()
                ->required()
                ->reactive()

            ]),
            Action::make('delete')
            ->button()
            ->icon('heroicon-o-trash')
            ->color('danger')
            ->modalHeading('Delete Photo')
            ->modalSubheading('Are you sure you\'d like to delete these photo? This cannot be undone.')
            ->modalButton('Yes, delete.')
            ->action(function (MapImage $record, array $data): void {
                $record->delete();
                $this->dialog()->success(
                 $title = 'Success',
                 $description = 'Photo successfully deleted'
                 );
                 redirect()->route('settings');
            })
            ->requiresConfirmation()
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('document_name')
            ->label('DOCUMENT NAME')
            ->searchable()
            ->sortable(),
            ImageColumn::make('path')
            ->label('Photo')
            ->size(100),
        ];
    }

    public function render()
    {
        return view('livewire.settings.manage-photo');
    }
}
