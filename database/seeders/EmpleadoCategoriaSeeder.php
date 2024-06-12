<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;



class EmpleadoCategoriaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Administracion',
            'id_estado' => '1',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Aseador',
            'id_estado' => '1',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Ayudante de Cocina',
            'id_estado' => '1',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Bartender',
            'id_estado' => '1',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Cajero',
            'id_estado' => '1',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Cocinero',
            'id_estado' => '1',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Gerencia',
            'id_estado' => '1',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Guardia de Seguridad',
            'id_estado' => '1',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Mesero',
            'id_estado' => '1',
        ]);
      
    }
}
