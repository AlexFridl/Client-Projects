<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class KategorijaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
          DB::table('kategorijas')->insert([
            [   'kat_naziv' => 'Nesto kategorija 3 / 1',
                'text_kat' => null,
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => 1111,
                't_id'  => 14,
                'description'  => 'lorem ipsum',
                'keywords'  => 'lorem ipsum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Nesto kategorija 3 / 2',
                'text_kat' => null,
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => 1111,
                't_id'  => 14,
                'description'  => 'lorem ipsum',
                'keywords'  => 'lorem ipsum',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Ultrazvučna lipoliza',
                'text_kat' => '<p a="MsoListParagraph" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp;Ultrazvučna lipoliza ili kavitacija je aparaturni tretman oblikovanja tela, koji je namenjen mr&scaron;avljenju i eliminaciji celulita, odnosno topljenju lokalizovanih masnih naslaga. Ovaj<span style="mso-spacerun: yes;">&nbsp; </span>relativno novi estetski tretman uz pomoć napredne tehnologije<span style="mso-spacerun: yes;">&nbsp; </span>pretvara masne ćelije u tečnost, koje se zatim mogu prirodno izbaciti iz tela. Na&scaron; terapeut će uz pomoć specijalno dizajnirane sonde tretirati odredjene kritične zone tela. Sonda prilikom kontakta sa kožom prenosi ultrazvučnetalase niske frekvencije, koji prave osećaj blagog pritiska na povr&scaron;inu koju tretiramo. Ovom metodom se stvaraju mikro-&scaron;upljine (kavitacije) ili mikro mehurići i na taj način se masne kapi pretvaraju u sitne kapljice, koje se potom lako elimini&scaron;u iz tela.</span></p>
<p class="MsoListParagraph" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">&nbsp;</p>
<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp; &nbsp; Uz pomoć kavitacije postiže se razgradnje masnih ćelija, odvajanje i rastvaranje masti, smanjivanje masnih elemenata, pobolj&scaron;anje kvaliteta protoka i cirkulacije tkiva. Posebno je efikasna za smanjenje masnih naslaga na stomaku, kolenimaa, butinama, bokovima, zadnjici i rukama. Tretman obuhvata kavitaciju izabrane regije, aparaturu vakum terapiju i limfnu drenažu.&nbsp;</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp; &nbsp; &nbsp; Tretman kavitacije traje 40 minuta, ukoliko tretiramo samo jednu regiju. Između dva tretmana jedne regije potrebno je da prođe 72 sata, tako da telo može efikasno eliminisati masti. Serija tretmana podrazumeva maksimalno 6 tretmana, nakon čega je neophodno napraviti pauzu od mesec dana. </span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Tretman je bezbolan i prijatan.&nbsp;</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 1,
                'description'  => '<p>ultrazvučna lipoliza</p>',
                'keywords'  => '<p>ultrazvučna lipoliza</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Radiotalasni lifting tela',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Radiotalasni liftig je aparaturna metoda zagrevanja sredi&scaron;njeg sloja kože, čime se postiže sinteza kolegena i elastina, &scaron;to dovodi do snažnog<span style="mso-spacerun: yes;">&nbsp; </span>zatezanja kože leta. </span>Pored zatezanja kože ovom metodom se:</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;"><span style="mso-list: Ignore;">&middot;<span style="font: 7.0pt "Times New Roman";">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]-->razgrađuju masne naslage</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;"><span style="mso-list: Ignore;">&middot;<span style="font: 7.0pt "Times New Roman";">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span style="mso-spacerun: yes;">&nbsp;</span>oblikuje telo</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;"><span style="mso-list: Ignore;">&middot;<span style="font: 7.0pt "Times New Roman";">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]-->razgrađuje celulit</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;"><span style="mso-list: Ignore;">&middot;<span style="font: 7.0pt "Times New Roman";">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]-->zateže koža nakon mr&scaron;avljenja</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;"><span style="mso-list: Ignore;">&middot;<span style="font: 7.0pt "Times New Roman";">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]-->povećava elastičnot kože</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">&nbsp;</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify; line-height: normal;">Zatezanje kože se vrlo često nameće kao potreba kod klijenata, naročito nakon gubitka kilograma i većeg smanjenja obima tela. <span lang="ES" style="mso-ansi-language: ES;">Sa godinama se proces stvaranja kolagena usporava i koža gubi svoju elastičnost. Zato je jako važno o tome voditi računa i sprečiti posledice primenom odgovarajućih tretmana. Radiotalasni lifting za zatezanje tela predstavlja primenu visokofrekventne struje sa ciljem stimulacije kolagena, ubrzanja ćelijskog metabolizma i izazivanja lipolitičkog efekta. Kao odgovor na to zagrevanje dolazi do obnavljanja i učvr&scaron;ćivanja ovih vlakana.</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify; line-height: normal;"><span lang="ES" style="mso-ansi-language: ES;">Kome je namenjen?</span></p>
<p class="MsoNormal" style="text-align: justify; line-height: normal;"><span lang="ES" style="mso-ansi-language: ES;">Radiotalasni lifting je namenjen svim osobama koje žele da na komforan i neinvazivan način efikasno zategnu opu&scaron;tenu kožu stomaka butina, nadlaktica, predela oko kolena, kao i za podizanje zadnjice. Uspe&scaron;no se koristi i u sklopu programa za reoblikovanje tela i smanjenje obima. Tretman je bezbolan i prijatan, bez neželjenih efekata, tako da se nesmetano možete vratiti uobičajenim dnevnim aktivnostima neposredno nakon njegovog izvođenja. Za optimalne rezultate savetuje se 6 do 8 ponavljanja u razmacima od pet do sedam dana. Rezultati su vidljivi već nakon prvog, a treba naglasiti da tretman ima kumulativno dejstvo i da se pun efekat vidi posle mesec dana.</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 1,
                'description'  => '<p>radiotalasni lifting tela</p>',
                'keywords'  => '<p>radiotalasni lifting tela</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Radiotalasna vakum terapija',
                'text_kat' => '<p><span lang="ES" style="mso-ansi-language: ES;">&nbsp; &nbsp; &nbsp;Tretman radiotalasnim vakumom primenjuje se za razgradnju celulita i za aparaturnu limfnu drenažu tela, koja je neophdna u svakom procesu mr&scaron;avljenja, jer podstiče izbacivanje masnoća i toksina iz tela. Radiotalasi dopiru do 3 cm ispod kože, efikasno razbijajući dubinski celulit. Istovremeno, vakum na aparaturi, nežno odiže deo kože od podkožnog masnog tkiva, pojačava prokrvljenost tretiranog dela i time utiče na smanjenje i eliminaciju masnih naslaga.&nbsp;</span></p>
<p><span lang="ES" style="mso-ansi-language: ES;">&nbsp; &nbsp; &nbsp;Ovim tretmanom pobolj&scaron;avamo mikrocirkulaciju, zatežemo kožu, vraćamo tonus tkivu, podižemo zadnjicu, smanjujemo celulit i postižemo oblikovanje butine i zadnjice. </span>Tretman se može ponavljati 2 do 3 puta nedeljno.</p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 1,
                'description'  => '<p>radiotalasni vakul terapija</p>',
                'keywords'  => '<p>radiotalasni vakul terapija</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Mezoterapija tela',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Mezoterapija bez igle je savremena, neinvazivna i klinički testirana metoda za negu tela, kojom je omogućeno ubacivanje aktivnih supstanci duboko u slojeve kože i potkožno tkivo kori&scaron;ćenjem postupka mezoporacije. Na ovaj način se direktno usmeravaju supstance neophodne za lečenje kože, negu i bolje funkcionisanje. Njihova penetracija je vi&scaron;estruko veća od penetracije kozmetičkih preparata kada se oni nanose utrljavanjem u kožu. Utvrđeno je da kod takvog nano&scaron;enja preparata, kao i kod primene dosada&scaron;njih biolo&scaron;kih tretmana, svega oko 10 % aktivne supstance prodire u dublje slojeve kože. Mezoterapija bez igle međutim omogućava da se apsorpcija primenjenih aktivnih supstanci (L- karnitina, kofeina i ostalih biostimulanasa) poveća i do 99% na dubini do 1 cm, odnosno do 65% na dubini do 6 cm, &scaron;to pruža zaista izvanredne mogućnosti u različitim estetskim tretmanima.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">U donosu na izabrani mezo koktel mezoterapijom možemo postići vi&scaron;estruke rezultate.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">PRIMENA:</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; redukcija celulita</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; mr&scaron;avljenje</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; smanjenje obima</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; zatezanje opu&scaron;tene kože</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">PREDNOSTI MEZOPORACIJE:</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; neinvazivna je i potpuno je bezbolna</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; nema podliva, modrica ni otoka, niti potrebe za anesteticima</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; nema rizika od infekcije</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; penetracija aplikovanih supstanci je mnogostruko veća</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; aktivne supstance se unose ravnomerno u kožu</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Kontraindikacije:</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; trudnoća</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; laktacija &bull; vaskularne bolesti</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; kožne bolesti u fazi pogor&scaron;anja</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 1,
                'description'  => '<p>mezoterapija tela</p>',
                'keywords'  => '<p>mezoterapija tela</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Špela slim',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto;"><span lang="ES" style="mso-ansi-language: ES;">&Scaron;pela Slim je kombinovani tretman oblikovanja tela koji objedinjuje <span style="mso-spacerun: yes;">&nbsp;</span>sve tri aparaturne metode u jedan tretman. Namenjen je mr&scaron;avljenju, oblikovanju tela, redukciji celulita, ali ima i vi&scaron;estruke benefite na lepotu kože i detoksikaciju tela.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto;"><span lang="ES" style="mso-ansi-language: ES;">Tretman obuhvata kavitaciju, radiotalasnu vakum terapiju, radiotalasni lifiting i ručnu limfnu drenažu. </span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto;"><span lang="ES" style="mso-ansi-language: ES;">Tretman se ponavlja jednom nedeljno i može se uraditi maksimalno 6 tretmana, nakon čega se odredjuje pauza od mesec dana. </span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto;"><span lang="ES" style="mso-ansi-language: ES;">Rezultati ovog tretmana su izuzetno efektivni i odmah vidljivi. </span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 1,
                'description'  => '<p>spela slim</p>',
                'keywords'  => '<p>spela slim</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Body Shock',
                'text_kat' => '<p class="MsoNormal"><span lang="ES" style="mso-ansi-language: ES;">Body shock je efektivan medicinsko - kozmetički tretman oblikovanja tela, zasnovan na dugogodi&scaron;njem <span style="mso-spacerun: yes;">&nbsp;</span>naučnom istraživanju. Njegova prednost nakon zavr&scaron;ene serije tretmana je postojanost rezultata. </span></p>
<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Bodyshock tretman, profesionalne kozmetičke kuće MESOESTETIC je zaseban tretman koji deluje sa 4 bustera.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">U jednom tretmanu možemo delovati na:</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">*topljenje masnih naslaga</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">*detoksikaciju</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">*drenažu - izbacivanje tečnosti iz organizma</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">*redukciju celulita</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">*redukciju celulita</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">*zatezanje kože</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Regije koje tretiramo Bodyshokom su :</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Stomak, ledja, noge, zadnica, podbradak, ruke I grudi .</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Svojim visoko koncentrisanim sastojcima kombinacije bustera deluje na zatezanje i oblikovanje.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; Tretman je individualan, nakon konsultacije i odabira cilja zapocinje se sa tretmanom.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; Tretman traje 60 min. Prva etapa u izvodjenju Body shock tretmana jeste aplikacija Exfoliator gela koji se nanosi na tretiranu regiju i time se vr&scaron;i piling u cilju uklanjanja povr&scaron;nih mrtvih ćelija kože, kako bi se omogućio bolji prodor narednih aktivnih supstanci za određenu problematiku. </span>(10 min).</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">&bull; Druga etapa jeste odabir boostera shodno problematici i pravljenje koktela. (liolytic booster, draining booster, firming booster, stretchmarks booster).</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; Naredna etapa jeste da napravljeni booster ravnomerno aplikujemo na tretiranu regiju pokretima anticelulit masaže (20 min).</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; Nakon masaže sledeća etapa podrazumeva nano&scaron;enje maske, koja može biti za preoblikovanje tela i za zatezanje (remodelling mask, tightening mask). Gde se klijent umota u foliju i maska se drži 20 min.</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&bull; Poslednja etapa u izvođenju Body shock tretmana jeste nano&scaron;enje Intensifying cream-a koja omogućava produženo delovanje svih nanetih komponenti u toku izvođenja Body shock tretmana.</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 2,
                'description'  => '<p>body shock</p>',
                'keywords'  => '<p>body shock</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Body Reshape',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">Body Reshape je najefektivni tretman oblikovanja tela u na&scaron;em salonu. Objedinjuje Body Shock tretman i aparaturne procedure. <span lang="ES" style="mso-ansi-language: ES;">Rade se dva tretmana nedeljno. Prednost ovog tretmana je ta, da je u potpunosti individualan, pa se tako prilagodjava potrebama va&scaron;eg tela u trenutku tretmana. Obody Reshapeom postižemo vi&scaron;estruke benefite, pa tako u jednoj seriji možemo raditi na mr&scaron;avljenju, anticelulitu, zatezanju kože i detoksikaciji. </span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Rezultati su postojani nakon serije tretmana. Kako bi postignuti rezultati bili dugoročni, preporučujemo tretman održavanja jednom na dva meseca.</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 2,
                'description'  => '<p>Body Reshape</p>',
                'keywords'  => '<p>Body Reshape</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Vakum Fit',
                'text_kat' => '<p class="MsoListParagraph" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">Vacuum FIT 100 je formula za smanjenje celulita i obima. <span lang="ES" style="mso-ansi-language: ES;">Za 12 tretmana moguće je velika redukcija u obimu. </span>Vacuum FIT 100 će vam pomoći da izbacite vi&scaron;ak vode, toksine, smanjite santimetre a samin tim i obim. Koža je nakon tretmana glatka i zategnuta. Po zavr&scaron;etku potrebno je odraditi manuelni limfnu drenažu. <span lang="ES" style="mso-ansi-language: ES;">Tretman traje 45 minuta. Rezultati su vidljivi odmah nakon tretmana.</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 2,
                'description'  => '<p>Vakum Fit</p>',
                'keywords'  => '<p>Vakum Fit</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Relax masaža parcijalna',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Blaga i opu&scaron;tajuća</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; line-height: normal; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Antistres</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Masaža leđa, vrata i ramena ili masaža nogu</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 5,
                'description'  => '<p>Relax masaža parcijalna</p>',
                'keywords'  => '<p>Relax masaža parcijalna</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Relax masaža celo telo',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Blaga i opu&scaron;tajuća</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Antistres</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Na&scaron;a preporuka!</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 5,
                'description'  => '<p>Relax masaža celo telo</p>',
                'keywords'  => '<p>Relax masaža celo telo</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Terapeutska masaža',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Ublažuje i otklanja bolove u mi&scaron;ićima</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Masaža leđa, vrata i ramena ili masaža nogu</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 5,
                'description'  => '<p>Terapeutska masaža</p>',
                'keywords'  => '<p>Terapeutska masaža</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Sportska masaža',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;">Za sportiste I rekreativce,</p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Saniranje povreda,opu&scaron;tanje mi&scaron;ića i priprema mi&scaron;ića za napor</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 5,
                'description'  => '<p>Sportska masaža</p>',
                'keywords'  => '<p>Sportska masaža</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Masaže oklagijama',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;">Za sportiste I rekreativce,</p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Saniranje povreda,opu&scaron;tanje mi&scaron;ića i priprema mi&scaron;ića za napor</span></p>',
                'k_status' => 1,
                'slika_putanja' => 'IMG_9864.jpg',
                'cena'  => null,
                't_id'  => 5,
                'description'  => '<p>Masaže oklagijama</p>',
                'keywords'  => '<p>Masaže oklagijama</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Aromaterapija',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Terapeutska masaža aromatičnim uljima</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Masaža vrata, leđa i ramena</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 5,
                'description'  => '<p>Aromaterapija</p>',
                'keywords'  => '<p>Aromaterapija</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Refleskologija stopala',
                'text_kat' => '<p>Refleskologija stopala</p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 5,
                'description'  => '<p>Refleskologija stopala</p>',
                'keywords'  => '<p>Refleskologija stopala</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Limfna drenaža',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Detoks organizma</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Eliminacija toksina</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Stimulacija metabolizma</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Izbacivanje vi&scaron;ka vode</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Opu&scaron;tanje</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; tab-stops: 4.5pt;"><span lang="ES" style="mso-ansi-language: ES;">Antistres</span></p>',
                'k_status' => 1,
                'slika_putanja' => 'IMG_9759.jpg',
                'cena'  => null,
                't_id'  => 5,
                'description'  => '<p>Limfna drenaža</p>',
                'keywords'  => '<p>Limfna drenaža</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Osnovni ili higijenski tretman',
                'text_kat' => '<p><p class="MsoNormal" style="text-align: justify;">Osnovni tretman je tretman na kojem se upoznajemo, ali i procedura, koju ponavljamo kada je koži potrebno mehaničko či&scaron;ćenje pora.</p>
<p class="MsoNormal" style="text-align: justify;">Tretman započinjemo sa pregledom kože, nakon čega uradimo dijagnostiku uz pomoć aparata za analizu kože, koji nam omogućava da precizno utrvrdimo mno&scaron;tvo parametra, koji utiču na zdravlje i lepotu kože. Svi podatci o stanju va&scaron;e kože čuvaju se u va&scaron;em kartonu, &scaron;to nam kasnije omogućava da detaljno <span style="mso-spacerun: yes;">&nbsp;</span>sagledate napredak koji postižemo.</p>
<p class="MsoNormal" style="text-align: justify;">Tretman nastavljamo sa razgovorom o va&scaron;im navikama i preparatima vezanim za kućnu negu, dosada&scaron;njim iskustvima u tretmanima lica, kao i o spolja&scaron;njim i unutra&scaron;njim faktorima koji su dominantni u va&scaron;em životu, a mogu da utiču na stanje va&scaron;e kože.<span style="mso-spacerun: yes;">&nbsp; </span>U na&scaron;em salonu praktikujemo holistički pristup tretiranja kože, pa nam detaljna analiza svih faktora, koji mogu da utiču na njeno stanje, omogućava da ustanovimo precizan plan i dinamiku tretmana, kako bi rezultati bili &scaron;to efektivniji.</p>
<p class="MsoNormal" style="text-align: justify;">Ukoliko postoji potreba, napravićemo izmene u va&scaron;oj kućnoj nezi i preporučuti vam profesionalne preparate, koji će u kombinaciji sa tretmanima koje radimo, znatno unaprediti zdravlje i izgled va&scaron;e kože.</p>
<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Svaki tretman je individualan i prilagodjava se trenutnom stanju va&scaron;e kože, u smislu odabira preparata i metoda<span style="mso-spacerun: yes;">&nbsp; </span>koje primenjujemo u<span style="mso-spacerun: yes;">&nbsp; </span>toku tretmana. </span></p>
<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Osnovni tretman obuhvata pripremu i omek&scaron;avanje kože, mehaničko či&scaron;ćenje, aparaturnu dezinfekciju nakon či&scaron;ćenja,dva pilinga, masku i Led terapiju. </span></p>
<p class="MsoNormal" style="text-align: justify;">Trajanje tretmana : 60-90 min</p>
<p class="MsoNormal" style="text-align: justify;">&nbsp;</p>
<p class="MsoNormal" style="text-align: justify;">BEAUTY PUTOKAZ <span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span></p>
<p class="MsoNormal" style="text-align: justify;"><span style="mso-spacerun: yes;">&nbsp;</span>Higijenski tretman nije najprijatniji tretman, koji čete raditi u kozmetičkom salonu, ali je obavezan i neophodan. <span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span> Nakon klasičnog higijenskog tretmana nemojte očekivati wow efekat, jer je cilj tretmana prvenstveno skoncentrisan na či&scaron;ćenje kože. <span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span> <span lang="ES" style="mso-ansi-language: ES;">Sama komedokspresija predstavlja odredjenu vrstu traume za kožu, pa se tretiraju samo one promene koje su u tom trenutku zrele za cedjenje. Sprovodi se tako, da se &scaron;to manje o&scaron;tečuje okolno tkivo. </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Nemojte zameriti ako sa tretmana izadjete sa nekom bubuljicom na licu, Procenila sam da nije spremna za istiskanje ili da će je kućna nega razgraditi, pa tako nema potrebe za traumatizacijom tkiva. </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Komedoeskpresija se ne sme raditi u kućnim uslovima, jer može dovesti do pogor&scaron;anja stanja kože. Zadatak kozmetičara je da proceni, koje akne su dostigle zrelost koja je neophodna za intervenciju. </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Cilj svakog tretmana je pobolja&scaron;nje trenutnog stanja kože. Rezultati tretmana su usko povezani sa redovnim sprovodjenjem pravilne kućne nege. </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Klasičan higijenski tretman možemo kombinovati sa hidrodermo abrazijom, ultrazvučnm &scaron;patulom, enzimskim ili hemijskim pilingom,aparaturnom ili manuelnom ishranom kože. Led terapijom i odabirom dodatnih maski.</span></p></p>',
                'k_status' => 1,
                'slika_putanja' => 'IMG_9517.jpg',
                'cena'  => null,
                't_id'  => 3,
                'description'  => '<p>Osnovni ili higijenski tretman</p>',
                'keywords'  => '<p>Osnovni ili higijenski tretman</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Hidroderma abrazija',
                'text_kat' => '<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Hidrodermo abrazija je aparaturni tretman či&scaron;ćenja kože i predstavlja najnoviju hidro tehnologiju, koja uz pomoć vode i hidrofilnih seruma, bezbolno čisti, hidrira, detoksikuje i pilinguje kožu. Dakle, ova procedura je mnogo vi&scaron;e od samog či&scaron;ćenja kože. </span></p>
<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Ovom metodom postižemo neivanzivno či&scaron;ćenje kože ,fonikula, pora I mitisera, uklanjanje izumrlih ćelija sa povr&scaron;ine kože, ujednačavanje tena, kao I dubinsku hidrataciju I oksigenizaciju kože.</span></p>
<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Tretman obuhvata pripremu kože sa Esthemax enzimskim pilingom,aparaturnu limfnu drenažu lica, vrata I dkoleta, hidrodremo či&scaron;ćenje kože, hidroinfuziju seruma, tretman kiseonikom, krem masku po potrebama kože ili Esthemax peel off masku za dubinsku hidrataciju I ishranu kože. Tretman zaključujemo sa blagom masažom lica I nano&scaron;enjem spf kreme. </span></p>
<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Trajanje tretmana : 50 min</span></p>
<p class="MsoNormal" style="text-align: justify;">&nbsp;</p>
<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Beauty putokaz - hydrodermo abrazija </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span></p>
<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Tretman se može kombinovati sa, higijenskim tretmanom, ultrazvučnom &scaron;patulom, hemijskim pilingom,aparaturnom ili manuelnom ishranom kože, Led terapijom i odabirom dodatnih maski. </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Nežan i efikasan tretman,sa kojim možemo postići finu blistavost kože. </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Efektivan tretman či&scaron;ćenja za one kože, čije pore nisu znatno ispunjene sadržajem, pa tako nije potreban higijenski tretman.</span></p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 3,
                'description'  => '<p>Hidroderma abrazija</p>',
                'keywords'  => '<p>Hidroderma abrazija</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Ultrazvučna špatula',
                'text_kat' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">Tretman ultrazvućnom &scaron;patulom predstvalja metodu ultrazvučnog či&scaron;ćenja i ishrane kože. Ova metoda može biti samostalna ili u okviru bilo kog kozmetičkog tretmana. Ukoliko se radi samostalno, možemo postići sledeće efekte:</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">* Či&scaron;ćenje povr&scaron;inskog sloja kože</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span style="mso-spacerun: yes;">&nbsp;</span><span lang="ES" style="mso-ansi-language: ES;">* Či&scaron;čenje mitisera i sebuma iz pora </span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">* Glačanje kože - ujednačavanje tena </span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">* Uno&scaron;enje aktivnih sastojaka u kožu</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;"><span style="mso-spacerun: yes;">&nbsp;</span>Prednost ultrazvučne &scaron;patule je ta, &scaron;to skračuje vreme klasičnog tretmana, čini ga manje bolnim i prijatnijim za klijenta. Prilikom izvačenja mitisera ultrazvukom, koža reaguje blagim crvenilom, koje nestaje nakon pola sata ili vec nakon maske za smirivanje kože. *Izuzetno efektivna metoda za ishranu kože sa aktivnim supstancama.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Tretman obuhvata pripremu kože, ultrazvučno či&scaron;ćenje kože, ultrazvučnu aplikaciju Juliet Armand seruma, krem masku I Led terapiju </span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Trajanje tretmana : 40 min</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;"><span style="mso-spacerun: yes;">&nbsp;</span>BEAUTY PUTOKAZ </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Preporučujem ga svim osobama koje su osetljive na ručno istiskanje mitisera. </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Nakon tretmana odmah je primetan blic efekat , zato predstavlja pametan odabir, kada želite da osvežite kožu pre nekog bitnog dogadjaja. </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Koža odmah nakon tretmana bude jedrija, lep&scaron;a, zdravijeg izgleda. </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Izuzetno efikasna dopunska procedura koja se može uključiti uz skoro sve ostale tretmane. </span><span style="font-family: Symbol; mso-ascii-font-family: Calibri; mso-ascii-theme-font: minor-latin; mso-hansi-font-family: Calibri; mso-hansi-theme-font: minor-latin; mso-char-type: symbol; mso-symbol-font-family: Symbol;"><span style="mso-char-type: symbol; mso-symbol-font-family: Symbol;">&middot;</span></span><span lang="ES" style="mso-ansi-language: ES;"> Za ovaj tretman ne postoje kontraidikacije.</span></p>',
                'k_status' => 1,
                'slika_putanja' => 'IMG_9469.jpg',
                'cena'  => null,
                't_id'  => 3,
                'description'  => '<p>Ultrazvučna špatula</p>',
                'keywords'  => '<p>Ultrazvučna špatula</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Kombinovani tretmani čišćenja i ishrane kože',
                'text_kat' => '<p>Kombinovani tretmani osmi&scaron;ljeni su tako&nbsp; da spajaju različite procedure či&scaron;ćenja i ishrane lica kako bi unapredili efektivnost tretmana i odgovorili na vi&scaron;e potreba kože u jendom samom tretmanu. Prednost ovakvih tretmana su bolji rezultati jer delujemo na vi&scaron;e različitih probelmatika u jednom samom tretmanu, kao i znatno niža cena tretmana u odnosu na to kada bi svaki od tretmana radili zasebno.&nbsp;</p>',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => null,
                't_id'  => 3,
                'description'  => '<p>Kombinovani tretmani čišćenja i ishrane kože</p>',
                'keywords'  => '<p>Kombinovani tretmani čišćenja i ishrane kože</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Nesto Kategorija 1',
                'text_kat' => 'What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => 1111,
                't_id'  => 13,
                'description'  => '<p>lorem impsum</p>',
                'keywords'  => '<p>lorem ipsum</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Nesto Kategorija 2',
                'text_kat' => 'What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.',
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => 1111,
                't_id'  => 13,
                'description'  => '<p>lorem impsum</p>',
                'keywords'  => '<p>lorem ipsum</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
             [   'kat_naziv' => 'Nesto kategorija 3 / 1',
                'text_kat' => null,
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => 1111,
                't_id'  => 14,
                'description'  => '<p>lorem impsum</p>',
                'keywords'  => '<p>lorem ipsum</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [   'kat_naziv' => 'Nesto kategorija 3 / 2',
                'text_kat' => null,
                'k_status' => 1,
                'slika_putanja' => null,
                'cena'  => 1111,
                't_id'  => 14,
                'description'  => '<p>lorem impsum</p>',
                'keywords'  => '<p>lorem ipsum</p>',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
