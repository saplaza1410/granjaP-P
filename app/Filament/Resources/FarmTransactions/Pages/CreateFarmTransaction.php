<?php

namespace App\Filament\Resources\FarmTransactions\Pages;

use App\Filament\Resources\FarmTransactions\FarmTransactionResource;
use Filament\Resources\Pages\CreateRecord;

class CreateFarmTransaction extends CreateRecord
{
    protected static string $resource = FarmTransactionResource::class;

    protected function mutateFormDataBeforeCreate(array $data): array
    {
        $data['user_id'] = auth()->id();

        return $data;
    }
}
