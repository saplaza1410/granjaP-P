<?php

namespace App\Filament\Resources\FarmCategories\Tables;

use App\Enums\FarmLedgerType;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Tables\Columns\IconColumn;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FarmCategoriesTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->columns([
                TextColumn::make('name')
                    ->label('Nombre')
                    ->searchable()
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->formatStateUsing(fn (FarmLedgerType $state): string => $state->label()),
                TextColumn::make('activity.name')
                    ->label('Actividad')
                    ->sortable()
                    ->toggleable(),
                IconColumn::make('is_active')
                    ->label('Activa')
                    ->boolean(),
            ])
            ->defaultSort('name')
            ->filters([
                SelectFilter::make('type')
                    ->label('Tipo')
                    ->options(FarmLedgerType::options()),
                SelectFilter::make('farm_activity_id')
                    ->label('Actividad')
                    ->relationship('activity', 'name'),
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
