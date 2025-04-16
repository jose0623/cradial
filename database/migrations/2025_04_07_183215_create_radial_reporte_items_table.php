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
