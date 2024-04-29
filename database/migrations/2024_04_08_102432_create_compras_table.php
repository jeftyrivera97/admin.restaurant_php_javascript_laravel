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
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->string('codigo_compra');
            $table->date('fecha');
            $table->foreignId('id_categoria')->references('id')->on('compra_categorias');
            $table->foreignId('id_proveedor')->references('id')->on('proveedores');
            $table->foreignId('id_tipo_cuenta')->references('id')->on('tipo_cuentas');
            $table->foreignId('id_estado_cuenta')->references('id')->on('estado_cuentas');
            $table->date('fecha_pago')->nullable();
            $table->double('gravado15');
            $table->double('gravado18');
            $table->double('impuesto15');
            $table->double('impuesto18');
            $table->double('excento');
            $table->double('exonerado');
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
        Schema::dropIfExists('compras');
    }
};
