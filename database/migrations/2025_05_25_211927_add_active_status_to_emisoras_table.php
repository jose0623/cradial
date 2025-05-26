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
        Schema::table('emisoras', function (Blueprint $table) {
            // Añade la columna 'emisora_activa' como booleana, por defecto a true (activa)
            // Esto significa que las emisoras existentes se considerarán activas.
            $table->boolean('emisora_activa')->default(true)->after('observaciones'); 
            // Añade la columna 'observacion_estado_emisora' como texto, puede ser nula
            $table->text('observacion_estado_emisora')->nullable()->after('emisora_activa');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emisoras', function (Blueprint $table) {
            // Elimina las columnas si se revierte la migración
            $table->dropColumn('emisora_activa');
            $table->dropColumn('observacion_estado_emisora');
        });
    }
};

