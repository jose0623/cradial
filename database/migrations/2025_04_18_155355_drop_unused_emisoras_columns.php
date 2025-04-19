<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class DropUnusedEmisorasColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emisoras', function (Blueprint $table) {
            $table->dropColumn([
                'telefono2',
                'cantidad_maxima_cuñas',
                'nombre_programa',
                'programa_mayor_audiencia',
                'horario',
                'estado',
                'valor_costo',
                'porcentaje_descuento',
                'rating',
                'nombre_mejor_locutor',
                'operador_telefonia',
                'lider_opinion',
                'login',
                'password',
                'plataforma',
            ]);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('emisoras', function (Blueprint $table) {
            // En caso de rollback, recrear las columnas eliminadas (con tipos de datos originales)
            $table->string('telefono2')->nullable();
            $table->string('cantidad_maxima_cuñas')->nullable();
            $table->string('nombre_programa')->nullable();
            $table->string('programa_mayor_audiencia')->nullable();
            $table->string('horario')->nullable();
            $table->string('estado')->nullable();
            $table->integer('estado')->nullable();
            $table->string('valor_costo')->nullable();
            $table->decimal('porcentaje_descuento', 5, 2)->nullable();
            $table->string('rating')->nullable();
            $table->string('nombre_mejor_locutor')->nullable();
            $table->string('operador_telefonia')->nullable();
            $table->string('lider_opinion')->nullable();
            $table->string('login')->nullable();
            $table->string('password')->nullable();
            $table->string('plataforma', 100)->nullable();
        });
    }
}
