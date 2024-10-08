<?php

namespace App\Filament\Resources\GoldBarProductsResource\Pages;

use App\Filament\Resources\GoldBarProductsResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGoldBarProducts extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = GoldBarProductsResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
