<?php

namespace App\Filament\Resources\FarmInventoryItems;

use App\Filament\Resources\FarmInventoryItems\Pages\CreateFarmInventoryItem;
use App\Filament\Resources\FarmInventoryItems\Pages\EditFarmInventoryItem;
use App\Filament\Resources\FarmInventoryItems\Pages\ListFarmInventoryItems;
use App\Filament\Resources\FarmInventoryItems\Schemas\FarmInventoryItemForm;
use App\Filament\Resources\FarmInventoryItems\Tables\FarmInventoryItemsTable;
use App\Models\FarmInventoryItem;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FarmInventoryItemResource extends Resource
{
    protected static ?string $model = FarmInventoryItem::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedCube;

    protected static ?string $navigationLabel = 'Artículos inventario';

    protected static ?string $modelLabel = 'artículo';

    protected static ?string $pluralModelLabel = 'artículos de inventario';

    protected static string|UnitEnum|null $navigationGroup = 'Granja · inventario';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return FarmInventoryItemForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FarmInventoryItemsTable::configure($table);
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
            'index' => ListFarmInventoryItems::route('/'),
            'create' => CreateFarmInventoryItem::route('/create'),
            'edit' => EditFarmInventoryItem::route('/{record}/edit'),
        ];
    }
}
