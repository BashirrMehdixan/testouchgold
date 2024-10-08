<?php

namespace App\Filament\Resources\GoldBarResource\Pages;

use App\Filament\Resources\GoldBarResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateGoldBar extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = GoldBarResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make()
        ];
    }
}
