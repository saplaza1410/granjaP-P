<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('farm_transactions', function (Blueprint $table) {
            $table->foreignId('farm_zone_id')
                ->nullable()
                ->after('farm_activity_id')
                ->constrained('farm_zones')
                ->nullOnDelete();
            $table->string('tax_document_kind')->nullable()->after('notes');
            $table->string('tax_document_number')->nullable();
            $table->string('counterparty_name')->nullable();
            $table->string('counterparty_tax_id')->nullable()->comment('NIT o CC cuando aplique');
            $table->decimal('vat_amount_cop', 15, 2)->nullable()->comment('IVA en COP si lo llevas aparte');
            $table->text('tax_notes')->nullable();
        });
    }

    public function down(): void
    {
        Schema::table('farm_transactions', function (Blueprint $table) {
            $table->dropForeign(['farm_zone_id']);
            $table->dropColumn([
                'farm_zone_id',
                'tax_document_kind',
                'tax_document_number',
                'counterparty_name',
                'counterparty_tax_id',
                'vat_amount_cop',
                'tax_notes',
            ]);
        });
    }
};
