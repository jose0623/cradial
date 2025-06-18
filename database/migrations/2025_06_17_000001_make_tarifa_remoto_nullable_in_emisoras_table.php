<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('emisoras', function (Blueprint $table) {
            $table->string('tarifa_remoto')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('emisoras', function (Blueprint $table) {
            $table->string('tarifa_remoto')->nullable(false)->change();
        });
    }
}; 