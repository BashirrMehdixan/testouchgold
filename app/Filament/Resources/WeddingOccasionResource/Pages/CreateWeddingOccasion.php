<?php

namespace App\Filament\Resources\WeddingOccasionResource\Pages;

use App\Filament\Resources\WeddingOccasionResource;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateWeddingOccasion extends CreateRecord
{
    use Translatable;

    protected static string $resource = WeddingOccasionResource::class;

    public function getHeaderActions(): array
    {
        return [
//            LocaleSwitcher::make()
        ];
    }
}
