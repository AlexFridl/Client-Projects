<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UlogaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('ulogas')->insert([
            [   'naziv' => 'admin',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'naziv' => 'bloger',
                'status' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
