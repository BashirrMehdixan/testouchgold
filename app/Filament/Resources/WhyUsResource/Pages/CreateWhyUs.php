<?php

namespace App\Filament\Resources\WhyUsResource\Pages;

use App\Filament\Resources\WhyUsResource;
use Filament\Actions;
use Filament\Resources\Pages\CreateRecord;

class CreateWhyUs extends CreateRecord
{
    use CreateRecord\Concerns\Translatable;

    protected static string $resource = WhyUsResource::class;

    public function getHeaderActions(): array
    {
        return [
            Actions\LocaleSwitcher::make(),
        ];
    }
}
