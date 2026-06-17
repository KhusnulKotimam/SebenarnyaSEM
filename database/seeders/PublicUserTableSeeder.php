<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PublicUserTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('publicuser')->insert([
            [
                'id' => 6,
                'user_id' => 12,
                'name' => 'Afiq Fitri',
                'email' => 'afiqzuliey@gmail.com',
                'phone' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 7,
                'user_id' => 15,
                'name' => 'Khusnul',
                'email' => 'khusnul.sudjiamin@gmail.com',
                'phone' => '0987654321',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 8,
                'user_id' => 19,
                'name' => 'Hana Khawla',
                'email' => 'just.elhana12@gmail.com',
                'phone' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'id' => 9,
                'user_id' => 20,
                'name' => 'Luth Hakimi',
                'email' => 'dpcluqmansonata@gmail.com',
                'phone' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
