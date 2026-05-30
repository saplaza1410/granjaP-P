<?php

namespace App\Filament\Pages;

use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class PlanoConstruccionPage extends Page
{
    protected static ?string $slug = 'plano-construccion';

    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedSquares2x2;

    protected static ?string $navigationLabel = 'Plano detallado';

    protected static ?string $title = 'Plano de Construcción Detallado';

    protected static ?int $navigationSort = 2;

    protected static string|UnitEnum|null $navigationGroup = 'Granja · parcelas y plano';

    protected string $view = 'filament.pages.plano-construccion-page';
}
