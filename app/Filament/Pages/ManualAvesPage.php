<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class ManualAvesPage extends Page
{
    protected static ?string $slug = 'manual-aves';
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedHome;
    protected static ?string $navigationLabel = 'Manual · Aves';
    protected static ?string $title = 'Manual de Cría de Aves · Gallinas y Pollos';
    protected static ?int $navigationSort = 3;
    protected static string|\UnitEnum|null $navigationGroup = 'Granja · planificación';
    protected string $view = 'filament.pages.manual-aves-page';
}
