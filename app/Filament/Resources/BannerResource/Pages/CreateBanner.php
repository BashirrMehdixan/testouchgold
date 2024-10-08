<?php

namespace App\Filament\Resources\BannerResource\Pages;

use App\Filament\Resources\BannerResource;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\CreateRecord;
use Filament\Resources\Pages\CreateRecord\Concerns\Translatable;

class CreateBanner extends CreateRecord
{
    use Translatable;

    protected static string $resource = BannerResource::class;

    public function getHeaderActions(): array
    {
        return [
            LocaleSwitcher::make()
        ];
    }
}
