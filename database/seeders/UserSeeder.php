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
            'email' => 'sistema@rlunas.site',
            'password' => Hash::make('Jriver@1997'),
        ]);
        DB::table('users')->insert([
            'name' => 'Victor Guevara Lunas Restaurant',
            'email' => 'gerencia@rlunas.site',
            'password' => Hash::make('G3r3nc1@.2024'),
        ]);
        DB::table('users')->insert([
            'name' => 'Admininistracion Lunas',
            'email' => 'admin@rlunas.site',
            'password' => Hash::make('@dm1n.2024'),
        ]);
      
    }
}
