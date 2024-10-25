<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        if (!Schema::hasTable('emisora_programas')) {
            Schema::create('emisora_programas', function (Blueprint $table) {
                $table->id();
                $table->string('nombre_programa');
                $table->unsignedBigInteger('tipo_programa_id');
                $table->foreign('tipo_programa_id')->references('id')->on('tipos_programas');
                $table->boolean('lunes')->default(false);
                $table->boolean('martes')->default(false);
                $table->boolean('miercoles')->default(false);
                $table->boolean('jueves')->default(false);
                $table->boolean('viernes')->default(false);
                $table->boolean('sabado')->default(false);
                $table->boolean('domingo')->default(false);
                $table->string('horario');
                $table->string('nombre_locutor');
                $table->boolean('activo')->default(true);
                $table->timestamps();
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emisora_programas');
    }
};
