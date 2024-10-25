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
        Schema::create('clientes', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->string('telefono');
            $table->string('direccion');
            $table->string('nit');
            $table->string('plazo_en_dias');
            $table->unsignedBigInteger('vendedor_id');
            $table->string('email');
            $table->unsignedBigInteger('municipio_id');
            $table->string('fax');
            $table->string('tipo_de_documento');
            $table->integer('digito_verificacion');
            $table->boolean('comun')->default(false);
            $table->boolean('simplificado')->default(false);
            $table->boolean('gca')->default(false);
            $table->boolean('gc')->default(false);
            $table->unsignedBigInteger('tipo_cliente_id');
            $table->timestamps();

            $table->foreign('vendedor_id')->references('id')->on('users');
            $table->foreign('municipio_id')->references('id')->on('municipios');
            $table->foreign('tipo_cliente_id')->references('id')->on('tipo_clientes');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('clientes');
    }
};