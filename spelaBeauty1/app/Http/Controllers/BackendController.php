<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Korisnik;
use App\Models\Podaci;
use App\Models\TipTretmana;
use App\Models\Tretman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Psy\Output\ProcOutputPager;
use Illuminate\Support\Facades\Log;

class BackendController extends Controller
{
    public $data = [];
    public function __construct()
    {
        $tipTretmana = new TipTretmana();
        $podaci = new Podaci();


        try{
            $this->data['tipTretmana'] = TipTretmana::get();
            $this->data['tretmani'] = $tretmani = Tretman::all();
            $this->data['podaci'] = Podaci::first();

        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function adminPanel_podaci(){
        try {
            $this->data['podaci1'] = Podaci::select('*')->first();

            return view('pages.admin.adminPanel_podaci', $this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }


    public  function adminPanel_podaci_update($id)
    {
        $this->data['podaci2'] = Podaci::where('id', $id)->first();

        return view('pages.admin.adminPanel_podaci_update',$this->data);
    }

    public function doAdminPanel_podaci_update($id,Request $request){
        if($request->has('btnIzmeni')){
            $tekst = $request->input('text');
            $ulica = $request->input('ulica');
            $mesto = $request->input('mesto');
            $tel1 = $request->input('tell');

            $description = $request->input('description');
            $keywords = $request->input('keywords');

            $slika = $request->file('slika');
            $profilna_slika = $request->file('profilna_slika');

            $podaci = new Podaci();
            $one = $podaci->getOne($id);
            $image_path = 'img/' . $one->podaci_slika_pocetna;
            $image_path_profilna = 'img/'.$one->profilna_slika;

            if($slika && $profilna_slika){
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $realName = $slika->getClientOriginalName();
                //                $slika_ime = time() . '.' . $extension;
                $new_path = 'img/'.$realName;

                $tmp_path_profilna = $profilna_slika->getPathname();
                $extension_profilna = $profilna_slika->getClientOriginalExtension();
                $realName_profilna = $profilna_slika->getClientOriginalName();
                //                $slika_ime = time() . '.' . $extension;
                $new_path_profilna = 'img/'.$realName_profilna;

                if (File::move($tmp_path, $new_path) && File::move($tmp_path_profilna, $new_path_profilna)) {
                    $podaci = Podaci::find($id);
                    $podaci->id = $id;
                    $podaci->text = $tekst;
                    $podaci->ulica = $ulica;
                    $podaci->mesto = $mesto;
                    $podaci->kontakt_tel = $tel1;
                    $podaci->podaci_slika_pocetna = $realName;
                    $podaci->profilna_slika = $realName_profilna;
                    $podaci->description = $description;
                    $podaci->keywords = $keywords;

                    try
                    {
                        $rez = $podaci->save();
                        if (file_exists($image_path)) {
                            File::delete($image_path);
                            @unlink($image_path);
                        }
                        if (file_exists($image_path_profilna)) {
                            File::delete($image_path_profilna);
                            @unlink($image_path_profilna);
                        }
                        if ($rez) {
                            return redirect()->route('adminPanel_podaci')->with('poruka', 'Uspešna izmena podataka!');
                        }
                        else {
                            return redirect()->route('adminPanel_podaci_update', ['id' => $id])->with('poruka', 'Neuspešna izmena podataka!');
                        }

                    }
                    catch (\Exception $ex) {
                        Log::error("Greska:" . $ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_podaci_update',['id'=>$id])->with('porukporukaa','Greška pri postavljanju slike na server!');
                }
            }
            elseif($slika) {
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $realName = $slika->getClientOriginalName();
                $new_path = 'img/'.$realName;

                if(File::move($tmp_path, $new_path)){

                    $podaci = Podaci::find($id);
                    $podaci->id = $id;
                    $podaci->text = $tekst;
                    $podaci->ulica = $ulica;
                    $podaci->mesto = $mesto;
                    $podaci->kontakt_tel = $tel1;
                    $podaci->podaci_slika_pocetna = $realName;
                    $podaci->description = $description;
                    $podaci->keywords = $keywords;

                    try {
                        $rez = $podaci->save();
                        if (file_exists($image_path)) {
                            File::delete($image_path);
                            @unlink($image_path);
                        }
                        if ($rez) {
                            return redirect()->route('adminPanel_podaci')->with('poruka', 'Uspešna izmena podataka!');
                        }
                        else {
                            return redirect()->route('adminPanel_podaci_update', ['id' => $id])->with('poruka', 'Neuspešna izmena podataka!');
                        }

                    } catch (\Exception $ex) {
                        Log::error("Greska:" . $ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_podaci_update',['id'=>$id])->with('porukporukaa','Greška pri postavljanju slike na server!');
                }
            }

            elseif($profilna_slika){
                $tmp_path_profilna = $profilna_slika->getPathname();
                $extension_profilna = $profilna_slika->getClientOriginalExtension();
                $realName_profilna = $profilna_slika->getClientOriginalName();
                //                $slika_ime = time() . '.' . $extension;
                $new_path_profilna = 'img/'.$realName_profilna;

                if(File::move($tmp_path_profilna, $new_path_profilna)){
                    // $request->file('avatar')->store('avatars')
                    $podaci = Podaci::find($id);
                    $podaci->id = $id;
                    $podaci->text = $tekst;
                    $podaci->ulica = $ulica;
                    $podaci->mesto = $mesto;
                    $podaci->kontakt_tel = $tel1;
                    // $podaci->podaci_slika_pocetna = $realName;
                    $podaci->profilna_slika = $realName_profilna;
                    $podaci->description = $description;
                    $podaci->keywords = $keywords;

                    try
                    {
                        $rez = $podaci->save();
                        if (file_exists($image_path_profilna)) {
                            File::delete($image_path_profilna);
                            @unlink($image_path_profilna);
                        }
                        if ($rez) {
                            return redirect()->route('adminPanel_podaci')->with('poruka', 'Uspešna izmena podataka!');
                        }
                        else {
                            return redirect()->route('adminPanel_podaci_update', ['id' => $id])->with('poruka', 'Neuspešna izmena podataka!');
                        }

                    } catch (\Exception $ex) {
                        Log::error("Greska:" . $ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_podaci_update',['id'=>$id])->with('porukporukaa','Greška pri postavljanju slike na server!');
                }
            }
            else {
                $podaci = Podaci::find($id);
                $podaci->id = $id;
                $podaci->text = $tekst;
                $podaci->ulica = $ulica;
                $podaci->mesto = $mesto;
                $podaci->kontakt_tel = $tel1;
                $podaci->description = $description;
                $podaci->keywords = $keywords;
                try {
                    $rez = $podaci->save();

                    if ($rez) {
                        return redirect()->route('adminPanel_podaci')->with('poruke', 'Uspešna izmena podataka!');
                    } else {
                        return redirect()->route('adminPanel_podaci_update', ['id' => $id])->with('poruke', 'Neuspešna izmena podataka!');
                    }
                }
                catch (\Exception $ex) {
                    Log::error("Greska:" . $ex->getMessage());
                }
            }
        }
    }

    public function adminPanel_podaci_delete($id){
        $podaci = new Podaci();
        $podaci->id = $id;
        try{
            $podaci->deleteOne($id);
            return redirect()->route('adminPanel_podaci')->with('poruka','Uspešno izvršenp brisanje!');
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }
}
