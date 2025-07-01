<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('reporte_items', function (Blueprint $table) {
            $table->decimal('valor_unitario', 18, 2)->change();
            $table->decimal('valor_neto', 18, 2)->change();
            $table->decimal('valor_iva', 18, 2)->change();
            $table->decimal('valor_total_con_iva', 18, 2)->change();
            $table->decimal('precio_base', 18, 2)->change();
            $table->decimal('precio_venta', 18, 2)->change();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reporte_items', function (Blueprint $table) {
            $table->decimal('valor_unitario', 12, 2)->change();
            $table->decimal('valor_neto', 12, 2)->change();
            $table->decimal('valor_iva', 12, 2)->change();
            $table->decimal('valor_total_con_iva', 12, 2)->change();
            $table->decimal('precio_base', 12, 2)->change();
            $table->decimal('precio_venta', 12, 2)->change();
        });
    }
};
