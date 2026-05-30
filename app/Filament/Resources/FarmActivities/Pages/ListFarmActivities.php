<?php

namespace App\Filament\Resources\FarmActivities\Pages;

use App\Filament\Resources\FarmActivities\FarmActivityResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFarmActivities extends ListRecords
{
    protected static string $resource = FarmActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
