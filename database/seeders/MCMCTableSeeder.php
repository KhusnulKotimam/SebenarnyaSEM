<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MCMCTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('mcmc')->insert([
            [
                'id' => 3,
                'user_id' => 13,
                'username' => 'mcmcadmin',
                'phone' => '01130484877',
                'created_at' => now(),
<<<<<<< HEAD
                'updated_at' => now()
=======
                'updated_at' => now(),
>>>>>>> 166a25068c7a561ace6de0c58664ae6b6e362d59
            ],
            [
                'id' => 4,
                'user_id' => 16,
                'username' => 'mcmcadmin2',
<<<<<<< HEAD
                'phone' => '0134276160',
                'created_at' => now(),
                'updated_at' => now()
=======
                'phone' => '0123456789',
                'created_at' => now(),
                'updated_at' => now(),
>>>>>>> 166a25068c7a561ace6de0c58664ae6b6e362d59
            ],
        ]);
    }
}
