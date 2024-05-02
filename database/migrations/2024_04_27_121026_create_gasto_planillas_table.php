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
        Schema::create('gasto_planillas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('id_gasto')->references('id')->on('gastos');
            $table->foreignId('id_planilla')->references('id')->on('planillas');
            $table->foreignId('id_empresa')->references('id')->on('empresas');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gasto_planillas');
    }
};
