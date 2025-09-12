<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class SlajderSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
            DB::table('slajders')->insert([
                [
                    'naslov_slajder' => 'Face',
                    'putanja_slajder' => '1638010959_slajder22.jpg',
                    'sort' => null,
                    'postavljeno' => '1638010959',
                    'status' => 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'naslov_slajder' => 'Naslov',
                    'putanja_slajder' => '1638010977_slajder23.jpg',
                    'sort' => null,
                    'postavljeno' => '1638010977',
                    'status' => 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'naslov_slajder' => 'Naslov 1',
                    'putanja_slajder' => 'bioloski_tretman.png',
                    'sort' => null,
                    'postavljeno' => '1659652102',
                    'status' => 0,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'naslov_slajder' => 'Salon',
                    'putanja_slajder' => 'IMG_20220316_091040.jpg',
                    'sort' => 5,
                    'postavljeno' => '1705260827',
                    'status' => 1,
                    'created_at' => now(),
                'updated_at' => now()
                ],
                [
                    'naslov_slajder' => 'spela beaty 3',
                    'putanja_slajder' => 'IMG_9383.jpg',
                    'sort' => 1,
                    'postavljeno' => '1662929131',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'naslov_slajder' => 'spela_beauty',
                    'putanja_slajder' => 'spela_beauty1.gif',
                    'sort' => 4,
                    'postavljeno' => '1704121665',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'naslov_slajder' => 'spelaBeauty 1',
                    'putanja_slajder' => 'IMG_9385.jpg',
                    'sort' => 3,
                    'postavljeno' => '1662929131',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],
                [
                    'naslov_slajder' => 'spelaBeauty 2',
                    'putanja_slajder' => 'IMG_9702.jpg',
                    'sort' => 3,
                    'postavljeno' => '1701973326',
                    'status' => 1,
                    'created_at' => now(),
                    'updated_at' => now()
                ],

            ]);

    }
}
