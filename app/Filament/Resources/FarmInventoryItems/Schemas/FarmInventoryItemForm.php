<?php

namespace App\Filament\Resources\FarmInventoryItems\Schemas;

use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FarmInventoryItemForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required(),
                TextInput::make('sku')
                    ->label('SKU / código')
                    ->maxLength(191),
                TextInput::make('unit')
                    ->label('Unidad')
                    ->default('kg')
                    ->required()
                    ->maxLength(24),
                Select::make('farm_activity_id')
                    ->label('Actividad (opcional)')
                    ->relationship(
                        name: 'activity',
                        titleAttribute: 'name',
                        modifyQueryUsing: fn ($q) => $q->where('is_active', true)->orderBy('sort_order'),
                    )
                    ->searchable()
                    ->preload(),
                TextInput::make('reorder_level')
                    ->label('Nivel de reorden')
                    ->numeric(),
                Textarea::make('notes')
                    ->label('Notas')
                    ->columnSpanFull(),
                Toggle::make('is_active')
                    ->label('Activo')
                    ->default(true),
            ]);
    }
}
