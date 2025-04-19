<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddNewEmisorasColumns extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('emisoras', function (Blueprint $table) {
            $table->string('real_audio')->nullable();
            $table->string('descripcion_real_audio')->nullable();
            $table->string('tiempo_remoto')->nullable();
            $table->string('descripcion_remoto')->nullable();
            $table->string('tiempo_perifoneo')->nullable();
            $table->string('descripcion_perifoneo')->nullable();
            $table->string('cantidad_minima')->nullable();
            $table->string('email2')->nullable();
            $table->string('email3')->nullable();
            $table->string('telefono_gerente')->nullable();
            $table->string('telefono_director_noticias')->nullable(); 
            $table->string('encargado_pauta')->nullable();
            $table->string('telefono_encargado_pauta')->nullable();
            $table->string('representante_legal')->nullable();
            $table->string('telefono_representante_legal')->nullable();
            $table->text('observaciones')->nullable();
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
            $table->dropColumn('real_audio');
            $table->dropColumn('descripcion_real_audio');
            $table->dropColumn('tiempo_remoto');
            $table->dropColumn('descripcion_remoto');
            $table->dropColumn('tiempo_perifoneo');
            $table->dropColumn('descripcion_perifoneo');
            $table->dropColumn('cantidad_minima');
            $table->dropColumn('email2');
            $table->dropColumn('email3');
            $table->dropColumn('telefono_gerente');
            $table->dropColumn('telefono_director_noticias'); 
            $table->dropColumn('encargado_pauta');
            $table->dropColumn('telefono_encargado_pauta');
            $table->dropColumn('representante_legal');
            $table->dropColumn('telefono_representante_legal');
            $table->dropColumn('observaciones');

        });
    }
}