<?php

namespace App\Filament\Widgets;

use App\Enums\FarmLedgerType;
use App\Models\FarmTransaction;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Collection;

class FarmIncomeExpenseChart extends ChartWidget
{
    protected ?string $heading = 'Ingresos vs Gastos · últimos 12 meses';

    protected ?string $description = 'Barras comparativas por mes (COP).';

    protected string $color = 'success';

    protected static ?int $sort = 4;

    protected int|string|array $columnSpan = 'full';

    protected function getData(): array
    {
        Carbon::setLocale('es');

        /** @var Collection<int, array{label: string, income: float, expense: float}> $months */
        $months = collect();

        for ($i = 11; $i >= 0; $i--) {
            $date  = now()->subMonths($i)->startOfMonth();
            $start = $date->toDateString();
            $end   = $date->copy()->endOfMonth()->toDateString();

            $income = (float) FarmTransaction::query()
                ->where('type', FarmLedgerType::Income)
                ->whereBetween('occurred_on', [$start, $end])
                ->sum('amount');

            $expense = (float) FarmTransaction::query()
                ->where('type', FarmLedgerType::Expense)
                ->whereBetween('occurred_on', [$start, $end])
                ->sum('amount');

            $months->push([
                'label'   => ucfirst($date->isoFormat('MMM YYYY')),
                'income'  => $income,
                'expense' => $expense,
            ]);
        }

        return [
            'labels'   => $months->pluck('label')->toArray(),
            'datasets' => [
                [
                    'label'           => 'Ingresos',
                    'backgroundColor' => '#22c55e',
                    'data'            => $months->pluck('income')->toArray(),
                ],
                [
                    'label'           => 'Gastos',
                    'backgroundColor' => '#ef4444',
                    'data'            => $months->pluck('expense')->toArray(),
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'bar';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'plugins'    => [
                'legend' => [
                    'display' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => true,
                ],
            ],
        ];
    }
}
