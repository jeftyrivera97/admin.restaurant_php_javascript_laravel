<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class EstadoCuentaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('estado_cuentas')->insert([
            'descripcion' => 'Pagado',
        ]);
        DB::table('estado_cuentas')->insert([
            'descripcion' => 'Por Pagar',
        ]);
    }
}
