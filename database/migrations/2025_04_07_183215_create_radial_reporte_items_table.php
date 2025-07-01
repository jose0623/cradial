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
        Schema::create('reporte_items', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reporte_id')->constrained('reportes'); // Relación con reportes/propuestas
            $table->foreignId('id_emisora')->constrained('emisoras'); // Relación con emisoras existentes
            $table->foreignId('programa_id')->constrained('emisora_programas'); // Relación con programas
            
            // Detalles de pauta
            $table->enum('tipo_cuna', ['cuña', 'promo', 'programa']);
            $table->string('duracion', 20); // Ej: '30s'
            $table->string('dias_emision', 15); // Ej: 'L-M-J-V'
            $table->string('horario', 100);
            $table->unsignedInteger('cantidad_dias');
            $table->unsignedInteger('cunas_por_dia');
            $table->unsignedInteger('bonificacion')->default(0);
            
            // Valores monetarios
            $table->decimal('valor_unitario', 10, 2);
            $table->decimal('descuento', 5, 2)->default(0);
            $table->decimal('valor_neto', 10, 2);
            // Detalle de cuñas por día (lunes, martes, etc.)
            $table->json('cunas_por_dia_detalle')->nullable();
            
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
            
            $table->timestamps();
            
            // Índices para consultas rápidas
            $table->index(['reporte_id', 'id_emisora']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reporte_items');
    }
};
