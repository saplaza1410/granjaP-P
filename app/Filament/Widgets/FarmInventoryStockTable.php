<?php

namespace App\Filament\Widgets;

use App\Models\FarmInventoryItem;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class FarmInventoryStockTable extends TableWidget
{
    protected static ?string $heading = null;

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 3;

    public function table(Table $table): Table
    {
        return $table
            ->heading('Inventario · saldo por artículo')
            ->description('Saldo = ingresos a bodega menos salidas/consumos. No incluye valuación en dinero.')
            ->paginated(false)
            ->query(
                FarmInventoryItem::query()->where('is_active', true)->orderBy('name')
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Artículo')
                    ->searchable(),
                TextColumn::make('unit')
                    ->label('Unidad'),
                TextColumn::make('activity.name')
                    ->label('Actividad')
                    ->toggleable(),
                TextColumn::make('saldo')
                    ->label('Saldo')
                    ->state(fn (FarmInventoryItem $record): float => $record->currentStock())
                    ->numeric(decimalPlaces: 4),
                TextColumn::make('reorder_level')
                    ->label('Reorden')
                    ->numeric(decimalPlaces: 4),
                TextColumn::make('alerta')
                    ->label('Obs.')
                    ->state(function (FarmInventoryItem $record): string {
                        $stock = $record->currentStock();
                        $r = $record->reorder_level;
                        if ($r !== null && (float) $r > $stock) {
                            return 'Bajo reorden';
                        }

                        return '—';
                    })
                    ->color(fn (FarmInventoryItem $record): string => $record->reorder_level !== null && (float) $record->reorder_level > $record->currentStock() ? 'warning' : 'gray'),
            ]);
    }
}
