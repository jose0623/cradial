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
        Schema::table('emisoras', function (Blueprint $table) {
            $table->string('cantidad_maxima_cuñas')->default('0')->change();
            $table->string('tarifa_remoto')->default('0')->change();
            $table->string('porcentaje_descuento')->default('0')->change();
        });
    }
    
    public function down()
    {
        Schema::table('emisoras', function (Blueprint $table) {
            $table->integer('cantidad_maxima_cuñas')->change();
            $table->integer('tarifa_remoto')->change();
            $table->integer('porcentaje_descuento')->change();
        });
    }
};
