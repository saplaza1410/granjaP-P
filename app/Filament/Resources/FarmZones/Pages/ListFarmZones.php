<?php

namespace App\Filament\Resources\FarmZones\Pages;

use App\Filament\Resources\FarmZones\FarmZoneResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFarmZones extends ListRecords
{
    protected static string $resource = FarmZoneResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
