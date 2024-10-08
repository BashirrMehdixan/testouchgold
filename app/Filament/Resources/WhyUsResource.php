<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WhyUsResource\Pages;
use App\Filament\Resources\WhyUsResource\RelationManagers;
use App\Models\WhyUs;
use Filament\Forms;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use TomatoPHP\FilamentIcons\Components\IconPicker;

class WhyUsResource extends Resource
{
    use Translatable;

    protected static ?string $model = WhyUs::class;
    protected static ?string $navigationLabel = 'Why Us';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('title')
                            ->required(),
                        IconPicker::make('thumbnail')
                            ->default('heroicon-o-academic-cap')
                            ->label('Icon'),
                        RichEditor::make('description')
                            ->columnSpan('full')
                            ->required(),
                        Toggle::make('status')
                            ->default(true)
                    ])->columns(2),
            ]);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([

                TextColumn::make('title')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('description'),
                ToggleColumn::make('status')
                    ->searchable()
            ])
            ->filters([
                //
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
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
            'index' => Pages\ListWhyUs::route('/'),
            'create' => Pages\CreateWhyUs::route('/create'),
            'edit' => Pages\EditWhyUs::route('/{record}/edit'),
        ];
    }
}
