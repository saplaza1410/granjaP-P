<?php

namespace App\Enums;

enum UserRole: string
{
    case Viewer = 'viewer';
    case Operator = 'operator';
    case Manager = 'manager';
    case Admin = 'admin';

    public function label(): string
    {
        return match ($this) {
            self::Viewer => 'Consulta (solo lectura)',
            self::Operator => 'Operador (carga movimientos e inventario)',
            self::Manager => 'Gerente (gestión y borrado avanzado)',
            self::Admin => 'Administrador (usuarios y todo)',
        };
    }

    public function rank(): int
    {
        return match ($this) {
            self::Viewer => 10,
            self::Operator => 20,
            self::Manager => 40,
            self::Admin => 50,
        };
    }

    public function atLeast(self $other): bool
    {
        return $this->rank() >= $other->rank();
    }

    /**
     * @return array<string, string>
     */
    public static function options(): array
    {
        return collect(self::cases())->mapWithKeys(fn (self $c) => [$c->value => $c->label()])->all();
    }
}
