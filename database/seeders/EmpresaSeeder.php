<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EmpresaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('empresas')->insert([
            'codigo_empresa' => '0101',
            'descripcion' => 'Lunas Restaurant',
            'razon_social' => 'Inversiones Lunas',
            'direccion' => 'El Porvenir',
            'telefono' => '88996633',
            'correo' => 'lunas@gmail.com',
            'cai' => '025698545',
            'id_estado' => 1,
        ]);

        DB::table('empresas')->insert([
            'codigo_empresa' => '0102',
            'descripcion' => 'Taller Saesa',
            'razon_social' => 'Inversiones Saesa',
            'direccion' => 'La Ceiba',
            'telefono' => '88996633',
            'correo' => 'taller@gmail.com',
            'cai' => '025698545',
            'id_estado' => 1,
        ]);
    }
}
