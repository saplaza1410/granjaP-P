<?php

namespace App\Filament\Pages;

use App\Models\FarmZone;
use BackedEnum;
use Filament\Pages\Page;
use Filament\Support\Icons\Heroicon;
use UnitEnum;

class FarmMapPage extends Page
{
    protected static ?string $slug = 'plano-finca';
    protected static string|BackedEnum|null $navigationIcon = Heroicon::OutlinedMapPin;

    protected static ?string $navigationLabel = 'Ver plano';

    protected static ?string $title = 'Plano de la finca (1 hectárea)';

    protected static ?int $navigationSort = 1;

    protected static string|UnitEnum|null $navigationGroup = 'Granja · parcelas y plano';

    protected string $view = 'filament.pages.farm-map-page';

    protected function getViewData(): array
    {
        return [
            'zones' => FarmZone::query()->where('is_active', true)->orderBy('sort_order')->get(),
        ];
    }
}
