<?php

namespace App\Filament\Resources\WeddingOccasionResource\Pages;

use App\Filament\Resources\WeddingOccasionResource;
use Filament\Actions\CreateAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListWeddingOccasions extends ListRecords
{
    use Translatable;

    protected static string $resource = WeddingOccasionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make()->label('New Category'),
            LocaleSwitcher::make()
        ];
    }
}
