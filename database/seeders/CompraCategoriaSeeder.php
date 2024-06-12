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
            'descripcion' => 'Compra de Alimentos y Bebidas Varios',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Lacteos',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Pollos y Carne',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Pollos',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Carnes',
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
            'descripcion' => 'Compra de Bebidas Gaseosas',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Bebidas Varias',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Granos',
            'id_estado' => '1',
        ]);
        DB::table('compra_categorias')->insert([
            'descripcion' => 'Compra de Articulos de Limpieza y Aseo',
            'id_estado' => '1',
        ]);

    }
}
