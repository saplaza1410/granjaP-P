<?php

namespace App\Filament\Widgets;

use App\Enums\FarmLedgerType;
use App\Models\FarmTransaction;
use Carbon\Carbon;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Collection;

class FarmAnnualProjectionChart extends ChartWidget
{
    protected ?string $heading = 'Resultado neto mensual · proyección 12 meses';

    protected ?string $description = 'Meses pasados: datos reales. Meses futuros: promedio de los últimos 3 meses.';

    protected string $color = 'warning';

    protected static ?int $sort = 6;

    protected int|string|array $columnSpan = 2;

    protected function getData(): array
    {
        Carbon::setLocale('es');

        $currentMonth = now()->startOfMonth();

        /** @var Collection<int, array{label: string, date: Carbon, net: float|null}> $months */
        $months = collect();

        for ($i = 11; $i >= 0; $i--) {
            $date  = now()->subMonths($i)->startOfMonth();
            $start = $date->toDateString();
            $end   = $date->copy()->endOfMonth()->toDateString();

            if ($date->lte($currentMonth)) {
                $income = (float) FarmTransaction::query()
                    ->where('type', FarmLedgerType::Income)
                    ->whereBetween('occurred_on', [$start, $end])
                    ->sum('amount');

                $expense = (float) FarmTransaction::query()
                    ->where('type', FarmLedgerType::Expense)
                    ->whereBetween('occurred_on', [$start, $end])
                    ->sum('amount');

                $net = $income - $expense;
            } else {
                $net = null;
            }

            $months->push([
                'label' => ucfirst($date->isoFormat('MMM YYYY')),
                'date'  => $date->copy(),
                'net'   => $net,
            ]);
        }

        // Calcular promedio de los últimos 3 meses reales con datos
        $recentNets = $months
            ->filter(fn (array $m): bool => $m['net'] !== null)
            ->sortByDesc(fn (array $m): string => $m['date']->toDateString())
            ->take(3)
            ->pluck('net');

        $avgProjection = $recentNets->isNotEmpty()
            ? $recentNets->average()
            : 0.0;

        $labels      = [];
        $realData    = [];
        $projection  = [];

        foreach ($months as $month) {
            $labels[] = $month['label'];

            if ($month['net'] !== null) {
                // Mes pasado o mes actual: dato real
                $realData[] = $month['net'];

                // La proyección del mes actual sirve de punto de unión visual
                // solo incluimos la proyección a partir del mes siguiente
                if ($month['date']->lt($currentMonth)) {
                    $projection[] = null;
                } else {
                    // Mes actual: añadimos el real también en proyección para unir la línea
                    $projection[] = $month['net'];
                }
            } else {
                // Mes futuro: null en real, proyección en proyección
                $realData[]   = null;
                $projection[] = round($avgProjection, 2);
            }
        }

        return [
            'labels'   => $labels,
            'datasets' => [
                [
                    'label'       => 'Real',
                    'borderColor' => '#22c55e',
                    'borderDash'  => [],
                    'data'        => $realData,
                    'fill'        => false,
                    'tension'     => 0.3,
                    'spanGaps'    => true,
                ],
                [
                    'label'       => 'Proyección',
                    'borderColor' => '#f59e0b',
                    'borderDash'  => [5, 5],
                    'data'        => $projection,
                    'fill'        => false,
                    'tension'     => 0.3,
                    'spanGaps'    => true,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'line';
    }

    protected function getOptions(): array
    {
        return [
            'responsive' => true,
            'spanGaps'   => true,
            'plugins'    => [
                'legend' => [
                    'display' => true,
                ],
            ],
            'scales' => [
                'y' => [
                    'beginAtZero' => false,
                ],
            ],
        ];
    }
}
