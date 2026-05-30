<?php

namespace App\Filament\Resources\FarmInventoryMovements\Schemas;

use App\Enums\InventoryMovementKind;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Schema;

class FarmInventoryMovementForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Select::make('farm_inventory_item_id')
                    ->label('Artículo')
                    ->relationship(name: 'item', titleAttribute: 'name')
                    ->searchable()
                    ->preload()
                    ->required(),
                DatePicker::make('occurred_on')
                    ->label('Fecha')
                    ->required()
                    ->default(now()),
                Select::make('kind')
                    ->label('Tipo')
                    ->options(InventoryMovementKind::options())
                    ->required()
                    ->native(false),
                TextInput::make('quantity')
                    ->label('Cantidad (> 0)')
                    ->numeric()
                    ->required()
                    ->minValue(0.0001)
                    ->step(0.0001),
                Select::make('farm_transaction_id')
                    ->label('Movimiento contable (opcional)')
                    ->relationship(
                        name: 'transaction',
                        titleAttribute: 'reference',
                        modifyQueryUsing: fn ($q) => $q->orderByDesc('occurred_on'),
                    )
                    ->getOptionLabelFromRecordUsing(
                        fn ($record) => $record->occurred_on->format('d/m/Y').' · '.$record->reference.' · $'.number_format((float) $record->amount, 0, ',', '.'),
                    )
                    ->searchable()
                    ->preload(),
                Textarea::make('notes')
                    ->label('Notas')
                    ->columnSpanFull(),
            ]);
    }
}
