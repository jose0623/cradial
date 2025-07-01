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
            $table->json('cunas_por_dia_detalle')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reporte_items', function (Blueprint $table) {
            $table->dropColumn('cunas_por_dia_detalle');
        });
    }
};
