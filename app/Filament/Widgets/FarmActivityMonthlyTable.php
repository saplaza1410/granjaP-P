<?php

namespace App\Filament\Widgets;

use App\Enums\FarmLedgerType;
use App\Models\FarmActivity;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget;

class FarmActivityMonthlyTable extends TableWidget
{
    protected static ?string $heading = null;

    protected int|string|array $columnSpan = 'full';

    protected static ?int $sort = 2;

    public function table(Table $table): Table
    {
        $start = now()->startOfMonth()->toDateString();
        $end = now()->endOfMonth()->toDateString();
        $label = now()->isoFormat('MMMM YYYY');

        return $table
            ->heading('Por actividad · '.$label)
            ->paginated(false)
            ->description('Totales del mes por área productiva.')
            ->query(
                FarmActivity::query()->where('is_active', true)->orderBy('sort_order')
            )
            ->columns([
                TextColumn::make('name')
                    ->label('Actividad'),
                TextColumn::make('income')
                    ->label('Ingresos')
                    ->state(function (FarmActivity $record) use ($start, $end): float {
                        return (float) $record->transactions()
                            ->where('type', FarmLedgerType::Income)
                            ->whereBetween('occurred_on', [$start, $end])
                            ->sum('amount');
                    })
                    ->money('COP'),
                TextColumn::make('expense')
                    ->label('Gastos')
                    ->state(function (FarmActivity $record) use ($start, $end): float {
                        return (float) $record->transactions()
                            ->where('type', FarmLedgerType::Expense)
                            ->whereBetween('occurred_on', [$start, $end])
                            ->sum('amount');
                    })
                    ->money('COP'),
                TextColumn::make('net')
                    ->label('Resultado')
                    ->color(function (FarmActivity $record) use ($start, $end): string {
                        return $this->netFor($record, $start, $end) >= 0 ? 'success' : 'danger';
                    })
                    ->state(function (FarmActivity $record) use ($start, $end): float {
                        return $this->netFor($record, $start, $end);
                    })
                    ->money('COP'),
            ])
            ->defaultSort('name');
    }

    private function netFor(FarmActivity $record, string $start, string $end): float
    {
        $income = (float) $record->transactions()
            ->where('type', FarmLedgerType::Income)
            ->whereBetween('occurred_on', [$start, $end])
            ->sum('amount');
        $expense = (float) $record->transactions()
            ->where('type', FarmLedgerType::Expense)
            ->whereBetween('occurred_on', [$start, $end])
            ->sum('amount');

        return $income - $expense;
    }
}
