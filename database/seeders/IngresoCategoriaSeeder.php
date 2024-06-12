<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class IngresoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('ingreso_categorias')->insert([
            'descripcion' => 'Venta en Efectivo',
            'id_estado' => '1',
        ]);
        DB::table('ingreso_categorias')->insert([
            'descripcion' => 'Venta en POS',
            'id_estado' => '1',
        ]);
        DB::table('ingreso_categorias')->insert([
            'descripcion' => 'Venta en Transferencia',
            'id_estado' => '1',
        ]);
        DB::table('ingreso_categorias')->insert([
            'descripcion' => 'Venta de Turno',
            'id_estado' => '1',
        ]);
        DB::table('ingreso_categorias')->insert([
            'descripcion' => 'Venta del Dia',
            'id_estado' => '1',
        ]);
        DB::table('ingreso_categorias')->insert([
            'descripcion' => 'Prestamo Personal',
            'id_estado' => '1',
        ]);
        DB::table('ingreso_categorias')->insert([
            'descripcion' => 'Prestamo Bancario',
            'id_estado' => '1',
        ]);
        DB::table('ingreso_categorias')->insert([
            'descripcion' => 'Prestamo Hipotecario',
            'id_estado' => '1',
        ]);
        DB::table('ingreso_categorias')->insert([
            'descripcion' => 'Venta de Bienes',
            'id_estado' => '1',
        ]);
        DB::table('ingreso_categorias')->insert([
            'descripcion' => 'Inyeccion Capital Propio',
            'id_estado' => '1',
        ]);
   
    }
}
