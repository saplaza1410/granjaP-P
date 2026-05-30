<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmActivity extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'sort_order',
        'is_active',
    ];

    protected function casts(): array
    {
        return [
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ];
    }

    public function categories(): HasMany
    {
        return $this->hasMany(FarmCategory::class);
    }

    public function transactions(): HasMany
    {
        return $this->hasMany(FarmTransaction::class);
    }

    public function incomeTotalBetween(string $start, string $end): float
    {
        return (float) $this->transactions()
            ->where('type', \App\Enums\FarmLedgerType::Income->value)
            ->whereBetween('occurred_on', [$start, $end])
            ->sum('amount');
    }

    public function expenseTotalBetween(string $start, string $end): float
    {
        return (float) $this->transactions()
            ->where('type', \App\Enums\FarmLedgerType::Expense->value)
            ->whereBetween('occurred_on', [$start, $end])
            ->sum('amount');
    }
}
