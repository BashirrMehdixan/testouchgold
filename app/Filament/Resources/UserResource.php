<?php

namespace App\Filament\Resources;

use App\Filament\Resources\UserResource\Pages;
use App\Filament\Resources\UserResource\RelationManagers;
use App\Models\User;
use Filament\Forms;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class UserResource extends Resource
{
    protected static ?string $model = User::class;
    protected static ?string $navigationIcon = 'heroicon-o-users';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('firstname'),
                        TextInput::make('lastname'),
                        TextInput::make('name')
                            ->label('Username')
                            ->unique(ignoreRecord: true)
                            ->required(),
                        TextInput::make('email')
                            ->unique(ignoreRecord: true)
                            ->required(),
                        DatePicker::make('birthday')
                            ->native(false),
                        Select::make('gender')
                            ->options([
                                "male" => "Male",
                                "female" => "Female",
                            ]),
                        Select::make('role_id')
                            ->label('Role')
                            ->options([
                                "0" => "Super Admin",
                                "1" => "Admin",
                                "2" => "User",
                            ])
                        ->default(2),
                        TextInput::make('password')
                            ->password()
                            ->hiddenOn('edit')
                            ->required()
                    ])
                    ->columnSpan(2)
                    ->columns(2),
                Section::make()
                    ->schema([
                        FileUpload::make('avatar')
                            ->image()
                            ->imageEditor()
                            ->directory(fn() => 'uploads/users/'),
                        Toggle::make('status')
                        ->default(true)
                    ])
                    ->columnSpan(1)
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                ImageColumn::make('avatar'),
                TextColumn::make('firstname'),
                TextColumn::make('lastname'),
                TextColumn::make('name')
                    ->label('Username'),
                TextColumn::make('email'),
                TextColumn::make('role_id')
                    ->label('Role')
                    ->formatStateUsing(function ($state) {
                        return $state == 0 ? 'Super admin' : ($state == 1 ? 'Admin' : 'User');
                    }),
                ToggleColumn::make('status')
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
            ]);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListUsers::route('/'),
            'create' => Pages\CreateUser::route('/create'),
            'edit' => Pages\EditUser::route('/{record}/edit'),
        ];
    }
}
