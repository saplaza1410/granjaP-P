<?php

namespace App\Enums;

enum InventoryMovementKind: string
{
    case Intake = 'intake';
    case Outtake = 'outtake';

    public function label(): string
    {
        return match ($this) {
            self::Intake => 'Ingreso a bodega',
            self::Outtake => 'Salida / consumo',
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
