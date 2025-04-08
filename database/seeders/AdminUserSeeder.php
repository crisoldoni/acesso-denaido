<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $salt = Str::random(16);
        $password = Hash::make('Serafa10' . $salt);

        DB::table('users')->insert([
            'name' => 'Administrador',
            'email' => 'admin@vipinfo.net.br',
            'password' => $password,
            'email_verified_at' => now(),
            'remember_token' => Str::random(10),
            'salt' => $salt, // Salvando o salt no banco
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
