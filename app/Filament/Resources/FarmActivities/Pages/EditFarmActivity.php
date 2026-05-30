<?php

namespace App\Filament\Resources\FarmActivities\Pages;

use App\Filament\Resources\FarmActivities\FarmActivityResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFarmActivity extends EditRecord
{
    protected static string $resource = FarmActivityResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
