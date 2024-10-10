<?php

namespace App\Filament\Resources;

use App\Filament\Resources\WeddingProductResource\Pages;
use App\Filament\Resources\WeddingProductResource\RelationManagers;
use App\Models\WeddingProduct;
use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
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
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use Illuminate\Support\Str;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class WeddingProductResource extends Resource
{
    use Translatable;

    protected static ?string $model = WeddingProduct::class;

    protected static ?string $modelLabel = 'Products';
    protected static ?string $navigationParentItem = 'Wedding Occasions';

    protected static ?string $navigationIcon = 'heroicon-o-rectangle-stack';

    public static function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Product name')
                            ->live(onBlur: true)
                            ->afterStateUpdated(fn(Set $set, ?string $state) => $set('slug', Str::slug($state)))
                            ->required(),
                        TextInput::make('slug')
                            ->unique(ignoreRecord: true),
                        Select::make('wedding_occasion_id')
                            ->label('Wedding occasion')
                            ->relationship('wedding_occasion', 'name')
                            ->preload()
                            ->native(false)
                            ->searchable()
                            ->required(),
                        TextInput::make('price')
                            ->numeric()
                            ->required(),
                        Richeditor::make('description')
                            ->columnSpan('full'),
                        TextInput::make('sale_price')
                            ->hidden()
                            ->numeric(),
                    ])
                    ->columnSpan(2)
                    ->columns(2),
                Section::make()
                    ->schema([
                        FileUpload::make('image')
                            ->panelLayout('grid')
                            ->label('Product images')
                            ->image()
                            ->imageEditor()
                            ->reorderable()
                            ->multiple()
                            ->directory('uploads/images/wedding_occasions/products'),
                        Toggle::make('status')
                            ->default(true)
                    ])->columnSpan(1)
            ])->columns(3);
    }

    public static function table(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('wedding_occasion.name')
                    ->label('Category')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('price')
                    ->searchable()->
                    sortable(),
                ImageColumn::make('image')
                    ->stacked()
                    ->limit(2)
                    ->limitedRemainingText(),
                ToggleColumn::make('status'),
                TextColumn::make('created_at')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->actions([
                EditAction::make(),
                DeleteAction::make(),
            ])
            ->headerActions([
                ExportAction::make()
            ])
            ->bulkActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
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
            'index' => Pages\ListWeddingProducts::route('/'),
            'create' => Pages\CreateWeddingProduct::route('/create'),
            'edit' => Pages\EditWeddingProduct::route('/{record}/edit'),
        ];
    }
}
