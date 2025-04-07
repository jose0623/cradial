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
        Schema::table('emisora_programas', function (Blueprint $table) {
            $table->float('costo')->nullable(); // Cambiado a float
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emisora_programas', function (Blueprint $table) {
            $table->dropColumn('costo'); // Elimina la columna costo
        });
    }
};
