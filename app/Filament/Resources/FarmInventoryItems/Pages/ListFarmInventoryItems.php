<?php

namespace App\Filament\Resources\FarmInventoryItems\Pages;

use App\Filament\Resources\FarmInventoryItems\FarmInventoryItemResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFarmInventoryItems extends ListRecords
{
    protected static string $resource = FarmInventoryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
