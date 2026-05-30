<?php

namespace App\Models;

use App\Enums\InventoryMovementKind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FarmInventoryMovement extends Model
{
    protected $fillable = [
        'farm_inventory_item_id',
        'occurred_on',
        'kind',
        'quantity',
        'notes',
        'farm_transaction_id',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'occurred_on' => 'date',
            'kind' => InventoryMovementKind::class,
            'quantity' => 'decimal:4',
        ];
    }

    public function item(): BelongsTo
    {
        return $this->belongsTo(FarmInventoryItem::class, 'farm_inventory_item_id');
    }

    public function transaction(): BelongsTo
    {
        return $this->belongsTo(FarmTransaction::class, 'farm_transaction_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    protected static function booted(): void
    {
        static::saving(function (FarmInventoryMovement $m): void {
            if ((float) $m->quantity <= 0) {
                throw new \InvalidArgumentException('La cantidad debe ser mayor a cero.');
            }
        });
    }

    public function signedQuantity(): float
    {
        $q = (float) $this->quantity;

        return match ($this->kind) {
            InventoryMovementKind::Intake => $q,
            InventoryMovementKind::Outtake => -1 * $q,
        };
    }
}
