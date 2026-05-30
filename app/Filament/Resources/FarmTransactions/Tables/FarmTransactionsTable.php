<?php

namespace App\Filament\Resources\FarmTransactions\Tables;

use App\Enums\FarmLedgerType;
use App\Enums\UserRole;
use App\Filament\Exports\FarmTransactionExporter;
use Filament\Actions\BulkActionGroup;
use Filament\Actions\DeleteBulkAction;
use Filament\Actions\EditAction;
use Filament\Actions\ExportAction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Support\Icons\Heroicon;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;

class FarmTransactionsTable
{
    public static function configure(Table $table): Table
    {
        return $table
            ->headerActions([
                ExportAction::make()
                    ->label('Exportar Excel')
                    ->icon(Heroicon::OutlinedArrowDownTray)
                    ->exporter(FarmTransactionExporter::class)
                    ->formats([ExportFormat::Xlsx])
                    ->columnMapping(false)
                    ->visible(fn (): bool => auth()->user()?->atLeastRole(UserRole::Operator) ?? false),
            ])
            ->columns([
                TextColumn::make('occurred_on')
                    ->label('Fecha')
                    ->date('d/m/Y')
                    ->sortable(),
                TextColumn::make('type')
                    ->label('Tipo')
                    ->badge()
                    ->formatStateUsing(fn (FarmLedgerType $state): string => $state->label()),
                TextColumn::make('amount')
                    ->label('Monto')
                    ->money('COP')
                    ->sortable(),
                TextColumn::make('category.name')
                    ->label('Categoría')
                    ->sortable()
                    ->searchable(),
                TextColumn::make('zone.name')
                    ->label('Zona')
                    ->sortable()
                    ->toggleable(),
                TextColumn::make('activity.name')
                    ->label('Actividad')
                    ->sortable()
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('tax_document_number')
                    ->label('Nº soporte')
                    ->toggleable(isToggledHiddenByDefault: true),
                TextColumn::make('reference')
                    ->label('Ref.')
                    ->searchable(),
                TextColumn::make('user.name')
                    ->label('Registró')
                    ->toggleable(isToggledHiddenByDefault: true),
            ])
            ->defaultSort('occurred_on', direction: 'desc')
            ->filters([
                SelectFilter::make('type')
                    ->label('Tipo')
                    ->options(\App\Enums\FarmLedgerType::options()),
                SelectFilter::make('farm_activity_id')
                    ->label('Actividad')
                    ->relationship('activity', 'name'),
                SelectFilter::make('farm_zone_id')
                    ->label('Zona')
                    ->relationship('zone', 'name'),
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
