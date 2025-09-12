<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TipTretmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tip_tretmanas')->insert([
                    [ 'tt_naziv' => 'Tretmani lica',
                        'tt_status' => 1,
                        'description' => 'tretmani',
                        'keywords' => 'tretman lica',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                    [ 'tt_naziv' => 'Tretmani tela',
                        'tt_status' => 1,
                        'description' => '<p>tretman tela</p>',
                        'keywords' => '<p>tretman tela</p>',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ],
                ]);
    }
}
