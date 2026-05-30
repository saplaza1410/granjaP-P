<?php

namespace App\Models;

use App\Enums\FarmLedgerType;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmCategory extends Model
{
    protected $fillable = [
        'name',
        'type',
        'farm_activity_id',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'type' => FarmLedgerType::class,
            'is_active' => 'boolean',
        ];
    }

    public function activity(): BelongsTo
    {
        return $this->belongsTo(FarmActivity::class, 'farm_activity_id');
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(FarmTransaction::class);
    }
}
