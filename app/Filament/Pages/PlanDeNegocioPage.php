<?php

namespace App\Filament\Pages;

use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;

class PlanDeNegocioPage extends Page
{
    protected static ?string $slug = 'plan-de-negocio';
    protected static string|\BackedEnum|null $navigationIcon = Heroicon::OutlinedClipboardDocumentList;
    protected static ?string $navigationLabel = 'Plan de negocio';
    protected static ?string $title = 'Plan de Negocio · Granja Planeta Rica';
    protected static ?int $navigationSort = 2;
    protected static string|\UnitEnum|null $navigationGroup = 'Granja · planificación';
    protected string $view = 'filament.pages.plan-de-negocio-page';
}
