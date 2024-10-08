<?php

namespace App\Filament\Resources\WeddingProductResource\Pages;

use App\Filament\Resources\WeddingProductResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateWeddingProduct extends CreateRecord
{
    use Translatable;

    protected static string $resource = WeddingProductResource::class;

    public function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make()
        ];
    }
}
