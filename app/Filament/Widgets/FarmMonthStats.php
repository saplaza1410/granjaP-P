<?php

namespace App\Filament\Widgets;

use App\Enums\FarmLedgerType;
use App\Models\FarmTransaction;
use Filament\Widgets\StatsOverviewWidget;
use Filament\Widgets\StatsOverviewWidget\Stat;
use Illuminate\Support\Number;

class FarmMonthStats extends StatsOverviewWidget
{
    protected ?string $heading = 'Este mes · resumen rápido';

    protected ?string $description = 'Ingresos, gastos y resultado (COP). Se actualiza según tus movimientos registrados.';

    protected static ?int $sort = 1;

    protected function getStats(): array
    {
        $start = now()->startOfMonth()->toDateString();
        $end = now()->endOfMonth()->toDateString();

        $income = (float) FarmTransaction::query()
            ->where('type', FarmLedgerType::Income)
            ->whereBetween('occurred_on', [$start, $end])
            ->sum('amount');

        $expense = (float) FarmTransaction::query()
            ->where('type', FarmLedgerType::Expense)
            ->whereBetween('occurred_on', [$start, $end])
            ->sum('amount');

        $net = $income - $expense;

        return [
            Stat::make('Ingresos', Number::currency($income, 'COP', 'es_CO'))
                ->description('Total ingresos del mes')
                ->descriptionIcon('heroicon-m-arrow-trending-up')
                ->color('success'),
            Stat::make('Gastos', Number::currency($expense, 'COP', 'es_CO'))
                ->description('Total gastos del mes')
                ->descriptionIcon('heroicon-m-arrow-trending-down')
                ->color('danger'),
            Stat::make('Resultado', Number::currency($net, 'COP', 'es_CO'))
                ->description($net >= 0 ? 'Ingresos superan gastos' : 'Gastos superan ingresos')
                ->descriptionIcon($net >= 0 ? 'heroicon-m-check-circle' : 'heroicon-m-exclamation-triangle')
                ->color($net >= 0 ? 'primary' : 'warning'),
        ];
    }
}
