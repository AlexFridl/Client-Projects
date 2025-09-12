<?php

namespace App\Http\Controllers;

use App\Http\Requests\KategorijaRequest;
use App\Models\Tretman;
use App\Models\Kategorija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class KategorijaBackendControler extends BackendController
{
    public $data = [];
    public function adminPanel_kategorije(){

        $this->data['kategorije'] = Kategorija::with('tretman')
                                        ->orderBy('created_at')
                                        ->paginate(6);


        return view('pages.admin.adminPanel_kategorije', $this->data);
    }

    public function adminPanel_kategorije_insert(){
        $this->data['tretmani'] = Tretman::with('tipTretman')->orderBy('id_tretman', 'asc')->get();

        return view('pages.admin.adminPanel_kategorije_insert', $this->data);
    }
    public function doAdminPanel_kategorije_insert(KategorijaRequest $request){
        $kat_naziv = $request->input('tbNaziv');
        $text_kat =  $request->input('taTekst');
        $k_status =  $request->input('ddlStatus');
        $slika_putanja =  $request->file('fSlika');
        $cena = $request->input('tbCena');
        $t_id =  $request->input('ddlTretmana');
        $description =  $request->input('description');
        $keywords =  $request->input('keywords');

        if($slika_putanja){
            $tmp_path = $slika_putanja->getPathname();
            $extension = $slika_putanja->getClientOriginalExtension();
            $realName = $slika_putanja->getClientOriginalName();

            $new_path = 'img/tretmani/' . $realName;
            // $move_slika = $slika_putanja->move(public_path($new_path)); // ovo prepraviti i na tretmanima jed i tamo ne radi kako
            //treba

            if(File::move($tmp_path, $new_path)) {
                $kategorija = new Kategorija();
                $kategorija->kat_naziv = $kat_naziv;
                $kategorija->text_kat = $text_kat;
                $kategorija->k_status = $k_status;
                $kategorija->slika_putanja = $realName;
                $kategorija->cena = $cena;
                $kategorija->t_id = $t_id;
                $kategorija->description = $description;
                $kategorija->keywords = $keywords;

                try{
                    $result = $kategorija->save();

                    if($result){
                        return redirect()->route('adminPanel_kategorije')->with('poruka','Uspešan unos kategorije!');
                    }
                    else{
                        return redirect()->route('adminPanel_kategorije_insert')->with('poruka','Greška pri unosu kategorije!');
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
                return redirect()->route('adminPanel_kategorije_insert')->with('poruka','Greška pri unosu slike kategorije!');
            }
        }
        else{
            $kategorija = new Kategorija();
            $kategorija->kat_naziv = $kat_naziv;
            $kategorija->text_kat = $text_kat;
            $kategorija->k_status = $k_status;
            $kategorija->t_id = $t_id;
            $kategorija->slika_putanja = null;
            $kategorija->cena = $cena;
            $kategorija->description = $description;
            $kategorija->keywords = $keywords;
            try{
                $result = $kategorija->save();

                if($result){
                    return redirect()->route('adminPanel_kategorije')->with('poruka','Uspešan unos kategorije!');
                }
                else{
                    return redirect()->route('adminPanel_kategorije_insert')->with('poruka','Greška pri unosu kategorije!');
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


    public function adminPanel_kategorija_update($id_kategorija){

        $this->data['id_kategorija'] = $id_kategorija;
        $this->data['kategorija'] = Kategorija::with('tretman')
                                                ->where('id_kategorija', $id_kategorija)
                                                ->first();

        return view('pages.admin.adminPanel_kategorija_update', $this->data);
    }

    public function doAdminPanel_kategorija_update($id_kategorija, KategorijaRequest $request){
        // dd($request);
        $kat_naziv = $request->input('tbNaziv');
        $text_kat =  $request->input('taTekst');
        $k_status =  $request->input('ddlStatus');
        $slika_putanja =  $request->file('fSlika');
        $cena = $request->input('tbCena');
        $t_id =  $request->input('ddlTretman');
        $description =  $request->input('description');
        $keywords =  $request->input('keywords');
        $kategorija = Kategorija::find($id_kategorija);

        if($slika_putanja){
            $tmp_path = $slika_putanja->getPathname();
            $extension = $slika_putanja->getClientOriginalExtension();
            $realName = $slika_putanja->getClientOriginalName();

            $new_path = 'img/tretmani/' . $realName;
            $image_path = 'img/tretmani/' . $kategorija->slika_putanja;

            if(File::move($tmp_path, $new_path)) {

                $kategorija->kat_naziv = $kat_naziv;
                $kategorija->text_kat = $text_kat;
                $kategorija->k_status = $k_status;
                $kategorija->slika_putanja = $realName;
                $kategorija->cena = $cena;
                $kategorija->t_id = $t_id;
                $kategorija->description = $description;
                $kategorija->keywords = $keywords;

                try{
                    $result = $kategorija->save();

                    if (file_exists($image_path)) {
                        File::delete($image_path);
                        @unlink($image_path);
                    }
                    if($result){
                        return redirect()->route('adminPanel_kategorije')->with('poruka','Uspešna izmena kategorije!');
                    }
                    else{
                        return redirect()->route('adminPanel_kategorije_update')->with('poruka','Greška pri izmeni kategorije!');
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
                return redirect()->route('adminPanel_kategorije_insert')->with('poruka','Greška pri izmeni slike kategorije!');
            }
        }
        else{
            $kategorija->kat_naziv = $kat_naziv;
            $kategorija->text_kat = $text_kat;
            $kategorija->k_status = $k_status;
            $kategorija->t_id = $t_id;
            $kategorija->slika_putanja = null;
            $kategorija->cena = $cena;
            $kategorija->description = $description;
            $kategorija->keywords = $keywords;
            try{
                $result = $kategorija->save();

                if($result){
                    return redirect()->route('adminPanel_kategorije')->with('poruka','Uspešna izmena kategorije!');
                }
                else{
                    return redirect()->route('adminPanel_kategorije_insert')->with('poruka','Greška pri izmeni kategorije!');
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

    public function adminPanel_kategorija_delete($id_kategorija){
        $kategorija = Kategorija::find($id_kategorija);
        $image_path = 'img/tretmani/' . $kategorija->slika_putanja;

        try {
            if ($kategorija->k_status == 1) {
                $kategorija->where('id_kategorija', $id_kategorija)->where('k_status','=','1')->update(['k_status'=>'0']);
                return redirect()->route('adminPanel_kategorije')->with('poruka', 'Uspešno deaktiviranje kategorije!');
            }
            else {
                $kategorija->where('id_kategorija', $id_kategorija)->where('k_status','=','0')->delete();
                if (file_exists($image_path)) {
                    File::delete($image_path);
                @unlink($image_path);
                }
                return redirect()->route('adminPanel_kategorije')->with('poruka', 'Uspešno brisanje kategorije!');
            }
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }

    }

    public function adminPanel_searchKategorije(Request $request){
        $search = $request->input('search');
        $this->data['kategorije'] = Kategorija::with('tretman')
                                        ->where('kat_naziv', 'LIKE', '%' . $search . '%')
                                        ->orderBy('created_at')
                                        ->paginate(3);
        $this->data['kategorije']->appends(['search' => $search]);
        if($request->ajax()){
            return response()->json([
                'html' => view('pages.partials_index.admin.search_kategorije', $this->data)->render(),
            ]);
        }
        return view('pages.admin.adminPanel_kategorije', $this->data);
    }
}

