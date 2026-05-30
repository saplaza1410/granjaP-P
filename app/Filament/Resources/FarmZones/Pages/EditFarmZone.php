<?php

namespace App\Filament\Resources\FarmZones\Pages;

use App\Filament\Resources\FarmZones\FarmZoneResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFarmZone extends EditRecord
{
    protected static string $resource = FarmZoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
