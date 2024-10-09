<?php

namespace App\Filament\Resources;

use App\Filament\Resources\AboutResource\Pages;
use App\Filament\Resources\AboutResource\RelationManagers;
use App\Models\About;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\Layout\Stack;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Livewire\Attributes\Layout;

class AboutResource extends Resource
{
    use Translatable;

    protected static ?string $model = About::class;
    protected static ?string $navigationLabel = "About";
    protected static ?string $navigationGroup = "Settings";
    protected static ?string $navigationIcon = 'heroicon-o-information-circle';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        RichEditor::make('description')
                            ->required(),
                        RichEditor::make('content')
                            ->required(),
                    ])
                    ->columnSpan(2),
                Section::make()
                    ->schema([
                        FileUpload::make('image')
                            ->image()
                            ->imageEditor()
                            ->directory('uploads/about'),
                        FileUpload::make('logo')
                            ->image()
                            ->imageEditor()
                            ->directory('uploads/logos'),
                    ])
                    ->columnSpan(1),
            ])
            ->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                Stack::make([
                    TextColumn::make('title')
                        ->weight('bold')
                        ->columnSpan('full'),
                    TextColumn::make('description')
                        ->columnSpan('full'),
                ])
                    ->space(2)
                    ->visible()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListAbouts::route('/'),
            'create' => Pages\CreateAbout::route('/create'),
            'edit' => Pages\EditAbout::route('/{record}/edit'),
        ];
    }
}
