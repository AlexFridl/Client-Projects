<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class TretmanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('tretmans')->insert([
            [   't_naziv' => 'Aparaturni tretmani tela',
                'text_tretman' => null,
                't_status' => 1,
                'tt_id' => 7,
                'putanja_slika'  => null,
                'cena' => 1111,
                'description' => '<p>aparaturni tretmani tela</p>',
                'keywords' => '<p>aparaturni tretmani tela</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Profesionalni tretmani oblikovanja tela',
                'text_tretman' => null,
                't_status' => 1,
                'tt_id' => 2,
                'putanja_slika'  => null,
                'cena' => 1111,
                'description' => '<p>profesionalni tretmani oblikovanja tela</p>',
                'keywords' => '<p>profesionalni tretmani oblikovanja tela</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Tretmani čišćenja kože',
                'text_tretman' => null,
                't_status' => 1,
                'tt_id' => 1,
                'putanja_slika'  => null,
                'cena' => 1111,
                'description' => '<p>tretmani či&scaron;ćenja lica</p>',
                'keywords' => '<p>tretmani či&scaron;ćenja lica</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Mezoporacija / Mezoterapija',
                'text_tretman' => '<p class="MsoListParagraph" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span lang="ES" style="mso-ansi-language: ES;">Mezoporacija je aparaturna,bezbolna procedura ubacivanja aktivnih sastojaka u dublje slojeve kože. Efekat ishrane kože ovom procedurom je izuzetno efektivan, a benefiti su dugotrajni. </span>Ovom metodom tretiramo sve problematike kože.</p>
<p class="MsoListParagraph" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;">&nbsp;</p>
<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;">Mezoterapija mikroiglicama ili dermapen mikronidling (microneedling) mezoterapijski tretman je bezbedna, jednostavna i efikasna procedura koja uz pomoć ručno kontrolisanog aparata izuzetno tankim i finim iglicama pravi mikroubode na koži čime dovodi do kontrolisane &ldquo;povrede&ldquo; koja će stimulisati ćelije na produkciju novog kolagena i elastina, a čime će se kože podmladiti.</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">Novonastali kolagen će popuniti fine bore, popraviti teksturu kože, ukloniti ili ublažiti ožiljke i strije, ali i dovesti do lifting efekta. Aplikacija adekvatnog mezoterapijskog koktela, bogatog vitaminima, peptidima, kolagenom, hijaluronom i drugim aktivnim supstancama, dodatno terapijski i sinergistički deluje te su rezultati sigurni. Nakon otvaranja mikrokanala u kožu se unose tačno određene doze potpuno sterilnih koktela, sastavljenih od prirodnih ekstrakata, vitamina, aminokiselina, oligoelemenata, peptida...</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Jedan tretman traje oko 40 minuta. Koža će nakon tretmana reagovati crvenilom, u različitom stepenu zavisno od tipa kože, tretirane regije i individualnih osobenosti. U svakom slučaju koža se normalizuje do 48 sata posle tretmana .Sledećih 14 dana preporučuje se izbegavanja izloženosti Suncu, solarijuma, kupanje u bazenu,znojenje, i primena agresivnih kozmetičkih preparata ili tretmana. Produkcija kolagena koja sledi, de&scaron;avaće se tokom narednih nedelja sa dejstvom na duge staze. Broj tretmana zavisi od rezultata koje želite da postignete i od toga &scaron;ta tretiramo. Najče&scaron;će, potrebno je 3 do 8 tretmana za optimalne rezultate.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Tretmani se rade u razmaku od 2 do 6 nedelja. Rizici tretmana su minimalni.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Nakon tretmana, uobičajeno je crvenilo uz moguću suvoću kože, ali se ove promene povlače nakon par dana.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto;"><span lang="ES" style="mso-ansi-language: ES;">KONTRAIDIKACIJE:</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto;"><span lang="ES" style="mso-ansi-language: ES;">*infekcija kože</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto;"><span lang="ES" style="mso-ansi-language: ES;">*aktivni tumori kože</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto;"><span lang="ES" style="mso-ansi-language: ES;">*terapija roakutanom</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto;"><span lang="ES" style="mso-ansi-language: ES;">*otvorene rane ili iritacije kože</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto;"><span lang="ES" style="mso-ansi-language: ES;">*trudnoća, dojenje</span></p>',
                't_status' => 1,
                'tt_id' => 1,
                'putanja_slika'  => 'IMG_9575.jpg',
                'cena' => 1111,
                'description' => '<p>mezoporacija, mezoterapija</p>',
                'keywords' => '<p>mezoporacija, mezoterapija</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Masaže',
            'text_tretman' => '<p class="MsoListParagraph" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Bilo da želite da se opustite, otklonite bolove u odredjenom delu tela ili želite da se oslobodite nakupljene vode i toksina u telu, masaža je uvek pravi odgovor. Prilikom masaže nadražuju se receptori na koži i potkožnom tkivu, kao efekat mehaničkog delovanja, a isto tako se indirektnim delovanjem, odnosno refleksnim putevima, utiče na budjenje celog organizma. To znači da masaža odlično deluje na na&scaron;e zdravlje i raspoloženje: pobolj&scaron;ava i ubrzava krvotok i limfotok, pobolj&scaron;ava elastičnost i regeneraciju kože, opu&scaron;ta mi&scaron;iće, usporava i produbljuje disanje, podstiče probavu, ubrzava metabolizam, pospe&scaron;uje izbacivanje &scaron;tetnih materija iz organizma, smanjuje bol i napetost, deluje na unutra&scaron;nje organe. U na&scaron;em salonu možete birati izmedju sledećih masaža:</span></p>',
                't_status' => 1,
                'tt_id' => 2,
                'putanja_slika'  => null,
                'cena' => 1111,
                'description' => '<p>masaže</p>',
                'keywords' => '<p>masaže</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Mikrostruje',
                'text_tretman' => '<p class="MsoListParagraph" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Mikro struje su jedna od najnovijih procedura u anti age tretmanima. Predstavljaju neinvazivnu metodu tretiranja kože kojom podstičemo smanjenje bora, re-edukaciju mi&scaron;ića, pobolj&scaron;anje elastičnoszi i toniranje kože.Kao krajnji rezultat imamoo face liting efekat, ublažene bore i pobolj&scaron;anu mikrocirkulaciju u koži. Rezultati su kumulativni &ndash; svaka sledeća primena unapredjuje postignute rezultate. Može se koristiti samostalno ili u kombinacij sa drugim tretmanima. Izuzetan anti &ndash; age efekat postižemo u kombinaciji sa radiotalasnim liftingom. </span></p>',
                't_status' => 1,
                'tt_id' => 1,
                'putanja_slika'  => null,
                'cena' => 1111,
                'description' => '<p>mikrostruja</p>',
                'keywords' => '<p>mikrostruja</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Anti - age tretmani',
                'text_tretman' => 'Anti - age tretmani',
                't_status' => 1,
                'tt_id' => 1,
                'putanja_slika'  => null,
                'cena' => 1111,
                'description' => '<p>anti - age tretmani</p>',
                'keywords' => '<p>anti - age tretmani</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Biološki tretmani',
                'text_tretman' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Biolo&scaron;ki tretmani su intezivni ,regenerativni tretmani lica , bazirani na unosu preparata sa aktivnim sastojcima. Postoji čitav niz biolo&scaron;kih tretmana koji odgovaraju na specifične potrebe, pa se tako svaki tretman formira zasebno, u odnosu na potrebe va&scaron;e kože u tom trenutku. </span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Biolo&scaron;kim tretmanima sprečavamo starenje kože, gubitak svežine i elastičnosti, ubalažavamo stvaranje bora i vidljivost pora, umanjujemo fleke i mrlje na licu,dubinski hidriramo kožu.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;"><span style="mso-spacerun: yes;">&nbsp;</span>Biolo&scaron;ki tretman započinjemo sa aparaturnom analizom kože. Nakon dijagnostike sledi odabir<span style="mso-spacerun: yes;">&nbsp; </span>preparata,<span style="mso-spacerun: yes;">&nbsp; </span>koji će najbolje odgovoriti na problematike kože.<span style="mso-spacerun: yes;">&nbsp; </span>Tretman započinejmo sa pripremnim či&scaron;ćenjem kože i<span style="mso-spacerun: yes;">&nbsp; </span>blagim pilingom, kako bi se uklonile odumrle ćelije. Potom se unose aktivni preparati za hidrataciju,regeneraciju i zatezanje kože uz opu&scaron;tajuću masažu lica, a na kraju tretmana se nanosi odgovarajuća revitalizirajuća maska. </span>Tretman zaključujemo sa nano&scaron;enjem hranjive kreme.</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">&nbsp;</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span lang="ES" style="font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol; mso-ansi-language: ES;"><span style="mso-list: Ignore;">&middot;<span style="font: 7.0pt "Times New Roman";">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]-->Biolo&scaron;ki tretman preporučuje se za sve tipove kože, a poželjno je da se sa ovim tretmanom počne &scaron;to pre, kako bi se izbegle neželjene pojave na koži. <span lang="ES" style="mso-ansi-language: ES;">Preporuka je da se sa biolo&scaron;kim tretmanom počne &scaron;to ranije , oko 25 godine života.</span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;"><span style="mso-list: Ignore;">&middot;<span style="font: 7.0pt "Times New Roman";">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; </span></span></span><!--[endif]--><span lang="ES" style="mso-ansi-language: ES;">Tretmanom možemo tretirati razne problematike kože poput dehidratacije, pigmentacija, ublažavanje bora i zatezanje kože. </span>Svaki tretman je individualan i prilagodjen potrebama klijenta.</p>',
                't_status' => 1,
                'tt_id' => 1,
                'putanja_slika'  => null,
                'cena' => 1111,
                'description' => '<p>biolo&scaron;ki tretman</p>',
                'keywords' => '<p>biolo&scaron;ki tretman</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Radiotalasni lifting',
                'text_tretman' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Radiotalasni lifting predstavlja bezbolnu, neinvazivnu proceduru zatezanja i podmadjivanja kože. Aparaturna metoda kojom zagrevamo tkivo sa ciljem podsticanja fibroplasta, koji stimuli&scaron;u produkciju novih kolagenih vlakana i zatezanje postojećih. </span></p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Radiotalasni lifting možemo raditi kao samostalni tretman, ali se takodje mmože kombinovati sa drugim tretmanima. </span></p>',
                't_status' => 1,
                'tt_id' => 1,
                'putanja_slika'  => 'IMG_9631.jpg',
                'cena' => 1111,
                'description' => '<p>radiotalasni lifting</p>',
                'keywords' => '<p>radiotalasni lifting</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Oxy tretman',
                'text_tretman' => '<p class="MsoListParagraphCxSpFirst" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Tretman kiseonikom je prirodna i veoma prijatna metoda sa kojom pospe&scaron;ujemo obnavljanje ćelija kože, daje blistavost i svežinu, kao i elastičnost, koja deluje na umanjivanje postojećih i usporavanje stvaranja novih bora.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Tretmanom podstičemo ćelijski metabolizam i regeneraciju o&scaron;tećenih ćelija,smanjujemo upalne procese zbog antibakterijskog dejstva kiseonika, hranimo vezivno tkivo, podižemo tonus lica, redukujemo dubinu bora, posvetljujemo kožu (naročito kod pu&scaron;ača), radimo na detoksikaciji kože.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">&nbsp;</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Tretman podrazumeva ap&scaron;minkovanje,pripremno či&scaron;ćenje i toniziranje kože. Nakon toga prelazimo na enzimski piling i odabir aktivnih supstanci ili kombinacije aktivnih supstanci u skladu potrebama kože. Nakon masaže lica pristupamo izvodjenju aparaturnog dela tretmana sa aktivnim kiseonikom.</span></p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">Tretman zaključujemo maskom i Led terapijom.</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">&nbsp;</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">BEAUTY PUTOKAZ</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;"><span style="mso-list: Ignore;">&middot;<span style="font: 7.0pt "Times New Roman";">&nbsp;</span></span></span><!--[endif]-->Tretman koji efektivno nahrani i oksigenizuje kožu, a pritom je izuzetno prijatan i relaksirajuć (relax masaža lica)</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify; text-indent: 0in; mso-list: l0 level1 lfo1;"><!-- [if !supportLists]--><span style="font-family: Symbol; mso-fareast-font-family: Symbol; mso-bidi-font-family: Symbol;"><span style="mso-list: Ignore;">&middot; </span></span>Ovu metodu možete izabrati kao samostalan treman, seriju tretmana ili kao dopunsku metodu za ishranu i oksigenizaciju kože.</p>
<p class="MsoListParagraphCxSpMiddle" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">&nbsp;</p>
<p class="MsoListParagraphCxSpLast" style="margin-left: 0in; mso-add-space: auto; text-align: justify;">&nbsp;</p>',
                't_status' => 1,
                'tt_id' => 1,
                'putanja_slika'  => 'IMG_9631.jpg',
                'cena' => 1111,
                'description' => '<p>oxy tretman</p>',
                'keywords' => '<p>oxy tretman</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Profesionalna analiza kože',
                'text_tretman' => '<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Profesionalna analiza u na&scaron;em salonu je osnova svakog tretmana lica. Trudimo se da smo uvek u korak sa najnovijim tehnolo&scaron;kim postignućima, pa smo tako u na&scaron;u ponudu uvrstilii i profesionalnu aparaturnu analizu kože. Na&scaron; novi aparat otkriće sve detalje va&scaron;e kože i izračunaće vam va&scaron;u &bdquo;stvarnu starost&bdquo; kože. Kakvi god da su rezultati va&scaron;e prve analize, mi ćemo osmisliti najbolje i najefikasnije re&scaron;enje za Vas. </span></p>
<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;"><span style="mso-spacerun: yes;">&nbsp;</span>Analizu radimo u dva segmenta. Nakon umivanja, kožu pregledamo prostim okom i uradimo standardnu kozmetolo&scaron;ku procenu tipa i stanja kože. Takva analiza obuhvata povr&scaron;inu kože. </span></p>
<p class="MsoNormal" style="text-align: justify;"><span lang="ES" style="mso-ansi-language: ES;">Nakon toga prelazimo na drugi segment, gde kožu pregledamo uz pomoć profesionalnog aparata za analizu kože, koja nam omogućava da vidimo dublje slojeve kože i detektujemo one promene koje nisu vidljive prostim okom. Uz pomoć aparature precizno odredimo mno&scaron;tvo parametra poput stepena hidratacije kože, procenu sadržaja sebuma (masnoće) na koži, detekciju pro&scaron;irenih pora i njihovu analizu, čistoću pora (porifinske bakterije), pigmentne fleke i mrlje,<span style="mso-spacerun: yes;">&nbsp; </span>dubinu bora, osetljivost kože itd. </span></p>
<p class="MsoNormal" style="text-align: justify;">Podaci prikupljeni prilikom analize kože ostaju u va&scaron;em kartonu i služe kao kontrolni parametar za samu efektivnost tretmana i kućne nege. Uz uporedne grafikone detaljno pratimo napredovanje zdravlja va&scaron;e kože.</p>
<p class="MsoNormal" style="text-align: justify;">Aparatura ima veliku bazu podataka o svim tipovima kože i kako je adekvatno negovati, &scaron;to nam olak&scaron;ava da odredimo najadekvatnije tretmane i preparate za kućnu negu. Svako ko brine o svojoj koži zna koliko je važno odabrati pravilne preparate kućne nege i koliko kućna nega utiće na krajnji rezultat i zdravlje va&scaron;e kože.</p>
<p class="MsoNormal" style="text-align: justify;">Nakon analize, dobijate precizan nalaz o stanju i preporučenim tretmanima, uz pomoć kojeg ćete naučiti sve &scaron;to treba da znate o svojoj koži.</p>
<p class="MsoNormal" style="text-align: justify;">Analiza kože je sastavni deo svakog tretmana, a aparaturna dijagnostika može biti i zaseban tretman, u slučaju da želite da ustanovite va&scaron;e trenutno stanje kože, kao i koji su preparati kućne nege najbolji za va&scaron;u kožu.</p>
<p class="MsoNormal" style="text-align: justify;">&Scaron;to vi&scaron;e znamo o koži na&scaron;ih klijenata, bolje odabiremo procedure i preparate uz pomoć kojih stvaramo plan i dimaniku samih tretmana.</p>',
                't_status' => 1,
                'tt_id' => 1,
                'putanja_slika'  => null,
                'cena' => 1111,
                'description' => '<p>profesionalna analiza kože</p>',
                'keywords' => '<p>profesionalna analiza kože</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Hemijski piling',
                'text_tretman' => '<p class="MsoNormal" style="text-align: justify;">Hemijskim pilingom uklanjanjamo povr&scaron;inski sloj epiderma i na taj način omogućavamo koži da se regeneri&scaron;e. U na&scaron;em salonu koristimo najrazličitije vrste hemijskih pilinga, kako bi bili u mogućnosti da individualno odgovorimo na potrebe svake kože, pa i najosetljivije. Ovom procedurom tretiramo &scaron;irok spektar problematika kože,a neke od njih su : popravljanje teksture kože, regulisanje proma&scaron;ćivanja kože, umanjivanje hiperpigmentacija, zatezanje, revitalizacija, hidratacija, podsticanje sinteze kolagena u koži.</p>',
                't_status' => 1,
                'tt_id' => 1,
                'putanja_slika'  => 'IMG_9665.jpg',
                'cena' => 1111,
                'description' => '<p>hemijski piling</p>',
                'keywords' => '<p>hemijski piling</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Nerrot2',
                'text_tretman' => '<p>What is Lorem Ipsum?
Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.</p>',
                't_status' => 0,
                'tt_id' => 2,
                'putanja_slika'  => null,
                'cena' => 1111,
                'description' => '<p>grkepogkoperk</p>',
                'keywords' => '<p>grkepogkoperk</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
            [   't_naziv' => 'Nesto 3',
                'text_tretman' => '',
                't_status' => 1,
                'tt_id' => 1,
                'putanja_slika'  => null,
                'cena' => 1111,
                'description' => '<p>grkepogkoperk</p>',
                'keywords' => '<p>grkepogkoperk</p>',
                'created_at' => now(),
                'updated_at' => now()
            ],
        ]);
    }
}
