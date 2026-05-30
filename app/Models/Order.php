<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    protected $fillable = [
        'order_number',
        'customer_name',
        'customer_phone',
        'customer_email',
        'customer_address',
        'delivery_method',
        'status',
        'subtotal',
        'delivery_fee',
        'total',
        'customer_notes',
        'admin_notes',
    ];

    public function items(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function generateOrderNumber(): string
    {
        $date = now()->format('Ymd');
        $last = static::whereDate('created_at', today())->count() + 1;
        return 'ORD-' . $date . '-' . str_pad($last, 4, '0', STR_PAD_LEFT);
    }

    public function statusLabel(): string
    {
        return match ($this->status) {
            'pendiente'  => 'Pendiente',
            'confirmado' => 'Confirmado',
            'listo'      => 'Listo para entrega',
            'entregado'  => 'Entregado',
            'cancelado'  => 'Cancelado',
            default      => $this->status,
        };
    }

    public function statusColor(): string
    {
        return match ($this->status) {
            'pendiente'  => 'warning',
            'confirmado' => 'info',
            'listo'      => 'success',
            'entregado'  => 'success',
            'cancelado'  => 'danger',
            default      => 'gray',
        };
    }
}
