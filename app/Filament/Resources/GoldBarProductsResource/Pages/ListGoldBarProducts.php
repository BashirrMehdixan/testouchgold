<?php

namespace App\Filament\Resources\GoldBarProductsResource\Pages;

use App\Filament\Resources\GoldBarProductsResource;
use App\Models\GoldBar;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGoldBarProducts extends ListRecords
{
    use ListRecords\Concerns\Translatable;

    protected static string $resource = GoldBarProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("New Product"),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
