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
        Schema::create('gastos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_gasto');
            $table->date('fecha');
            $table->string('descripcion');
            $table->foreignId('id_categoria')->references('id')->on('gasto_categorias');
            $table->double('total');
            $table->foreignId('id_usuario')->references('id')->on('users');
            $table->dateTimeTz('registro', precision: 0);
            $table->dateTimeTz('updated', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('gastos');
    }
};
