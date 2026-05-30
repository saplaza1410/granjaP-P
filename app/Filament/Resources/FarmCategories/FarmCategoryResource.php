<?php

namespace App\Filament\Resources\FarmCategories;

use App\Filament\Resources\FarmCategories\Pages\CreateFarmCategory;
use App\Filament\Resources\FarmCategories\Pages\EditFarmCategory;
use App\Filament\Resources\FarmCategories\Pages\ListFarmCategories;
use App\Filament\Resources\FarmCategories\Schemas\FarmCategoryForm;
use App\Filament\Resources\FarmCategories\Tables\FarmCategoriesTable;
use App\Models\FarmCategory;
use BackedEnum;
use Filament\Resources\Resource;
use Filament\Schemas\Schema;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Table;
use UnitEnum;

class FarmCategoryResource extends Resource
{
    protected static ?string $model = FarmCategory::class;

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedTag;

    protected static ?string $navigationLabel = 'Categorías';

    protected static ?string $modelLabel = 'categoría';

    protected static ?string $pluralModelLabel = 'categorías (ingreso / gasto)';

    protected static string|UnitEnum|null $navigationGroup = 'Granja · contabilidad';

    protected static ?int $navigationSort = 2;

    protected static ?string $recordTitleAttribute = 'name';

    public static function form(Schema $schema): Schema
    {
        return FarmCategoryForm::configure($schema);
    }

    public static function table(Table $table): Table
    {
        return FarmCategoriesTable::configure($table);
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
            'index' => ListFarmCategories::route('/'),
            'create' => CreateFarmCategory::route('/create'),
            'edit' => EditFarmCategory::route('/{record}/edit'),
        ];
    }
}
