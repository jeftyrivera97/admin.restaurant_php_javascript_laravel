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
            'name' => 'Sistema Lunas Restaurant',
            'email' => 'sistema@lunas.site',
            'password' => Hash::make('Jriver@1997'),
        ]);
        DB::table('users')->insert([
            'name' => 'Victor Guevara Lunas Restaurant',
            'email' => 'gerencia@lunas.site',
            'password' => Hash::make('G3r3nc1@.2024'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admininistracion Lunas',
            'email' => 'admin@glunas.site',
            'password' => Hash::make('@dm1n7u@s.2024'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sistema Taller Taesa',
            'email' => 'sistema@taesa.site',
            'password' => Hash::make('Jriver@1997'),
        ]);
        DB::table('users')->insert([
            'name' => 'Victor Guevara Lunas Restaurant',
            'email' => 'gerencia@taesa.site',
            'password' => Hash::make('G3r3nc1@.2024'),
        ]);
        DB::table('users')->insert([
            'name' => 'Administracion Taller Taesa',
            'email' => 'admin@taesa.site',
            'password' => Hash::make('G3r3n1@.2024'),
        ]);
    }
}
