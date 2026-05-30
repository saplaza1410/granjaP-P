<?php

namespace App\Filament\Resources\FarmZones;

use App\Filament\Resources\FarmZones\Pages\CreateFarmZone;
use App\Filament\Resources\FarmZones\Pages\EditFarmZone;
use App\Filament\Resources\FarmZones\Pages\ListFarmZones;
use App\Filament\Resources\FarmZones\Schemas\FarmZoneForm;
use App\Filament\Resources\FarmZones\Tables\FarmZonesTable;
use App\Models\FarmZone;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FarmZoneResource extends Resource
{
    protected static ?string $model = FarmZone::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMap;

    protected static ?string $navigationLabel = 'Zonas del plano';

    protected static ?string $modelLabel = 'zona';

    protected static ?string $pluralModelLabel = 'zonas';

    protected static string|UnitEnum|null $navigationGroup = 'Granja · parcelas y plano';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return FarmZoneForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FarmZonesTable::configure($table);
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
            'index' => ListFarmZones::route('/'),
            'create' => CreateFarmZone::route('/create'),
            'edit' => EditFarmZone::route('/{record}/edit'),
        ];
    }
}
