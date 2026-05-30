<?php

namespace App\Filament\Resources\FarmInventoryMovements;

use App\Filament\Resources\FarmInventoryMovements\Pages\CreateFarmInventoryMovement;
use App\Filament\Resources\FarmInventoryMovements\Pages\EditFarmInventoryMovement;
use App\Filament\Resources\FarmInventoryMovements\Pages\ListFarmInventoryMovements;
use App\Filament\Resources\FarmInventoryMovements\Schemas\FarmInventoryMovementForm;
use App\Filament\Resources\FarmInventoryMovements\Tables\FarmInventoryMovementsTable;
use App\Models\FarmInventoryMovement;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FarmInventoryMovementResource extends Resource
{
    protected static ?string $model = FarmInventoryMovement::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedArrowsRightLeft;

    protected static ?string $navigationLabel = 'Movs. inventario';

    protected static ?string $modelLabel = 'movimiento de inventario';

    protected static ?string $pluralModelLabel = 'movimientos de inventario';

    protected static string|UnitEnum|null $navigationGroup = 'Granja · inventario';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'occurred_on';

    public static function form(Schema $schema): Schema
    {
        return FarmInventoryMovementForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FarmInventoryMovementsTable::configure($table);
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
            'index' => ListFarmInventoryMovements::route('/'),
            'create' => CreateFarmInventoryMovement::route('/create'),
            'edit' => EditFarmInventoryMovement::route('/{record}/edit'),
        ];
    }
}
