<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class PodkategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('podkategorijas')->insert([
            [   'podkat_naziv' => 'Špela pure',
                'tekst_podkat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Tretman je<span style="mso-spacerun: yes;">&nbsp; </span>kreiran tako, da odgovara na različite problematike kože, individualno se prilagodjavajući potrebama stanja svake kože ponaosob. Tretman objedinjuje vi&scaron;e metoda či&scaron;ćenja i ishrane kože. Kombinovan tretman lica koji objedinjuje higijenski tretman, ultrazvučnu &scaron;patulu ili<span style="mso-spacerun: yes;">&nbsp; </span>hidrodermo abraziju, oxy tretman za oksigenizaciju kože, ultrazvučnu aplikaciju seruma, masažu, masku i Led terapiju. U odnosu na potrebe kože, tretman možemo unaprediti sa hemijskim pilingom I odabirom dodatne maske iz Esthemax linije.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">Trajanje tretmana :70 min</p>',
                'slika_putanja' => null,
                'cena' => null,
                'kategorija_id' => 100,
                'podkat_status' => 1,
                'description' => 'Podkategorija Špela pure',
                'keywords' => 'Špela pure, tretman lica, podkategorija',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'podkat_naziv' => 'Nesto Podkategorija 1',
                'tekst_podkat' => 'freestar What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'slika_putanja' => null,
                'cena' => 1111,
                'kategorija_id' => 101,
                'podkat_status' => 1,
                'description' => 'Nesto Podkategorija 1',
                'keywords' => 'Nesto Podkategorija 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [   'podkat_naziv' => 'Nesto Podkategorija 2',
                'tekst_podkat' => 'freestar What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'slika_putanja' => null,
                'cena' => 1111,
                'kategorija_id' => 101,
                'podkat_status' => 1,
                'description' => 'Nesto Podkategorija 2',
                'keywords' => 'Nesto Podkategorija 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'podkat_naziv' => 'Nesto podkategorija 3 / 1 / 1',
                'tekst_podkat' => null,
                'slika_putanja' => null,
                'cena' => 1111,
                'kategorija_id' => 79,
                'podkat_status' => 1,
                'description' => 'Nesto Podkategorija  3 / 1 / 1',
                'keywords' => 'Nesto Podkategorija  3 / 1 / 1',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'podkat_naziv' => 'Nesto podkategorija 3 / 1 / 2',
                'tekst_podkat' => null,
                'slika_putanja' => null,
                'cena' => 1111,
                'kategorija_id' => 79,
                'podkat_status' => 1,
                'description' => 'Nesto Podkategorija  3 / 1 / 2',
                'keywords' => 'Nesto Podkategorija  3 / 1 / 2',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'podkat_naziv' => 'Nesto podkategorija 3 / 1 / 3',
                'tekst_podkat' => null,
                'slika_putanja' => null,
                'cena' => 1111,
                'kategorija_id' => 79,
                'podkat_status' => 1,
                'description' => 'Nesto Podkategorija  3 / 1 / 3',
                'keywords' => 'Nesto Podkategorija  3 / 1 / 3',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
