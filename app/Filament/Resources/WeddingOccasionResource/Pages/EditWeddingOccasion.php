<?php

namespace App\Filament\Resources\WeddingOccasionResource\Pages;

use App\Filament\Resources\WeddingOccasionResource;
use Filament\Actions\DeleteAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\EditRecord;
use Filament\Resources\Pages\EditRecord\Concerns\Translatable;

class EditWeddingOccasion extends EditRecord
{
    protected static string $resource = WeddingOccasionResource::class;
    use Translatable;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
            LocaleSwitcher::make()
        ];
    }
}
