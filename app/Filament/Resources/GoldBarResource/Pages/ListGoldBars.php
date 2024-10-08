<?php

namespace App\Filament\Resources\GoldBarResource\Pages;

use App\Filament\Resources\GoldBarResource;
use Filament\Actions;
use Filament\Resources\Pages\ListRecords;

class ListGoldBars extends ListRecords
{
    use ListRecords\Concerns\Translatable;
    protected static string $resource = GoldBarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make()->label("New Category"),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
