<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('farm_categories', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('type', 16);
            $table->foreignId('farm_activity_id')
                ->nullable()
                ->constrained('farm_activities')
                ->nullOnDelete();
            $table->boolean('is_active')->default(true);
            $table->timestamps();

            $table->index(['type', 'is_active']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farm_categories');
    }
};
