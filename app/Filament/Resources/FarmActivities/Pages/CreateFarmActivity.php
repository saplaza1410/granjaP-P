<?php

namespace App\Filament\Resources\FarmActivities\Pages;

use App\Filament\Resources\FarmActivities\FarmActivityResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateFarmActivity extends CreateRecord
{
    protected static string $resource = FarmActivityResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (filled($data['name'] ?? null) && blank($data['slug'] ?? null)) {
            $data['slug'] = Str::slug((string) $data['name']);
        }

        return $data;
    }
}
