<?php

namespace App\Filament\Resources\GoldBarProductsResource\Pages;

use App\Filament\Resources\GoldBarProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGoldBarProducts extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = GoldBarProductsResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
