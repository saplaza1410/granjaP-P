<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('farm_transactions', function (Blueprint $table) {
            $table->id();
            $table->date('occurred_on');
            $table->string('type', 16);
            $table->decimal('amount', 15, 2);
            $table->foreignId('farm_category_id')->constrained('farm_categories')->cascadeOnDelete();
            $table->foreignId('farm_activity_id')
                ->nullable()
                ->constrained('farm_activities')
                ->nullOnDelete();
            $table->string('reference')->nullable();
            $table->text('notes')->nullable();
            $table->foreignId('user_id')->nullable()->constrained()->nullOnDelete();
            $table->timestamps();

            $table->index(['occurred_on', 'type']);
            $table->index(['farm_activity_id', 'occurred_on']);
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('farm_transactions');
    }
};
