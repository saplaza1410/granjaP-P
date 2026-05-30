<?php

namespace App\Filament\Resources\FarmTransactions\Pages;

use App\Filament\Resources\FarmTransactions\FarmTransactionResource;
use Filament\Actions\DeleteAction;
use Filament\Resources\Pages\EditRecord;

class EditFarmTransaction extends EditRecord
{
    protected static string $resource = FarmTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            DeleteAction::make(),
        ];
    }
}
