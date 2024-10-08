<?php

namespace App\Filament\Resources\WeddingProductResource\Pages;

use App\Filament\Resources\WeddingProductResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditWeddingProduct extends EditRecord
{
    use EditRecord\Concerns\Translatable;
    protected static string $resource = WeddingProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
