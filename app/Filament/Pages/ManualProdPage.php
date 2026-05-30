<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class ManualProdPage extends Page
{
    protected static ?string $slug = 'manual-produccion';
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedBeaker;
    protected static ?string $navigationLabel = 'Manual · Producción';
    protected static ?string $title = 'Manual de Producción · Peces, Hortalizas y Cultivos';
    protected static ?int $navigationSort = 4;
    protected static string|\UnitEnum|null $navigationGroup = 'Granja · planificación';
    protected string $view = 'filament.pages.manual-prod-page';
}
