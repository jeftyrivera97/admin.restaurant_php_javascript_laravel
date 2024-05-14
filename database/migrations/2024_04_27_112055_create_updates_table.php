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
        Schema::create('updates', function (Blueprint $table) {
            $table->id();
            $table->dateTimeTz('fecha', precision: 0);
            $table->string('tabla');
            $table->string('codigo');
            $table->string('descripcion')->nullable();
            $table->longText('valor_inicial');
            $table->longText('valor_final');
            $table->foreignId('id_empresa')->references('id')->on('empresas');
            $table->foreignId('id_usuario')->references('id')->on('users');
           
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('updates');
    }
};
