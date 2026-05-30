<?php

namespace App\Filament\Resources\FarmTransactions\Pages;

use App\Filament\Resources\FarmTransactions\FarmTransactionResource;
use Filament\Actions\CreateAction;
use Filament\Resources\Pages\ListRecords;

class ListFarmTransactions extends ListRecords
{
    protected static string $resource = FarmTransactionResource::class;

    protected function getHeaderActions(): array
    {
        return [
            CreateAction::make(),
        ];
    }
}
