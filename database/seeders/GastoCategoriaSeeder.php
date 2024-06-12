<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class GastoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Planilla',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Agua Purificada',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Alimentacion y Bebidas',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Barberia',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Car Wash',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Combustible',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Compra de Bebidas Alcoholicas',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Envios y Encomiendas',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Farmacia',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Gastos Administrativos',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Hospital',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Cable e Internet',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Compra de Vivienda',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Energia Electrica',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Impuestos Municipales',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Impuestos Vecinales',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Impuestos SAR',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Linea Telefonica',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Prestamo Personal',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Prestamo Bancario',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Prestamo Hipotecario',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Renta',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Reparaciones a Terceros',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Seguros y Polizas',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Servicio de Agua Potable',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago por Servicio a Terceros',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago por Servicio de Sistema',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Tarjeta de Credito',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de Terreno',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Pago de un Credito Obtenido',
            'id_estado' => '1',
        ]);
      
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Reparaciones del Local',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Reaparacion de Inmueble Propio',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Salon de Belleza',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Transporte',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Veterinaria',
            'id_estado' => '1',
        ]);
        DB::table('gasto_categorias')->insert([
            'descripcion' => 'Otros',
            'id_estado' => '1',
        ]);

    }
}
