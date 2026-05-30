<?php

namespace App\Filament\Resources\FarmCategories\Schemas;

use App\Enums\FarmLedgerType;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FarmCategoryForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                Select::make('type')
                    ->label('Tipo')
                    ->options(FarmLedgerType::options())
                    ->required()
                    ->native(false),
                Select::make('farm_activity_id')
                    ->label('Actividad asociada')
                    ->relationship(
                        name: 'activity',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn ($query) => $query->where('is_active', true)->orderBy('sort_order'),
                    )
                    ->searchable()
                    ->preload()
                    ->placeholder('General / varias actividades'),
                Toggle::make('is_active')
                    ->label('Activa')
                    ->default(true),
            ]);
    }
}
