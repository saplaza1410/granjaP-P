<?php

namespace App\Filament\Widgets;

use App\Enums\FarmLedgerType;
use App\Models\FarmActivity;
use App\Models\FarmTransaction;
use Filament\Widgets\ChartWidget;
use Illuminate\Support\Collection;

class FarmActivityProfitChart extends ChartWidget
{
    protected ?string $heading = 'Resultado neto por actividad · año en curso';

    protected ?string $description = 'Solo actividades con movimientos en el año.';

    protected string $color = 'primary';

    protected static ?int $sort = 5;

    protected int|string|array $columnSpan = 2;

    protected function getData(): array
    {
        $colors = ['#22c55e', '#3b82f6', '#f59e0b', '#ef4444', '#8b5cf6', '#06b6d4', '#ec4899'];

        $start = now()->startOfYear()->toDateString();
        $end   = now()->endOfYear()->toDateString();

        /** @var Collection<int, FarmActivity> $activities */
        $activities = FarmActivity::query()
            ->where('is_active', true)
            ->orderBy('sort_order')
            ->orderBy('name')
            ->get();

        $labels = [];
        $data   = [];

        foreach ($activities as $activity) {
            $income = (float) FarmTransaction::query()
                ->where('farm_activity_id', $activity->id)
                ->where('type', FarmLedgerType::Income)
                ->whereBetween('occurred_on', [$start, $end])
                ->sum('amount');

            $expense = (float) FarmTransaction::query()
                ->where('farm_activity_id', $activity->id)
                ->where('type', FarmLedgerType::Expense)
                ->whereBetween('occurred_on', [$start, $end])
                ->sum('amount');

            $net = $income - $expense;

            if ($net !== 0.0) {
                $labels[] = $activity->name;
                $data[]   = $net;
            }
        }

        // Si no hay actividades con movimientos, mostrar todas las activas (hasta 3)
        if (empty($labels)) {
            $fallback = $activities->take(3);
            foreach ($fallback as $activity) {
                $labels[] = $activity->name;
                $data[]   = 0;
            }
        }

        $bgColors = array_map(
            fn (int $i): string => $colors[$i % count($colors)],
            array_keys($data)
        );

        return [
            'labels'   => $labels,
            'datasets' => [
                [
                    'label'           => 'Resultado neto',
                    'backgroundColor' => $bgColors,
                    'data'            => $data,
                ],
            ],
        ];
    }

    protected function getType(): string
    {
        return 'doughnut';
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
        ];
    }
}
