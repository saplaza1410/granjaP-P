<?php

namespace App\Filament\Exports;

use App\Enums\FarmLedgerType;
use App\Enums\TaxDocumentKind;
use App\Models\FarmTransaction;
use Filament\Actions\Exports\Enums\ExportFormat;
use Filament\Actions\Exports\ExportColumn;
use Filament\Actions\Exports\Exporter;
use Filament\Actions\Exports\Models\Export;
use Illuminate\Database\Eloquent\Builder;

class FarmTransactionExporter extends Exporter
{
    protected static ?string $model = FarmTransaction::class;

    public static function modifyQuery(Builder $query): Builder
    {
        return $query->with(['category', 'activity', 'zone', 'user']);
    }

    public function getFormats(): array
    {
        return [
            ExportFormat::Xlsx,
        ];
    }

    public static function getColumns(): array
    {
        return [
            ExportColumn::make('occurred_on')
                ->label('Fecha')
                ->formatStateUsing(fn ($state): string => $state?->format('Y-m-d') ?? ''),
            ExportColumn::make('type')
                ->label('Tipo')
                ->formatStateUsing(function ($state): string {
                    if ($state instanceof FarmLedgerType) {
                        return $state->label();
                    }

                    return (string) $state;
                }),
            ExportColumn::make('amount')
                ->label('Monto_COP'),
            ExportColumn::make('category.name')
                ->label('Categoría'),
            ExportColumn::make('activity.name')
                ->label('Actividad'),
            ExportColumn::make('zone.name')
                ->label('Zona'),
            ExportColumn::make('reference')
                ->label('Referencia'),
            ExportColumn::make('notes')
                ->label('Notas'),
            ExportColumn::make('tax_document_kind')
                ->label('Tipo soporte fiscal')
                ->formatStateUsing(function ($state): string {
                    if ($state instanceof TaxDocumentKind) {
                        return $state->label();
                    }
                    if ($state === null || $state === '') {
                        return '';
                    }

                    return (string) $state;
                }),
            ExportColumn::make('tax_document_number')
                ->label('Número soporte'),
            ExportColumn::make('counterparty_name')
                ->label('Contraparte'),
            ExportColumn::make('counterparty_tax_id')
                ->label('NIT_CC'),
            ExportColumn::make('vat_amount_cop')
                ->label('IVA_COP'),
            ExportColumn::make('tax_notes')
                ->label('Notas_fiscales'),
            ExportColumn::make('user.name')
                ->label('Registró'),
            ExportColumn::make('created_at')
                ->label('Creado_en')
                ->formatStateUsing(fn ($state): string => $state?->format('Y-m-d H:i') ?? ''),
        ];
    }

    public static function getCompletedNotificationTitle(Export $export): string
    {
        return 'Exportación de movimientos lista';
    }

    public static function getCompletedNotificationBody(Export $export): string
    {
        $ok = $export->successful_rows;
        $fail = $export->getFailedRowsCount();

        $msg = "Se exportaron {$ok} filas a Excel (XLSX).";
        if ($fail > 0) {
            $msg .= " Fallaron {$fail} filas.";
        }

        return $msg;
    }
}
