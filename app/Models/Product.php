<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Str;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'unit',
        'min_order',
        'category',
        'emoji',
        'is_featured',
        'is_available',
        'sort_order',
    ];

    protected function casts(): array
    {
        return [
            'price'        => 'decimal:2',
            'is_featured'  => 'boolean',
            'is_available' => 'boolean',
        ];
    }

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public static function findBySlug(string $slug): ?self
    {
        return static::where('slug', $slug)->where('is_available', true)->first();
    }

    public function formattedPrice(): string
    {
        return '$' . number_format($this->price, 0, ',', '.') . ' COP/' . $this->unit;
    }
}
