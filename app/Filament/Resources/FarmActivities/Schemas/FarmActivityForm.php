<?php

namespace App\Filament\Resources\FarmActivities\Schemas;

use Filament\Forms\Components\TextInput;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\Toggle;
use Filament\Schemas\Schema;

class FarmActivityForm
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
                    ->label('Identificador (slug)')
                    ->required()
                    ->maxLength(255)
                    ->unique(ignoreRecord: true),
                Textarea::make('description')
                    ->label('Descripción')
                    ->columnSpanFull(),
                TextInput::make('sort_order')
                    ->label('Orden')
                    ->required()
                    ->numeric()
                    ->default(0),
                Toggle::make('is_active')
                    ->label('Activa')
                    ->default(true),
            ]);
    }
}
