<?php

namespace App\Filament\Resources\FarmInventoryItems\Tables;

use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;

class FarmInventoryItemsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Ítem')
                    ->searchable(),
                TextColumn::make('unit')
                    ->label('Unidad'),
                TextColumn::make('activity.name')
                    ->label('Actividad')
                    ->toggleable(),
                TextColumn::make('reorder_level')
                    ->label('Reorden')
                    ->numeric(),
                IconColumn::make('is_active')
                    ->label('Activo')
                    ->boolean(),
            ])
            ->defaultSort('name')
            ->recordActions([
                EditAction::make(),
            ])
            ->toolbarActions([
                BulkActionGroup::make([
                    DeleteBulkAction::make(),
                ]),
            ]);
    }
}
