<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ProductoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Abarroteria',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Agua',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Alimentos Congelados',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Bebida Alcoholica',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Bebida Energetica',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Bebida Gaseosa',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Bebida Natural',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Cafe',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Carnes',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Cererales',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Dulces',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Frutas',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Frutas',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([  
            'descripcion' => 'Granos',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Heladeria',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Higiene',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Huevos',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Lacteos',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Limpieza',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Mariscos',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Panaderia',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Pasteleria',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Pollo',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Quesos',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Organicos',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Snacks',
            'id_estado' => '1',
        ]);
        DB::table('producto_categorias')->insert([
            'descripcion' => 'Verduras',
            'id_estado' => '1',
        ]);
    }
}
