<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KorisnikSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('korisniks')->insert([
            [   'korisnicko_ime' => 'alex',
                'lozinka' => 'e10adc3949ba59abbe56e057f20f883e',
                'status' => 1,
                'uloga_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'korisnicko_ime' => 'bloger',
                'lozinka' => 'b59c67bf196a4758191e42f76670ceba',
                'status' => 0,
                'uloga_id' => 2,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'korisnicko_ime' => 'Spela',
                'lozinka' => 'b59c67bf196a4758191e42f76670ceba',
                'status' => 1,
                'uloga_id' => 1,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
