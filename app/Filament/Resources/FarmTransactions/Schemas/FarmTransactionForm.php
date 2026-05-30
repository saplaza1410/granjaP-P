<?php

namespace App\Filament\Resources\FarmTransactions\Schemas;

use App\Enums\TaxDocumentKind;
use Filament\Forms\Components\DatePicker;
use Filament\Forms\Components\Placeholder;
use Filament\Forms\Components\Select;
use Filament\Forms\Components\Textarea;
use Filament\Forms\Components\TextInput;
use Filament\Schemas\Components\Section;
use Filament\Schemas\Components\Utilities\Get;
use Filament\Schemas\Schema;
use Illuminate\Database\Eloquent\Model;

class FarmTransactionForm
{
    public static function configure(Schema $schema): Schema
    {
        return $schema
            ->components([
                Section::make('Movimiento contable')
                    ->schema([
                        DatePicker::make('occurred_on')
                            ->label('Fecha del movimiento')
                            ->required()
                            ->native(false)
                            ->default(now()),
                        Select::make('farm_category_id')
                            ->label('Categoría')
                            ->relationship(
                                name: 'category',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn ($query) => $query->where('is_active', true)->orderBy('type')->orderBy('name'),
                            )
                            ->searchable()
                            ->preload()
                            ->required()
                            ->live(),
                        Placeholder::make('_type_preview')
                            ->label('Tipo (derivado de categoría)')
                            ->content(function (?Model $record, Get $get): string {
                                if ($record?->category !== null) {
                                    return $record->category->type->label();
                                }

                                if (filled($get('farm_category_id'))) {
                                    return \App\Models\FarmCategory::query()
                                        ->find($get('farm_category_id'))
                                        ?->type
                                        ?->label() ?? '—';
                                }

                                return '—';
                            }),
                        Select::make('farm_activity_id')
                            ->label('Actividad (opcional)')
                            ->relationship(
                                name: 'activity',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn ($query) => $query->where('is_active', true)->orderBy('sort_order'),
                            )
                            ->searchable()
                            ->preload()
                            ->placeholder('Por defecto: la actividad de la categoría')
                            ->helperText('Si seleccionás otra actividad, se guarda ese criterio de costeo.'),
                        Select::make('farm_zone_id')
                            ->label('Zona física del plano (opcional)')
                            ->relationship(
                                name: 'zone',
                                titleAttribute: 'name',
                                modifyQueryUsing: fn ($q) => $q->where('is_active', true)->orderBy('sort_order'),
                            )
                            ->searchable()
                            ->preload(),
                        TextInput::make('amount')
                            ->label('Monto (COP)')
                            ->required()
                            ->numeric()
                            ->minValue(0.01)
                            ->prefix('$')
                            ->step(1),
                        TextInput::make('reference')
                            ->label('Referencia interna')
                            ->maxLength(191),
                        Textarea::make('notes')
                            ->label('Notas')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
                Section::make('Soporte fiscal / Colombia (uso interno, no DIAN)')
                    ->description('Registra número de soporte y NIT/CC para acercarte a orden tributario cuando lo pidas tu contador. Esto NO genera factura electrónica.')
                    ->collapsed()
                    ->schema([
                        Select::make('tax_document_kind')
                            ->label('Tipo de soporte')
                            ->options(collect(TaxDocumentKind::cases())->mapWithKeys(
                                fn (TaxDocumentKind $k) => [$k->value => $k->label()]
                            )->all())
                            ->placeholder('Opcional'),
                        TextInput::make('tax_document_number')
                            ->label('Nº documento')
                            ->maxLength(191),
                        TextInput::make('counterparty_name')
                            ->label('Cliente o proveedor (nombre)')
                            ->maxLength(191),
                        TextInput::make('counterparty_tax_id')
                            ->label('NIT o cédula (sin puntos)')
                            ->maxLength(32),
                        TextInput::make('vat_amount_cop')
                            ->label('IVA (COP) si lo llevas aparte')
                            ->numeric()
                            ->prefix('$')
                            ->nullable(),
                        Textarea::make('tax_notes')
                            ->label('Notas fiscales / resoluciones')
                            ->columnSpanFull(),
                    ])
                    ->columns(2),
            ]);
    }
}
