<?php

namespace App\Filament\Resources\ProductResource\Pages;

use App\Filament\Resources\ProductResource;
use Filament\Resources\Pages\ListRecords\Tab;
use Filament\Tables\Columns\TextColumn;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Collection;
use Filament\Actions\CreateAction;
use Filament\Actions\LocaleSwitcher;
use Filament\Resources\Pages\ListRecords;
use Filament\Resources\Pages\ListRecords\Concerns\Translatable;

class ListProducts extends ListRecords
{
    use Translatable;

    protected static string $resource = ProductResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
            LocaleSwitcher::make()
        ];
    }

    public function getTabs(): array
    {
        $tabs = [
            'all' => Tab::make('All Collections')
        ];
        foreach (Collection::all() as $collection) {
            $tabs[$collection->name] = Tab::make($collection->name)
                ->modifyQueryUsing(fn(Builder $query) => $query->whereHas('collection', fn($q) => $q->where('id', $collection->id)));
        }
        return $tabs;
    }
}
