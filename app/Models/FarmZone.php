<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class FarmZone extends Model
{
    protected $fillable = [
        'slug',
        'name',
        'polygon_points',
        'color_hex',
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

    public function transactions(): HasMany
    {
        return $this->hasMany(FarmTransaction::class);
    }
}
