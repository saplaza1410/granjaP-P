<?php

namespace App\Filament\Resources\FarmCategories\Pages;

use App\Filament\Resources\FarmCategories\FarmCategoryResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFarmCategories extends ListRecords
{
    protected static string $resource = FarmCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
