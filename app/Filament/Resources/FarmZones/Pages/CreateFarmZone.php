<?php

namespace App\Filament\Resources\FarmZones\Pages;

use App\Filament\Resources\FarmZones\FarmZoneResource;
use Filament\Resources\Pages\CreateRecord;
use Illuminate\Support\Str;

class CreateFarmZone extends CreateRecord
{
    protected static string $resource = FarmZoneResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        if (filled($data['name'] ?? null) && blank($data['slug'] ?? null)) {
            $data['slug'] = Str::slug((string) $data['name']);
        }

        return $data;
    }
}
