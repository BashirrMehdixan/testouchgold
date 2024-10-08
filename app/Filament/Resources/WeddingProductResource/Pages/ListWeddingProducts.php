<?php

namespace App\Filament\Resources\WeddingProductResource\Pages;

use App\Filament\Resources\WeddingProductResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListWeddingProducts extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = WeddingProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label('New Product'),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
