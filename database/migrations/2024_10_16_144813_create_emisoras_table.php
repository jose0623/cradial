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
        Schema::create('emisoras', function (Blueprint $table) {
            $table->id();

            // Emisora
            $table->string('name');
            $table->string('potencia');
            $table->string('dial');
            $table->foreignId('tipo_emisoras_id')->constrained('tipo_emisoras'); 
            $table->foreignId('municipio_id')->constrained('municipios');

            // Ubicación
            $table->integer('tipo_documento');
            $table->string('identificacion'); // Cambié a string por identificación
            $table->string('telefono1', 255)->nullable();
            $table->string('telefono2', 255)->nullable();
            $table->string('celular', 255)->nullable();
            $table->string('direccion', 255)->nullable();
            $table->string('correo_fisico', 255)->nullable();
            $table->string('email', 255)->nullable();

            // Características
            $table->boolean('utiliza_remoto')->default(false);
            $table->boolean('tiene_real_audio')->default(false);
            $table->string('clase_pauta', 255)->nullable();
            $table->foreignId('afiliacion_id')->constrained('tipo_afiliaciones'); 
            $table->boolean('utiliza_perifoneo')->default(false);
            $table->string('web', 255)->nullable();
            $table->string('licencia_funcionamiento', 255)->nullable();
            $table->integer('idioma')->nullable();

            // Manejo comercial
            $table->integer('cantidad_maxima_cuñas')->nullable();
            $table->float('tarifa_remoto')->nullable();
            $table->boolean('iva')->default(false);
            $table->float('porcentaje_descuento')->nullable();
            $table->string('tarifa_perifoneo', 255)->nullable();

            // Programación
            $table->string('nombre_programa', 255)->nullable(); // Cambié el nombre de la columna
            $table->foreignId('tipo_programa_id')->constrained('tipo_programas'); 
            $table->float('rating')->nullable();
            $table->string('programa_mayor_audiencia', 255)->nullable();
            $table->string('nombre_periodico', 255)->nullable();
            $table->string('nombre_canal_television', 255)->nullable();
            $table->string('horario', 255)->nullable(); // Cambié 'Horario' a 'horario'

            // Contactos
            $table->string('gerente', 255)->nullable();
            $table->string('director_noticias', 255)->nullable();
            $table->string('nombre_mejor_locutor', 255)->nullable();
            $table->string('operador_telefonia', 255)->nullable();
            $table->string('lider_opinion', 255)->nullable();

            // Cuenta de usuario
            $table->string('login', 255)->unique(); // Agregué unique para el login
            $table->string('password', 255);
            $table->boolean('estado')->default(true);
            $table->string('plataforma', 100)->nullable();

            $table->timestamps(); // Agrega columnas created_at y updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('emisoras'); // Cambié 'Emisoras' a 'emisoras' para mantener consistencia
    }
};