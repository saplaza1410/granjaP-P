<?php

namespace App\Filament\Resources\FarmInventoryMovements\Tables;

use App\Enums\InventoryMovementKind;
use App\Models\FarmInventoryMovement;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FarmInventoryMovementsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('occurred_on')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('item.name')
                    ->label('Artículo')
                    ->searchable(),
                TextColumn::make('kind')
                    ->label('Tipo')
                    ->badge()
                    ->formatStateUsing(fn (InventoryMovementKind $state): string => $state->label()),
                TextColumn::make('quantity')
                    ->label('Cant.')
                    ->numeric(decimalPlaces: 4),
                TextColumn::make('qty_signed')
                    ->label('Δ stock')
                    ->state(fn (FarmInventoryMovement $record): float => $record->signedQuantity())
                    ->numeric(decimalPlaces: 4)
                    ->color(fn (FarmInventoryMovement $record): string => $record->signedQuantity() >= 0 ? 'success' : 'danger'),
                TextColumn::make('user.name')
                    ->label('Usuario')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('occurred_on', direction: 'desc')
            ->filters([
                SelectFilter::make('kind')
                    ->label('Tipo')
                    ->options(InventoryMovementKind::options()),
            ])
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
