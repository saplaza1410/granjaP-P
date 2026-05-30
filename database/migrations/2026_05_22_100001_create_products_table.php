<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->text('description')->nullable();
            $table->decimal('price', 12, 2);
            $table->string('unit')->default('unidad'); // unidad, kg, racimo, manojo, cubeta, etc.
            $table->integer('min_order')->default(1);
            $table->string('category')->default('otros'); // huevos, aves, peces, hortalizas, platano, tuberculos, otros
            $table->string('emoji')->default('🌿');
            $table->boolean('is_featured')->default(false);
            $table->boolean('is_available')->default(true);
            $table->unsignedSmallInteger('sort_order')->default(0);
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
