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
        Schema::table('users', function (Blueprint $table) {
            // Agrega la columna 'role' con un valor predeterminado (ej. 'user')
            // Puedes usar un string para el rol o un entero si prefieres mapear IDs a roles
            $table->string('role')->default('user')->after('email'); // O after('password')
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('users', function (Blueprint $table) {
            // Elimina la columna 'role' si se revierte la migración
            $table->dropColumn('role');
        });
    }
};