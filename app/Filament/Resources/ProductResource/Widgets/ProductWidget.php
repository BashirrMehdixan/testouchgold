<?php

namespace App\Filament\Resources\ProductResource\Widgets;

use Filament\Tables;
use Filament\Tables\Columns\ImageColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class ProductWidget extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
            // ...
            )
            ->columns([
                ImageColumn::make('image'),
                TextColumn::make('name'),
                TextColumn::make('collection.name'),
                TextColumn::make('price'),
            ]);
    }
}
