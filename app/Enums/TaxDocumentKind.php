<?php

namespace App\Enums;

enum TaxDocumentKind: string
{
    case Internal = 'interno';
    case SalesInvoice = 'factura_venta';
    case SupportingDocument = 'documento_soporte';
    case AccountVoucher = 'comprobante_interno';
    case CashReceipt = 'recibo_caja';
    case PurchaseInvoice = 'factura_compra';
    case Other = 'otro';

    public function label(): string
    {
        return match ($this) {
            self::Internal => 'Solo control interno',
            self::SalesInvoice => 'Factura de venta (referencia futura DIAN)',
            self::SupportingDocument => 'Documento soporte en adquisiciones',
            self::AccountVoucher => 'Comprobante interno / cuenta',
            self::CashReceipt => 'Recibo de caja',
            self::PurchaseInvoice => 'Factura de compra',
            self::Other => 'Otro',
        };
    }

    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn (self $c) => [$c->value => $c->label()])->all();
    }
}
