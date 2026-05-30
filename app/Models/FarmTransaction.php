<?php

namespace App\Models;

use App\Enums\FarmLedgerType;
use App\Enums\TaxDocumentKind;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmTransaction extends Model
{
    protected $fillable = [
        'occurred_on',
        'type',
        'amount',
        'farm_category_id',
        'farm_activity_id',
        'farm_zone_id',
        'reference',
        'notes',
        'tax_document_kind',
        'tax_document_number',
        'counterparty_name',
        'counterparty_tax_id',
        'vat_amount_cop',
        'tax_notes',
        'user_id',
    ];

    protected function casts(): array
    {
        return [
            'occurred_on' => 'date',
            'type' => FarmLedgerType::class,
            'amount' => 'decimal:2',
            'vat_amount_cop' => 'decimal:2',
            'tax_document_kind' => TaxDocumentKind::class,
        ];
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(FarmCategory::class, 'farm_category_id');
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(FarmActivity::class, 'farm_activity_id');
    }

    public function zone(): BelongsTo
    {
        return $this->belongsTo(FarmZone::class, 'farm_zone_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function inventoryMovements(): HasMany
    {
        return $this->hasMany(FarmInventoryMovement::class, 'farm_transaction_id');
    }

    protected static function booted(): void
    {
        static::saving(function (FarmTransaction $tx): void {
            if (! $tx->relationLoaded('category')) {
                $tx->load('category');
            }
            $cat = $tx->category;
            if ($cat === null) {
                return;
            }
            $tx->type = $cat->type;
            if ($tx->farm_activity_id === null && $cat->farm_activity_id !== null) {
                $tx->farm_activity_id = $cat->farm_activity_id;
            }
        });
    }
}
