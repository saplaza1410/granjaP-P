<?php

namespace App\Models;

use App\Enums\InventoryMovementKind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmInventoryItem extends Model
{
    protected $fillable = [
        'name',
        'sku',
        'unit',
        'farm_activity_id',
        'reorder_level',
        'notes',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'reorder_level' => 'decimal:4',
        ];
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(FarmActivity::class, 'farm_activity_id');
    }

    public function movements(): HasMany
    {
        return $this->hasMany(FarmInventoryMovement::class, 'farm_inventory_item_id');
    }

    public function currentStock(): float
    {
        $in = (float) $this->movements()->where('kind', InventoryMovementKind::Intake)->sum('quantity');
        $out = (float) $this->movements()->where('kind', InventoryMovementKind::Outtake)->sum('quantity');

        return $in - $out;
    }
}
