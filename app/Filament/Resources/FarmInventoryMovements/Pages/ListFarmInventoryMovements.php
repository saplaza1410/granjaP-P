<?php

namespace App\Filament\Resources\FarmInventoryMovements\Pages;

use App\Filament\Resources\FarmInventoryMovements\FarmInventoryMovementResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFarmInventoryMovements extends ListRecords
{
    protected static string $resource = FarmInventoryMovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
