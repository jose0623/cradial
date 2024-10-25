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
            $table->unsignedBigInteger('id_emisora')->after('id');
            $table->foreign('id_emisora')->references('id')->on('emisoras');
        });


    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('emisora_programas', function (Blueprint $table) {
            $table->dropColumn('id_emisora');
        });

    }
};
