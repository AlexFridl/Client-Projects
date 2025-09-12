<?php

namespace App\Http\Controllers;

use App\Models\Saradnici;
use App\Models\Slajder;
use App\Models\TipTretmana;
use App\Models\Tretman;
use App\Models\Kategorija;
use App\Models\Podkategorija;
use App\Http\Requests\SaradniciRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class SaradniciBackendController extends BackendController
{

    public function adminPanel_saradnici()
    {
        $saradnici = new Saradnici();
            $this->data['saradnici'] = Saradnici::paginate(6);
            return view('pages.admin.adminPanel_saradnici', $this->data);
    }

    public function adminPanel_saradnici_insert()
    {
        return view('pages.admin.adminPanel_saradnici_insert',$this->data);
    }

    public function doAdminPanel_saradnici_insert(SaradniciRequest $request)
    {
        $slika = $request->file('unosSlikeSaradnika');
        $ime_saradnika = $request->input('tbSaradnik');
        $postvljeno = time();     //  dateFormar => date('YY-mm-dd');
        $status = $request->input('ddlStatus');

        if ($slika) {
            $tmp_path = $slika->getPathname();
            $extension = $slika->getClientOriginalExtension();
            $realName = $slika->getClientOriginalName();

            $slika_ime = time().'_'.$realName;
            $new_path = 'img/saradnici/' . $slika_ime;
            $saradnici = new Saradnici();

            $prebaceno = File::move($tmp_path, $new_path);

            if ($prebaceno) {
                $saradnici['ime_saradnika'] = $ime_saradnika;
                $saradnici['postavljeno'] = $postvljeno;
                $saradnici['putanja_slika'] = $slika_ime;
                $saradnici['status_slika'] = $status;

                try {
                    // $rez = $saradnici->insertSlikuGalerije();
                    $rez = $saradnici->save();

                    if ($rez) {
                        return redirect()->route('adminPanel_saradnici')->with('poruka', 'Uspešno ste uneli sliku saradnika!');
                    } else {
                        return redirect()->route('adminPanel_saradnici_insert')->with('poruka', 'Niste uneli sliku saradnika!');
                    }
                } catch (\Exception $ex) {
                    Log::error("Greska:" . $ex->getMessage());
                }
            } else {
                return redirect()->route('adminPanel_saradnici')->with('poruka', 'Greška pri postavljanju slike na server!');
            }
        }
        else {
            return redirect()->route('adminPanel_saradnici_insert')->with('poruka', 'Morate odabrati sliku!');
        }
    }

    public function adminPanel_saradnici_update($id_saradnici)
    {
        $this->data['saradnici']  = Saradnici::where('id_saradnici', $id_saradnici)->first();
        return view('pages.admin.adminPanel_saradnici_update', $this->data);
    }

    public function doAdminPanel_saradnici_update(SaradniciRequest $request, $id_saradnici)
    {
        $slika = $request->file('fSlika');
        $status = $request->input('ddlStatus');
        $ime_saradnika = $request->input('tbSaradnik');

        $zapis = Saradnici::find($id_saradnici);
        $stara_slika = $zapis['putanja_slika']; //da se obrise stara slika iz foldera pri update-u, a da se unese nova izmena

        $zapis['ime_saradnika'] = $ime_saradnika;
        $zapis['status_slika'] = $status;

        if ($slika) {
            $tmp_path = $slika->getPathname();
            $extension = $slika->getClientOriginalExtension();
            $realName = $slika->getClientOriginalName();

            $slika_ime = time().'_'.$realName;
            $new_path = 'img/saradnici/' . $slika_ime;

            if (File::move($tmp_path, $new_path)) {

                $zapis['putanja_slika'] = $slika_ime;
                $zapis['ime_saradnika'] = $ime_saradnika;
                $zapis['status_slika'] = $status;

                //bitno je da se za brisanje doda ime stare slike, a ne ona koja ce se upisati prilikom izmene,
                //jer ce se to staro ime traziti u folderu i onda ce se prema njemu slika izbrisati
                $image_path = 'img/saradnici/' . $stara_slika;

                try {
                    $rez = $zapis->save();
                    if (file_exists($image_path)) {
                        File::delete($image_path);
                        @unlink($image_path);
                    }

                    if ($rez) {
                        return redirect()->route('adminPanel_saradnici')->with('poruka', 'Uspešno ste izmenili sliku!');
                    } else {
                        return redirect()->route('adminPanel_saradnici_update', ['id_saradnici' => $id_saradnici])->with('poruka', 'Niste izmenili sliku!');
                    }
                } catch (\Exception $ex) {
                    Log::error("Greska:" . $ex->getMessage());
                    Log::error("Greska:" . $ex->getCode());
                }
            }
            else {
                return redirect()->route('adminPanel_saradnici')->with('poruka', 'Greška pri postavljanju slike na server!');
            }
        }
        else{

            $zapis['ime_saradnika'] = $ime_saradnika;
            $zapis['status_slika'] = $status;

            try {
                $rez = $zapis->save();
                if ($rez) {
                    return redirect()->route('adminPanel_saradnici')->with('poruka', 'Uspešno ste izmenili sliku!');
                } else {
                    return redirect()->route('adminPanel_saradnici_update', ['id_saradnici' => $id_saradnici])->with('poruka', 'Niste izmenili sliku!');
                }
            } catch (\Exception $ex) {
                Log::error("Greska:" . $ex->getMessage());
            }
        }

    }

    public function adminPanel_saradnici_delete($id_saradnici)
    {
        $slikaSaradnika = Saradnici::where('id_saradnici', $id_saradnici)->first();
        $image_path = 'img/saradnici/' . $slikaSaradnika['putanja_slika'];
        try {
            if ($slikaSaradnika['status_slika'] == 1) {
                $slikaSaradnika->deleteOne($id_saradnici);
                return redirect()->route('adminPanel_saradnici')->with('poruka', 'Uspešno ste deaktivirali sliku saradnika!');
            } else {
                $rez = $slikaSaradnika->realDeleteOne($id_saradnici);
                if (file_exists($image_path)) {
                    File::delete($image_path);
                    @unlink($image_path);
                }
                return redirect()->route('adminPanel_saradnici')->with('poruka', 'Uspešno ste obrisali sliku saradnika!');
            }
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    // public function sortByDate_galerija(Request $request)
    // {
    //     $unos = $request->post('unos');
    //     //dd($unos);
    //     $galerija = new Slika();
    //     $rez = $galerija->getAll();
    //     //        dd($rez);

    //     $podaci = null;
    //     $array = null;

    //     $podaci .= "<table class='table table-striped adminTable'>";
    //     $podaci .= "<thead>";
    //     $podaci .= "<tr>";
    //     $podaci .= "<th scope='col' class='zaglavljeTabele'>#</th>";
    //     $podaci .= "<th scope='col' class='zaglavljeTabele'>Tretman</th>";
    //     $podaci .= "<th scope='col' class='zaglavljeTabele'>Slika</th>";
    //     $podaci .= "<th scope='col' class='zaglavljeTabele'>Postavljeno</th>";
    //     $podaci .= "<th scope='col' class='zaglavljeTabele'>Status</th>";
    //     $podaci .= "<th scope='col' class='zaglavljeTabele'>Izmeni</th>";
    //     $podaci .= "<th scope='col' class='zaglavljeTabele'>Obrisi</th>";
    //     $podaci .= "</tr>";
    //     $podaci .= "</thead>";
    //     $podaci .= "<tbody>";
    //     $i = 1;
    //     //        if(isset($_GET['page'])){
    //     //            $perPage = $_GET['page'];
    //     //            if(!isset($perPage) || $perPage == 1){
    //     //                $i = 1;
    //     //            }
    //     //            else{
    //     //                $i = (($perPage -1 ) * 6) + 1;
    //     //            }
    //     //        }
    //     //        else{
    //     //            $i = 1;
    //     //        }
    //     foreach ($rez as $s) {
    //         $array .= $s->id_slika;
    //         //          dd($b->postavljeno);
    //         $date = date("Y-m-d", $s->postavljeno);

    //         list($year, $month, $day) = explode('-', $date);
    //         //dd($day);
    //         if ($unos == $date) {
    //         //        foreach($rez as $s){
    //             $podaci .= "<tr>";
    //             $podaci .= "<th scope='row' class='tekstTabela'>" . $i . "</th>";
    //             $i++;
    //             $podaci .= "<td class='tekstTabela'>" . $s->t_naziv . "</td>";
    //             $podaci .= "<td class='tekstTabela'>  <img class='img-fluid' src='" . asset('/') . "/img/galerija/" . $s->slika_galerija . "' width='200px' height='250px' alt='" . $s->t_naziv . "'/></td>";
    //             $podaci .= "<td class='tekstTabela'>".date('d.m.Y.',$s->postavljeno)."</td>";
    //             if ($s->status_slika == 1) {
    //                 $podaci .= "<td class='tekstTabela'> Aktivan</td >";
    //             } else {
    //                 $podaci .= "<td class='tekstTabela'>Neaktivan</td>";
    //             }
    //             $podaci .= "<td><a class='linkA'  href='" . route('adminPanel_galerija_update', ['id_slika' => $s->id_slika]) . "'>Izmeni</a></td>";
    //             $podaci .= "<td><a  class='linkA'  href='" . route('adminPanel_galerija_delete', ['id_slika' => $s->id_slika]) . "''>Obrisi</a></td>";
    //             $podaci .= "</tr>";
    //         }

    //     }
    //     $podaci .= "</tbody>";
    //     $podaci .= "</table>";
    //     return json_encode($podaci);
    // }

    // public function adminPanel_galerija_tretman_kat(Request $request){
    //     $choosen = $request->input("choosen");

    //     $tretmani = Tretman::with('tipTretman')
    //                         ->where('id_tretman', $choosen)
    //                         ->get();

    //     $kategorije = Kategorija::with('tretman','podkategorijas')
    //                             ->where('t_id', $choosen)
    //                             ->get();

    //     $data = [];
    //     if($kategorije){
    //         $data  = $kategorije;
    //     }
    //     return json_encode($data);
    // }

    // public function adminPanel_galerija_tretman_kat_podkat(Request $request){
    //     $choosen_kategorija = $request->input("choosen_kategorija");

    //     try{
    //         $podkategorije = Podkategorija::with('kategorijas')
    //                                             ->where('kategorija_id', $choosen_kategorija)
    //                                             ->get();

    //         $data_podkategorija = [];
    //         if($podkategorije){
    //             $data_podkategorija = $podkategorije;
    //         }
    //         return json_encode($data_podkategorija);
    //     }
    //     catch(\Exception $e){
    //         return json_encode(['error' => $e->getMessage()]);
    //     }
    // }

}
