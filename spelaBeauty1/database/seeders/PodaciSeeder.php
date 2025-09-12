<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;


class PodaciSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('podacis')->insert([
            'text' => '<p style="text-align: justify;">&nbsp; &nbsp; &Scaron;pela Beauty studio nastao je iz ogromne ljubavi prema nezi, lepoti i konceptu samoljubavi, tom dobrom osećaju koji proizilazi iz načina života u kojem se negujemo i brinemo o sebi.</p>
<p style="text-align: justify;">&nbsp; &nbsp; Koncept rada prolazio je kroz razne faze, dok nisam prona&scaron;la ono &scaron;to za mene predstavlja savr&scaron;en spoj dobre dijagnostike, odabira metoda i preparata koji će najbolje odgovoriti na problematiiku, kao i na potrebu da svaki tretman u salonu&nbsp; bude i mali spa doživljaj. Tretmanima želim da postignem zdrav i svež prirodan izgled, koristeći prirodne preparate i oslanjajući se na prirodne telesne&nbsp; procese isceljivanja.</p>
<p style="text-align: justify;">&nbsp; &nbsp; Kroz pažljiv odabir prerata i aparata, vodila sam se idejom da svaki tretman bude individualno prilagodjen potrebama va&scaron;e kože ili tela, kako bi ponudio najkvalitetniju&nbsp; uslugu i najbolje rezultate. Kreiranjem sopstvenih protokola omogućavamo svakom klijentu da dobije najkvalitetniju uslugu, koja je prilagodjena va&scaron;im željama i potrebama, ali i da daje najbolje moguće rezultatae u odnosu na stanje kože u trenutku dijagnostike.</p>
<p style="text-align: justify;">&nbsp; &nbsp; Svaki tretman započinjemo sa konsultacijama, na kojima se uradi precizna dijagnostika i sam plan budućih tretmana, sa jasnim ciljem&nbsp; sta želimo sa njima&nbsp; da postignemo.&nbsp; Pored samih terapija, u na&scaron;em salonu dobićete i korisne praktične savete, koji će vam omogućiti da dugo uživate u postignutim rezultatima.</p>
<p style="text-align: justify;">&nbsp;</p>',
            'ulica' => 'Vojislav Vlahovica 10',
            'mesto' => '11550 Lazarevac',
            'kontakt_tel' => '065/60 35 105',
            'podaci_slika_pocetna' => 'IMG_20220316_091040.jpg',
            'profilna_slika' => 'IMG_9850.jpg',
            'description' => 'spela beauty kozmetički salon',
            'keywords' => 'spela, beauty',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
