<?php

namespace App\Filament\Resources\CollectionResource\RelationManagers;

use Filament\Forms;
use Filament\Forms\Components\FileUpload;
use Filament\Forms\Components\MarkdownEditor;
use Filament\Forms\Components\Section;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Forms\Form;
use Filament\Resources\RelationManagers\RelationManager;
use Filament\Tables;
use Filament\Tables\Columns\CheckboxColumn;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\SoftDeletingScope;

class ProductsRelationManager extends RelationManager
{
    protected static string $relationship = 'products';


    public function form(Form $form): Form
    {
        return $form
            ->schema([
                Section::make()
                    ->schema([
                        TextInput::make('name')
                            ->label('Product name')
                            ->required(),
                        TextInput::make('slug')
                            ->unique(ignoreRecord: true),
                        Select::make('brand_id')
                            ->label('Brands')
                            ->relationship('brand', 'name')
                            ->preload()
                            ->native(false)
                            ->searchable(),
                        Select::make('wedding_occasion_id')
                            ->label('Wedding occasions')
                            ->relationship('wedding_occasion', 'name')
                            ->preload()
                            ->native(false)
                            ->searchable(),
                        MarkdownEditor::make('description')
                            ->columnSpan('full'),
                        TextInput::make('price')
                            ->numeric()
                            ->required(),
                        TextInput::make('sale_price')
                            ->numeric(),
                    ])
                    ->columnSpan(2)
                    ->columns(2),
                Section::make()->schema([
                    FileUpload::make('image')
                        ->image()
                        ->label('Product image')
                        ->directory('uploads/products'),
                    FileUpload::make('gallery_images')
                        ->label('Product gallery images')
                        ->image()
                        ->multiple()
                        ->directory('uploads/products'),
                    Toggle::make('status')
                ])->columnSpan(1)
            ])->columns(3);
    }

    public function table(Table $table): Table
    {
        return $table
            ->recordTitleAttribute('name')
            ->columns([
                ImageColumn::make('image'),
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
                ImageColumn::make('colleagues.gallery_images')
                    ->stacked(),
                CheckboxColumn::make('status'),
                TextColumn::make('created_at')
                    ->date()
                    ->sortable(),
            ])
            ->filters([
                //
            ])
            ->headerActions([
                Tables\Actions\CreateAction::make(),
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
}