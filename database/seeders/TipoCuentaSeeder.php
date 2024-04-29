<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TipoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('tipo_cuentas')->insert([
            'descripcion' => 'Contado',
        ]);
        DB::table('tipo_cuentas')->insert([
            'descripcion' => 'Credito',
        ]);
    }
}
