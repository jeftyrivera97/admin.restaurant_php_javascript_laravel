<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompraCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Abarroteria',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Alimentos Varios',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Pollos y Carne',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Mariscos',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Bebidas Alcoholicas',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Bebidas no Alcoholicas',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Bebidas Varios',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Herramientas',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Repuestos',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Piezas Vehiculares',
            'id_estado' => '1',
        ]);
    }
}
