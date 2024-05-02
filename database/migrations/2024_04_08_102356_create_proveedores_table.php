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
        Schema::create('proveedores', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_proveedor')->unique();
            $table->string('descripcion');
            $table->string('contacto');
            $table->string('categoria');
            $table->string('telefono');
            $table->foreignId('id_empresa')->references('id')->on('empresas');
            $table->foreignId('id_estado')->references('id')->on('estados');
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
        Schema::dropIfExists('proveedores');
    }
};
