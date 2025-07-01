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
            $table->decimal('precio_base', 10, 2)->nullable();
            $table->decimal('precio_venta', 10, 2)->nullable();
            $table->unsignedBigInteger('tipo_programa_id')->nullable();
            $table->decimal('factor_duracion', 5, 2)->nullable();
            $table->boolean('recargo_noticiero')->default(false);
            $table->boolean('recargo_mencion')->default(false);
            $table->decimal('iva_aplicado', 5, 2)->nullable();
            $table->decimal('valor_iva', 10, 2)->nullable();
            $table->decimal('valor_total_con_iva', 10, 2)->nullable();
            $table->unsignedBigInteger('usuario_creador_id')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('reporte_items', function (Blueprint $table) {
            $table->dropColumn([
                'precio_base',
                'precio_venta',
                'tipo_programa_id',
                'factor_duracion',
                'recargo_noticiero',
                'recargo_mencion',
                'iva_aplicado',
                'valor_iva',
                'valor_total_con_iva',
                'usuario_creador_id',
            ]);
        });
    }
}; 