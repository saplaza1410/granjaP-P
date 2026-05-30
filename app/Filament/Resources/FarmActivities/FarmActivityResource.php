<?php

namespace App\Filament\Resources\FarmActivities;

use App\Filament\Resources\FarmActivities\Pages\CreateFarmActivity;
use App\Filament\Resources\FarmActivities\Pages\EditFarmActivity;
use App\Filament\Resources\FarmActivities\Pages\ListFarmActivities;
use App\Filament\Resources\FarmActivities\Schemas\FarmActivityForm;
use App\Filament\Resources\FarmActivities\Tables\FarmActivitiesTable;
use App\Models\FarmActivity;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FarmActivityResource extends Resource
{
    protected static ?string $model = FarmActivity::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedRectangleStack;

    protected static ?string $navigationLabel = 'Actividades';

    protected static ?string $modelLabel = 'actividad productiva';

    protected static ?string $pluralModelLabel = 'actividades productivas';

    protected static string|UnitEnum|null $navigationGroup = 'Granja · contabilidad';

    protected static ?int $navigationSort = 1;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return FarmActivityForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FarmActivitiesTable::configure($table);
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
            'index' => ListFarmActivities::route('/'),
            'create' => CreateFarmActivity::route('/create'),
            'edit' => EditFarmActivity::route('/{record}/edit'),
        ];
    }
}
