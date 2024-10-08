<?php

namespace App\Filament\Resources;

use App\Filament\Resources\GoldBarProductsResource\Pages;
use App\Filament\Resources\GoldBarProductsResource\RelationManagers;
use App\Models\GoldBarsProducts;
use EightyNine\ExcelImport\ExcelImportAction;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Forms\Set;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Support\Str;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class GoldBarProductsResource extends Resource
{
    use Translatable;

    protected static ?string $model = GoldBarsProducts::class;

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';
    protected static ?string $navigationLabel = 'Products';
    protected static ?string $navigationParentItem = 'Gold Bars and Gold Coins';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug')
                            ->readOnly()
                            ->unique(ignoreRecord: true)
                            ->required(),
                        Select::make('gold_bars_id')
                            ->relationship('gold_bars', 'name')
                            ->columnSpan('full')
                            ->required(),
                        TextInput::make('price')
                            ->required(),
                        RichEditor::make('description')
                            ->columnSpan('full')
                    ])
                    ->columnSpan(2)
                    ->columns(2),
                Section::make()
                    ->schema([
                        FileUpload::make('thumbnail')
                            ->image()
                            ->reorderable()
                            ->multiple()
                            ->panelLayout('grid')
                            ->imageEditor()
                            ->directory('uploads/images/gold-bar-and-gold-coins/products')
                            ->required(),
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
                ImageColumn::make('thumbnail')
                    ->stacked()
                    ->limit(2)
                    ->limitedRemainingText(),
                TextColumn::make('name')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('gold_bars.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->searchable()
                    ->sortable(),
                ToggleColumn::make('status')
            ])
            ->filters([
                TernaryFilter::make('status'),
                SelectFilter::make('gold_bars_id')
                    ->label('Category')
                    ->relationship('gold_bars', 'name')
                    ->preload()
                    ->native(false)
                    ->searchable()
                    ->multiple(),
            ])
            ->actions([
                Tables\Actions\EditAction::make(),
                Tables\Actions\DeleteAction::make(),
            ])
            ->headerActions([
                ExportAction::make(),
            ])
            ->bulkActions([
                Tables\Actions\BulkActionGroup::make([
                    Tables\Actions\DeleteBulkAction::make(),
                ]),
                ExportBulkAction::make()
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
            'index' => Pages\ListGoldBarProducts::route('/'),
            'create' => Pages\CreateGoldBarProducts::route('/create'),
            'edit' => Pages\EditGoldBarProducts::route('/{record}/edit'),
        ];
    }
}
