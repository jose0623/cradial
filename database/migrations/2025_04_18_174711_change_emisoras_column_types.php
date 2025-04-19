<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ChangeEmisorasColumnTypes extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emisoras', function (Blueprint $table) {
            $table->boolean('tiene_real_audio')->nullable()->change();
            $table->boolean('utiliza_remoto')->nullable()->change();
            $table->boolean('utiliza_perifoneo')->nullable()->change();
            $table->boolean('iva')->nullable()->change();
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
            $table->tinyInteger('tiene_real_audio')->nullable()->change();
            $table->tinyInteger('utiliza_remoto')->nullable()->change();
            $table->tinyInteger('utiliza_perifoneo')->nullable()->change();
            $table->tinyInteger('iva')->nullable()->change();
        });
    }
}