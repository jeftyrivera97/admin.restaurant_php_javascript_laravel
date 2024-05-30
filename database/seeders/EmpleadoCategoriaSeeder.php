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
            'descripcion' => 'Cocinero',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Mesero',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Bartender',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Cajero',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Aseador',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Guardia de Seguridad',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Administracion',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Gerencia',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Mecanico Supervisor',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Mecanico General',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Mecanico Auxiliar',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Electricista',
        ]);
        DB::table('empleado_categorias')->insert([
            'descripcion' => 'Soldador',
        ]);
    }
}
