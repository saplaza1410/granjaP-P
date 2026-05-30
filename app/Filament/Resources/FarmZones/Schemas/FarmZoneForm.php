<?php

namespace App\Filament\Resources\FarmZones\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FarmZoneForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                TextInput::make('name')
                    ->label('Nombre')
                    ->required()
                    ->maxLength(255),
                TextInput::make('slug')
                    ->label('Slug')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Textarea::make('polygon_points')
                    ->label('Puntos SVG (opcional)')
                    ->placeholder('Ej. 12,175 60,175 …')
                    ->columnSpanFull(),
                TextInput::make('color_hex')
                    ->label('Color (#hex)')
                    ->maxLength(9)
                    ->placeholder('#3d9e6b'),
                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label('Orden')
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Activa')
                    ->default(true),
            ]);
    }
}
