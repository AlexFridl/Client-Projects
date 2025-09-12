<?php

namespace Database\Seeders;

use App\Models\TipTretmana;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $this->call([
            SlajderSeeder::class,
            PodaciSeeder::class,
            SaradniciSeeder::class,
            TipTretmanSeeder::class,
            TretmanSeeder::class,
            UlogaSeeder::class,
            KorisnikSeeder::class,
            BlogSeeder::class,
            KategorijaSeeder::class,
            PodkategorijaSeeder::class,


        ]);
    }
}
