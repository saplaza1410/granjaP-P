<?php

namespace App\Filament\Resources\FarmInventoryItems\Pages;

use App\Filament\Resources\FarmInventoryItems\FarmInventoryItemResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFarmInventoryItem extends EditRecord
{
    protected static string $resource = FarmInventoryItemResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
