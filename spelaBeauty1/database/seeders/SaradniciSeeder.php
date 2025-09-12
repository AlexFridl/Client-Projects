<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SaradniciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('saradnicis')->insert([
                [ 'ime_saradnika' => 'Neki saradnik 3',
                'postavljeno' => '1638321376',
                'putanja_slika' => 'slika2.jpg',
                'status_slika' => 0,
                'created_at' => now(),
                'updated_at' => now()
                ],
                [ 'ime_saradnika' => 'Neki saradnik 4',
                'postavljeno' => '1728754662',
                'putanja_slika' => 'slika4.jpg',
                'status_slika' => 0,
                'created_at' => now(),
                'updated_at' => now()
                ],
                [ 'ime_saradnika' => 'Saradnik 1',
                'postavljeno' => '1638321327',
                'putanja_slika' => 'slika3.jpg',
                'status_slika' => 1,
                'created_at' => now(),
                'updated_at' => now()
                ],
                [ 'ime_saradnika' => 'Saradnik 2',
                'postavljeno' => '1638321312',
                'putanja_slika' => 'slika1.jpg',
                'status_slika' => 1,
                'created_at' => now(),
                'updated_at' => now()
                ],
                [ 'ime_saradnika' => 'Nesto',
                'postavljeno' => '1728753528',
                'putanja_slika' => '1728762576_26922044238_764f87da91_q.jpg',
                'status_slika' => 1,
                'created_at' => now(),
                'updated_at' => now()
                ],
                [ 'ime_saradnika' => 'Nesto 1',
                'postavljeno' => '1728759245',
                'putanja_slika' => '1728762558_4485843349_f911ccd6c6_q.jpg',
                'status_slika' => 1,
                'created_at' => now(),
                'updated_at' => now()
                ],
                [ 'ime_saradnika' => 'Nesto 2',
                'postavljeno' => '1728759437',
                'putanja_slika' => '1728762900_mearlywan.jpg',
                'status_slika' => 1,
                'created_at' => now(),
                'updated_at' => now()
                ],
                [ 'ime_saradnika' => 'Nesto 3',
                'postavljeno' => '1728762869',
                'putanja_slika' => '1728762869_irina-kraskova.jpg',
                'status_slika' => 1,
                'created_at' => now(),
                'updated_at' => now()
                ],
                [ 'ime_saradnika' => 'Nesto 4',
                'postavljeno' => '1728762969',
                'putanja_slika' => '1728762969_mommam-pacharapan.jpg',
                'status_slika' => 1,
                'created_at' => now(),
                'updated_at' => now()
                ],
              ]);


    }
}
