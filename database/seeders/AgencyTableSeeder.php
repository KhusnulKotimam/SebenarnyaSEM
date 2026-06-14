<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AgencyTableSeeder extends Seeder
{
    public function run(): void
    {
        DB::table('agency')->insert([
            [
                'id' => 5,
                'user_id' => 14,
                'username' => 'JPJDept',
                'phone' => '01133445566',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [
                'id' => 6,
                'user_id' => 17,
                'username' => 'PDRMDept',
                'phone' => '0134276061',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
