<?php

namespace App\Http\Controllers;

use App\Models\Kategorija;
use App\Models\Podkategorija;
use App\Models\Tretman;

use App\Http\Requests\PodkategorijaRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class PodkategorijaBackendControler extends BackendController
{
    public $data = [];

    public function adminPanel_podkategorije(){

        $this->data['podkategorije'] = Podkategorija::with('kategorija.tretman')->paginate(3);

        return view('pages.admin.adminPanel_podkategorije', $this->data);
    }

    public function adminPanel_podkategorija_insert(){

        $this->data['kategorije'] = Kategorija::all();
        return view('pages.admin.adminPanel_podkategorije_insert', $this->data);

    }

    public function doAdminPanel_podkategorija_insert(PodkategorijaRequest $request){
        $podkat_naziv = $request->input('tbNaziv');
        $tekst_podkat =  $request->input('taTekst');
        $podkat_status =  $request->input('ddlStatus');
        $slika_putanja =  $request->file('fSlika');
        $cena = $request->input('tbCena');
        $kategorija_id =  $request->input('ddlKategorija');
        $description =  $request->input('description');
        $keywords =  $request->input('keywords');

        if($slika_putanja){
            $tmp_path = $slika_putanja->getPathname();
            $extension = $slika_putanja->getClientOriginalExtension();
            $realName = $slika_putanja->getClientOriginalName();

            $new_path = 'img/tretmani/' . $realName;


            if(File::move($tmp_path, $new_path)) {
                $podkategorija = new Podkategorija();
                $podkategorija->podkat_naziv = $podkat_naziv;
                $podkategorija->tekst_podkat = $tekst_podkat;
                $podkategorija->podkat_status = $podkat_status;
                $podkategorija->slika_putanja = $realName;
                $podkategorija->cena = $cena;
                $podkategorija->kategorija_id = $kategorija_id;
                $podkategorija->description = $description;
                $podkategorija->keywords = $keywords;

                try{
                    $result = $podkategorija->save();

                    if($result){
                        return redirect()->route('adminPanel_podkategorije')->with('poruka','Uspešan unos podkategorije!');
                    }
                    else{
                        return redirect()->route('adminPanel_podkategorija_insert')->with('poruka','Greška pri unosu podkategorije!');
                    }
                }
                catch(\Exception $e)
                {
                    Log::error("Greska:" .$e->getMessage());
                    Log::error("Greska:" .$e->getFile());
                    Log::error("Greska:" .$e->getCode());
                }
            }
            else{
                return redirect()->route('adminPanel_podkategorija_insert')->with('poruka','Greška pri unosu slike podkategorije!');
            }
        }
        else
        {
            $podkategorija = new Podkategorija();
            $podkategorija->podkat_naziv = $podkat_naziv;
            $podkategorija->tekst_podkat = $tekst_podkat;
            $podkategorija->podkat_status = $podkat_status;
            $podkategorija->kategorija_id = $kategorija_id;
            $podkategorija->slika_putanja = null;
            $podkategorija->cena = $cena;
            $podkategorija->description = $description;
            $podkategorija->keywords = $keywords;
            try{
                $result = $podkategorija->save();

                if($result){
                    return redirect()->route('adminPanel_podkategorije')->with('poruka','Uspešan unos podkategorije!');
                }
                else{
                    return redirect()->route('adminPanel_podkategorija_insert')->with('poruka','Greška pri unosu podkategorije!');
                }
            }
            catch(\Exception $e)
            {
                Log::error("Greska:" .$e->getMessage());
                Log::error("Greska:" .$e->getFile());
                Log::error("Greska:" .$e->getCode());
            }
        }
    }

    public function adminPanel_podkategorija_update($id_podkategorija){
        $this->data['podkategorija'] = Podkategorija::with('kategorija')->where('id_podkategorija', $id_podkategorija)->first();
        $this->data['kategorije'] = Kategorija::with('tretman', 'podkategorijas')->get();

        return view('pages.admin.adminPanel_podkategorija_update', $this->data);

    }

    public function doAdminPanel_podkategorija_update($id_podkategorija, PodkategorijaRequest $request){

        $podkat_naziv = $request->input('tbNaziv');
        $tekst_podkat = $request->input('taTekst');
        $slika_putanja = $request->file('fSlika');
        $kategorija_id = $request->input('ddlKategorija');
        $podkat_status = $request->input('ddlStatus');
        $cena = $request->input('tbCena');
        $description = $request->input('description');
        $keywords = $request->input('keywords');

        $podkategorija = Podkategorija::find($id_podkategorija);

        if($slika_putanja){
            $tmp_path = $slika_putanja->getPathname();
            $extension = $slika_putanja->getClientOriginalExtension();
            $realName = $slika_putanja->getClientOriginalName();

            $new_path = 'img/tretmani/' . $realName;
            $image_path = 'img/tretmani/' . $podkategorija->slika_putanja;

            if(File::move($tmp_path, $new_path)) {

                $podkategorija->podkat_naziv = $podkat_naziv;
                $podkategorija->tekst_podkat = $tekst_podkat;
                $podkategorija->podkat_status = $podkat_status;
                $podkategorija->slika_putanja = $realName;
                $podkategorija->cena = $cena;
                $podkategorija->kategorija_id = $kategorija_id;
                $podkategorija->description = $description;
                $podkategorija->keywords = $keywords;

                try{
                    $result = $podkategorija->save();

                    if (file_exists($image_path)) {
                        File::delete($image_path);
                        @unlink($image_path);
                    }
                    if($result){
                        return redirect()->route('adminPanel_podkategorije')->with('poruka','Uspešna izmena podkategorije!');
                    }
                    else{
                        return redirect()->route('adminPanel_podkategorija_update')->with('poruka','Greška pri izmeni podkategorije!');
                    }
                }
                catch(\Exception $e)
                {
                    Log::error("Greska:" .$e->getMessage());
                    Log::error("Greska:" .$e->getFile());
                    Log::error("Greska:" .$e->getCode());
                }
            }
            else
            {
                return redirect()->route('adminPanel_podkategorija_update')->with('poruka','Greška pri izmeni slike podkategorije!');
            }
        }
        else{
            $podkategorija->podkat_naziv = $podkat_naziv;
            $podkategorija->tekst_podkat = $tekst_podkat;
            $podkategorija->podkat_status = $podkat_status;
            $podkategorija->kategorija_id = $kategorija_id;
            $podkategorija->slika_putanja = null;
            $podkategorija->cena = $cena;
            $podkategorija->cena = $cena;
            $podkategorija->description = $description;
            $podkategorija->keywords = $keywords;
            try{
                $result = $podkategorija->save();

                if($result){
                    return redirect()->route('adminPanel_podkategorije')->with('poruka','Uspešna izmena podkategorije!');
                }
                else{
                    return redirect()->route('adminPanel_podkategorija_update')->with('poruka','Greška pri izmeni podkategorije!');
                }
            }
            catch(\Exception $e)
            {
                Log::error("Greska:" .$e->getMessage());
                Log::error("Greska:" .$e->getFile());
                Log::error("Greska:" .$e->getCode());
            }
        }
    }

    public function adminPanel_podkategorija_delete($id_podkategorija){

        $podkategorija = Podkategorija::find($id_podkategorija);
        $image_path = 'img/tretmani/' . $podkategorija->slika_putanja;

        try {
            if ($podkategorija->podkat_status == 1) {
                $podkategorija->where('id_podkategorija', $id_podkategorija)->where('podkat_status','=','1')->update(['podkat_status'=>'0']);
                return redirect()->route('adminPanel_podkategorije')->with('poruka', 'Uspešno deaktiviranje podkategorije!');
            }
            else {
                $podkategorija->where('id_podkategorija', $id_podkategorija)->where('podkat_status','=','0')->delete();
                if (file_exists($image_path)) {
                    File::delete($image_path);
                @unlink($image_path);
                }
                return redirect()->route('adminPanel_podkategorije')->with('poruka', 'Uspešno brisanje podkategorije!');
            }
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function adminPanel_searchPodkategorije(Request $request){
        $search = $request->input('search');
        $this->data['podkategorije'] = Podkategorija::with('kategorija.tretman')
                                                    ->where('podkat_naziv', 'LIKE', '%' . $search . '%')
                                                    ->paginate(3);

        $this->data['podkategorije']->appends(['search' => $search]);

        if($request->ajax()){
            return response()->json([
                'html'  => view('pages.partials_index.admin.search_podkategorije', $this->data)->render(),
            ]);
        }
        return view('pages.admin.adminPanel_podkategorije', $this->data);

    }
}
