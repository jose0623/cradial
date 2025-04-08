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
        Schema::create('reportes', function (Blueprint $table) {
            $table->id(); // BIGINT UNSIGNED AUTO_INCREMENT PRIMARY KEY
            $table->foreignId('cliente_id')->constrained('clientes'); // Relación con usuarios
            
            // Campos comunes
            $table->string('titulo', 255);
            $table->enum('estado', ['borrador', 'enviado', 'aprobado', 'rechazado'])->default('borrador');
            
            // Campos específicos para propuestas
            $table->string('es_propuesta', 255);
            $table->string('codigo_propuesta', 50)->unique()->nullable();
            $table->date('vigencia_desde')->nullable();
            $table->date('vigencia_hasta')->nullable();
            $table->text('observaciones')->nullable();
            
            // Campos financieros
            $table->decimal('subtotal', 12, 2)->default(0);
            $table->decimal('iva', 12, 2)->default(0);
            $table->decimal('total', 12, 2)->default(0);
            
            $table->timestamps(); // created_at y updated_at
            
            // Índices adicionales
            $table->index(['cliente_id', 'es_propuesta']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('reportes');
    }
};
