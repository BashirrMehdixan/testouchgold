<?php

namespace App\Filament\Resources;

use App\Filament\Resources\CollectionResource\RelationManagers\ProductsRelationManager;
use App\Filament\Resources\ProductResource\Pages;
use App\Filament\Resources\ProductResource\RelationManagers;
use App\Models\Product;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\RichEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Set;
use Filament\Tables\Actions\BulkActionGroup;
use Filament\Tables\Actions\DeleteAction;
use Filament\Tables\Actions\DeleteBulkAction;
use Filament\Tables\Actions\EditAction;
use Filament\Tables\Columns\ToggleColumn;
use Filament\Tables\Filters\TernaryFilter;
use Illuminate\Support\Str;
use Filament\Forms\Form;
use Filament\Resources\Concerns\Translatable;
use Filament\Resources\Resource;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;
use pxlrbt\FilamentExcel\Actions\Tables\ExportAction;
use pxlrbt\FilamentExcel\Actions\Tables\ExportBulkAction;

class ProductResource extends Resource
{
    use Translatable;

    protected static ?string $model = Product::class;

    protected static ?string $navigationLabel = 'Products';

    protected static ?string $navigationParentItem = "Collections";

    protected static ?string $navigationIcon = 'heroicon-o-chart-pie';

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
                        Select::make('collection_id')
                            ->label('Collections')
                            ->relationship('collection', 'name')
                            ->preload()
                            ->native(false)
                            ->searchable()
                            ->required(),
                        TextInput::make('price')
                            ->numeric()
                            ->required(),
                        Select::make('brand_id')
                            ->label('Brands')
                            ->relationship('brand', 'name')
                            ->hidden()
                            ->preload()
                            ->native(false)
                            ->searchable(),
                        Richeditor::make('description')
                            ->columnSpan('full'),

                        TextInput::make('sale_price')
                            ->hidden()
                            ->numeric(),
                    ])
                    ->columnSpan(2)
                    ->columns(2),
                Section::make()->schema([
                    FileUpload::make('image')
                        ->panelLayout('grid')
                        ->label('Product images')
                        ->image()
                        ->reorderable()
                        ->imageEditor()
                        ->multiple()
                        ->directory('uploads/images/products'),
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
                TextColumn::make('collection.name')
                    ->label('Collection')
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
                TernaryFilter::make('status'),
                SelectFilter::make('collection_id')
                    ->label('Collections')
                    ->relationship('collection', 'name')
                    ->preload()
                    ->native(false)
                    ->searchable()
                    ->multiple(),
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
            ProductsRelationManager::class,
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => Pages\ListProducts::route('/'),
            'create' => Pages\CreateProduct::route('/create'),
            'edit' => Pages\EditProduct::route('/{record}/edit'),
        ];
    }
}
