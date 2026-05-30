<?php

namespace App\Filament\Resources\FarmTransactions;

use App\Filament\Resources\FarmTransactions\Pages\CreateFarmTransaction;
use App\Filament\Resources\FarmTransactions\Pages\EditFarmTransaction;
use App\Filament\Resources\FarmTransactions\Pages\ListFarmTransactions;
use App\Filament\Resources\FarmTransactions\Schemas\FarmTransactionForm;
use App\Filament\Resources\FarmTransactions\Tables\FarmTransactionsTable;
use App\Models\FarmTransaction;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FarmTransactionResource extends Resource
{
    protected static ?string $model = FarmTransaction::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedBanknotes;

    protected static ?string $navigationLabel = 'Movimientos';

    protected static ?string $modelLabel = 'movimiento';

    protected static ?string $pluralModelLabel = 'movimientos';

    protected static string|UnitEnum|null $navigationGroup = 'Granja · contabilidad';

    protected static ?int $navigationSort = 3;

    protected static ?string $recordTitleAttribute = 'occurred_on';

    public static function form(Schema $schema): Schema
    {
        return FarmTransactionForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FarmTransactionsTable::configure($table);
    }

    public static function getRelations(): array
    {
        return [
            //
        ];
    }

    public static function getPages(): array
    {
        return [
            'index' => ListFarmTransactions::route('/'),
            'create' => CreateFarmTransaction::route('/create'),
            'edit' => EditFarmTransaction::route('/{record}/edit'),
        ];
    }
}
