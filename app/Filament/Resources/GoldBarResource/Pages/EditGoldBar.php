<?php

namespace App\Filament\Resources\GoldBarResource\Pages;

use App\Filament\Resources\GoldBarResource;
use Filament\Actions;
use Filament\Resources\Pages\EditRecord;

class EditGoldBar extends EditRecord
{
    use EditRecord\Concerns\Translatable;

    protected static string $resource = GoldBarResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\DeleteAction::make(),
            Actions\LocaleSwitcher::make(),
        ];
    }
}
