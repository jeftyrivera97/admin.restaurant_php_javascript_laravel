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
            'name' => 'Gerencia Lunas',
            'email' => 'gerencia.lunas@hotmail.com',
            'password' => Hash::make('Gerencia2024'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Lunas',
            'email' => 'admin.lunas@hotmail.com',
            'password' => Hash::make('Admin2024'),
        ]);
        DB::table('users')->insert([
            'name' => 'Sistema Admin Taller',
            'email' => 'jeftyrivera97@gmail.com',
            'password' => Hash::make('Pontiac2016'),
        ]);
        DB::table('users')->insert([
            'name' => 'Gerencia Taller',
            'email' => 'gerencia.taller@hotmail.com',
            'password' => Hash::make('Gerencia2024'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admin Taller',
            'email' => 'admin.taller@hotmail.com',
            'password' => Hash::make('Admin2024'),
        ]);
    }
}
