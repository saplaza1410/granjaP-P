<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('farm_inventory_items', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('sku')->nullable();
            $table->string('unit', 24)->default('unidad')->comment('kg, lb, bolsa, litro…');
            $table->foreignId('farm_activity_id')
                ->nullable()
                ->constrained('farm_activities')
                ->nullOnDelete();
            $table->decimal('reorder_level', 14, 4)->nullable();
            $table->text('notes')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            $table->index(['is_active', 'name']);
        });

        Schema::create('farm_inventory_movements', function (Blueprint $table) {
            $table->id();
            $table->foreignId('farm_inventory_item_id')->constrained('farm_inventory_items')->cascadeOnDelete();
            $table->date('occurred_on');
            $table->string('kind', 24);
            $table->decimal('quantity', 14, 4);
            $table->text('notes')->nullable();
            $table->foreignId('farm_transaction_id')
                ->nullable()
                ->constrained('farm_transactions')
                ->nullOnDelete()
                ->comment('Enlace opcional al movimiento contable relacionado');
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();
            $table->index(['occurred_on', 'kind']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farm_inventory_movements');
        Schema::dropIfExists('farm_inventory_items');
    }
};
