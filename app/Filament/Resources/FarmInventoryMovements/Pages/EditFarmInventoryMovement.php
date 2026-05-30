<?php

namespace App\Filament\Resources\FarmInventoryMovements\Pages;

use App\Filament\Resources\FarmInventoryMovements\FarmInventoryMovementResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFarmInventoryMovement extends EditRecord
{
    protected static string $resource = FarmInventoryMovementResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
