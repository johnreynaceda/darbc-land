<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;
use Filament\Tables;
use Filament\Forms;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use App\Models\User;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Filament\Tables\Actions\Action;
use Filament\Tables\Actions\EditAction;
use Illuminate\Support\Facades\Hash;
use WireUi\Traits\Actions;
use DB;

class ManageUsers extends Component implements Tables\Contracts\HasTable
{
    use Tables\Concerns\InteractsWithTable;
    use Actions;

    public $addUser = false;
    public $name;
    public $address;

    protected function getTableQuery(): Builder
    {
        return User::query();
    }

    protected function getTableHeaderActions(): array
    {
        return [
            Action::make('new_user')
            ->button()
            ->label('Add New User')
            ->action(function (array $data): void {
                if($data['password'] === $data['confirm_password'])
                {
                    User::create([
                        'name' => $data['name'],
                        'email' => $data['email'],
                        'password' => Hash::make($data['password'])
                        // 'last_name' => $data['last_name'],
                        // 'address' => $data['address'],
                    ]);
                    $this->dialog()->success(
                        $title = 'Success',
                        $description = 'User successfully saved'
                    );
                }else{
                    $this->dialog()->error(
                        $title = 'Password did not match',
                        $description = 'Make sure to match passwords to save the user'
                    );
                }

            })
            ->form([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
                Forms\Components\TextInput::make('password')->password()->required(),
                Forms\Components\TextInput::make('confirm_password')->password()->required(),
            ]),
        ];
    }

    protected function getTableActions(): array
    {
        return [
            Action::make('change_password')
            ->label('Change Password')
            ->button()
            ->icon('heroicon-o-lock-closed')
            ->color('danger')
            ->action(function (User $record, array $data): void {
                if(Hash::check($data['old_password'], $record->password))
                {
                    if($data['new_password'] === $data['confirm_password'])
                    {
                        $record->password = Hash::make($data['new_password']);
                        $record->save();

                        $this->dialog()->success(
                            $title = 'Success',
                            $description = 'Password successfully changed'
                        );
                    }else{
                        $this->dialog()->error(
                            $title = 'Password did not match',
                            $description = 'Make sure to match passwords'
                        );
                    }

                }else{
                    $this->dialog()->error(
                        $title = 'Old Password is incorrect',
                        $description = 'Make sure to type your old password'
                    );
                }
            })
            ->form([
                Forms\Components\TextInput::make('old_password')->password()->required(),
                Forms\Components\TextInput::make('new_password')->password()->required(),
                Forms\Components\TextInput::make('confirm_password')->password()->required(),
            ])->requiresConfirmation()->visible(fn ($record) => $record->id === auth()->user()->id),
            EditAction::make('edit')
            ->label('Edit Details')
            ->button()
            ->color('success')
            ->mountUsing(fn (Forms\ComponentContainer $form, User $record) => $form->fill([
                'name' => $record->name,
                'email' => $record->email,
            ]))
            ->action(function (User $record, array $data): void {
                 $record->name = $data['name'];
                 $record->email = $data['email'];

                $this->dialog()->success(
                    $title = 'Success',
                    $description = 'Data successfully updated'
                );

                $record->save();
            })
            ->form([
                Forms\Components\TextInput::make('name')->required(),
                Forms\Components\TextInput::make('email')->email()->required(),
            ])
            ->requiresConfirmation()
        ];
    }

    protected function getTableColumns(): array
    {
        return [
            TextColumn::make('name')
            ->label('NAME')
            ->searchable()
            ->sortable(),
            TextColumn::make('email')
            ->label('EMAIL')
            ->searchable()
            ->sortable(),
        ];
    }

    public function save()
    {
        // $this->validate([
        //     'name' => 'required',
        //     'address' => 'required',
        // ]);

        // DB::beginTransaction();
        // HospitalModel::create([
        //     'name' => $this->name,
        //     'address' => $this->address,
        // ]);
        // DB::commit();

        // $this->dialog()->success(
        //     $title = 'Success',
        //     $description = 'Data successfully saved'
        // );
        // $this->addHospital = false;
        // $this->reset([ 'name', 'address']);
    }


    public function render()
    {
        return view('livewire.settings.manage-users');
    }
}
