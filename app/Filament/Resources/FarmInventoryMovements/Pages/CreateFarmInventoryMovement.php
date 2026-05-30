<?php

namespace App\Filament\Resources\FarmInventoryMovements\Pages;

use App\Filament\Resources\FarmInventoryMovements\FarmInventoryMovementResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFarmInventoryMovement extends CreateRecord
{
    protected static string $resource = FarmInventoryMovementResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
