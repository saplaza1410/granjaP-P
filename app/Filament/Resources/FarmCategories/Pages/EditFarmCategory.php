<?php

namespace App\Filament\Resources\FarmCategories\Pages;

use App\Filament\Resources\FarmCategories\FarmCategoryResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFarmCategory extends EditRecord
{
    protected static string $resource = FarmCategoryResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
