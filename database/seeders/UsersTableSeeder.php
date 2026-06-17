<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('users')->insert([
            [
                'id' => 12,
                'name' => 'Afiq Fitri',
                'email' => 'afiqzuliey@gmail.com',
                'password' => Hash::make('afiq1234'),
                'role' => 'PublicUser',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 13,
                'name' => 'MCMC Admin',
                'email' => 'afiqf330@gmail.com',
                'password' => Hash::make('afiq1234'),
                'role' => 'MCMC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 14,
                'name' => 'JPJ Agency',
                'email' => 'jpj@example.com',
                'password' => Hash::make('password'),
                'role' => 'Agency',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 15,
                'name' => 'Khusnul',
                'email' => 'khusnul.sudjiamin@gmail.com',
                'password' => Hash::make('khusnul1234'),
                'role' => 'PublicUser',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 16,
                'name' => 'MCMC Admin',
                'email' => 'nabilah32@gmail.com',
                'password' => Hash::make('nabilah0532'),
                'role' => 'MCMC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 17,
                'name' => 'PDRM Agency',
                'email' => 'pdrm@example.com',
                'password' => Hash::make('password'),
                'role' => 'Agency',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 18,
                'name' => 'MCMC Admin 2',
                'email' => 'timbpressispa@gmail.com',
                'password' => Hash::make('afiq1234'),
                'role' => 'MCMC',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 19,
                'name' => 'Hana Khawla',
                'email' => 'just.elhana12@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'PublicUser',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 20,
                'name' => 'Luth Hakimi',
                'email' => 'dpcluqmansonata@gmail.com',
                'password' => Hash::make('password'),
                'role' => 'PublicUser',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
