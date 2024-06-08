<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('users')->insert([
            'name' => 'Sistema Admin Lunas',
            'email' => 'jeftyrivera97@hotmail.com',
            'password' => Hash::make('Pontiac2016'),
        ]);
        DB::table('users')->insert([
            'name' => 'Victor Guevara',
            'email' => 'gerencia@taesa.site',
            'password' => Hash::make('G3r3nc1@.2024'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admininistracion Lunas',
            'email' => 'admin@glunas.site',
            'password' => Hash::make('@dm1n7u@s.2024'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sistema Admin Taller',
            'email' => 'jeftyrivera97@gmail.com',
            'password' => Hash::make('Pontiac2016'),
        ]);
        DB::table('users')->insert([
            'name' => 'Victor Guevara',
            'email' => 'gerencia@taesa.site',
            'password' => Hash::make('G3r3nc1@.2024'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Taller Taesa',
            'email' => 'gerencia@taesa.site',
            'password' => Hash::make('G3r3n1@.2024'),
        ]);
    }
}
