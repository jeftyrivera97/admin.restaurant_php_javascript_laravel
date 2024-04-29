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
        Schema::create('productos', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_producto')->unique();
            $table->string('descripcion');
            $table->foreignId('id_categoria')->references('id')->on('producto_categorias');
            $table->double('stock');
            $table->double('costo');
            $table->foreignId('id_usuario')->references('id')->on('users');
            $table->foreignId('id_estado')->references('id')->on('estados');
            $table->dateTimeTz('registro', precision: 0);
            $table->dateTimeTz('updated', precision: 0);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('productos');
    }
};
