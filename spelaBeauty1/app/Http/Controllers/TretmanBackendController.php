<?php

namespace App\Http\Controllers;

use App\Http\Requests\TretmanRequest;
use App\Models\TipTretmana;
use App\Models\Tretman;
use Illuminate\Support\Facades\Log;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TretmanBackendController extends BackendController
{
    public $data = [];

    public function adminPanel_tretmani($id_tt){
        try{
            // $this->data['tt_naziv'] = TipTretmana::select('tt_naziv')->find($id_tt);
            $tip = TipTretmana::find($id_tt);
            $this->data['tt_naziv'] = $tip ? $tip->tt_naziv : null;

            $tretmani = new Tretman();
            $this->data['tretmani'] = $tretmani->getTretmane($id_tt);

            return view('pages.admin.adminPanel_tretmani',$this->data);
        }
        catch(\Exception $ex)
        {
            Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function adminPanel_pregled_tretmani($id_tt,$id_tretman){
        $tipTretmana = new TipTretmana();
        $tretman = new Tretman();

        try{
            //za sidebar nav promenljiva

            $this->data['tretman'] = $tretman->getOneTretman($id_tt,$id_tretman);
            $this->data['tretmani'] = $tipTretmana->getTretmanPoTT($id_tt);

            return view('pages.pregled_opisTretmana',$this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function adminPanel_tretmani_insert()
    {
        $tipTretmana = new TipTretmana();
        try {
            $this->data['tip_tretmana'] = $tipTretmana->getAll();
            return view('pages.admin.adminPanel_tretmani_insert', $this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function doAdminPanel_tretmani_insert(TretmanRequest $request){
        // TretmanRequest
        if($request->has('btnUnesi')){
            $t_naziv = $request->input('tbNaziv');
            $text_tretman = $request->input('taTekst');
            // dd($text_tretman);
            $tt_id = $request->input('ddlTipTretmana');
            $slika = $request->file('fSlika');
            $t_status = $request->input('ddlStatus');
            $cena = $request->input('tbCena');
            $description = $request->input('description');
            $keywords = $request->input('keywords');

            if($slika){
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $realName = $slika->getClientOriginalName();
                $new_path = 'img/tretmani/' . $realName;

                $transfer_img = File::move($tmp_path, $new_path);
                if($transfer_img) {
                    $tretman = new Tretman();
                    $tretman->t_naziv = $t_naziv;
                    $tretman->text_tretman = $text_tretman;
                    $tretman->t_status = $t_status;
                    $tretman->tt_id = $tt_id;
                    $tretman->putanja_slika = $realName;
                    $tretman->cena = $cena;
                    $tretman->description = $description;
                    $tretman->keywords = $keywords;

                    try {
                        // $result = $tretman->save();
                        $result = $tretman->insertTretman();

                        if($result){
                            return redirect()->route('adminPanel_tretmani',['id_tt'=>$tt_id])->with('poruka','Uspešan unos tretmana!');
                        }
                        else{
                            return redirect()->route('adminPanel_tretmani_insert')->with('poruka','Greška pri unosu tretmana!');
                        }
                    }

                    catch(\Exception $ex){
                        Log::error("Greska:" .$ex->getMessage());
                        Log::error("Greska:" .$ex->getFile());
                        Log::error("Greska:" .$ex->getCode());
                    }
                }
                else{
                    return redirect()->route('adminPanel_tretmani_insert')->with('poruka','Greška pri postavljanju slike na server!!');
                }
            }
            else{
                $tretman = new Tretman();
                $tretman->t_naziv = $t_naziv;
                $tretman->text_tretman = $text_tretman;
                $tretman->t_status = $t_status;
                $tretman->tt_id = $tt_id;
                $tretman->cena = $cena;
                $tretman->description = $description;
                $tretman->keywords = $keywords;

                try {
                    // $result = $tretman->save();
                    $result = $tretman->insertTretman();

                    if($result){
                        return redirect()->route('adminPanel_tretmani',['id_tt'=>$tt_id])->with('poruka','Uspešan unos tretmana!');
                    }

                }
                catch(\Exception $ex){
                    Log::error("Greska:" .$ex->getMessage());
                    Log::error("Greska:" .$ex->getFile());
                    Log::error("Greska:" .$ex->getCode());
                }
            }
        }
    }

    public function adminPanel_tretmani_update($id_tretman){
        $tretman = new Tretman();
        $tretman->id_tretman = $id_tretman;

        $tipTretmana = new TipTretmana();

        try {
            $this->data['tretman'] = $tretman->getOneTretmanUpdate($id_tretman);

            $this->data['tip_tretmana'] = $tipTretmana->getAll();
            //            dd($this->data['tretman']);
            return view('pages.admin.adminPanel_tretmani_update',['id_tretman'=>$id_tretman], $this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function doAdminPanel_tretmani_update($id_tretman, TretmanRequest $request){
        if($request->has('btnIzmeni')){
            $t_naziv = $request->input('tbNaziv');
            $text_tretman = $request->input('taTekst');
            $tt_id = $request->input('ddlTipTretmana');
            $putanja_slika = $request->file('fSlika');
            $cena = $request->input('tbCena');
            $description = $request->input('description');
            $keywords = $request->input('keywords');
            $t_status = $request->input('ddlStatus');
            $tretman = new Tretman();

            $one = $tretman->getOneTretmanUpdate($id_tretman);
            $image_path = 'img/tretmani/' . $one->putanja_slika;


            if($putanja_slika){
                $tmp_path = $putanja_slika->getPathname();
                $extension = $putanja_slika->getClientOriginalExtension();
                $realName = $putanja_slika->getClientOriginalName();
                $new_path = 'img/tretmani/' . $realName;

                if(File::move($tmp_path, $new_path)) {

                    $tretman->id_tretman = $id_tretman;
                    $tretman->t_naziv = $t_naziv;
                    $tretman->text_tretman = $text_tretman;
                    $tretman->t_status = $t_status;
                    $tretman->tt_id = $tt_id;
                    $tretman->putanja_slika = $realName;
                    $tretman->cena = $cena;
                    $tretman->description = $description;
                    $tretman->keywords = $keywords;
                    try{
                        // $result = $tretman->save();
                        $result = $tretman->updateTretmanSaS($id_tretman);
                        if (file_exists($image_path)) {
                            File::delete($image_path);
                            @unlink($image_path);
                        }
                        if($result){
                            return redirect()->route('adminPanel_tretmani',['id_tt'=>$tt_id])->with('poruka','Uspešna izmena tretmana!');
                        }
                        else{
                            return redirect()->route('adminPanel_tretmani_update',['id_tretman'=>$id_tretman])->with('poruka','Neuspešna izmena tretmana! 1');
                        }
                    }
                    catch (\Exception $ex) {
                        Log::error("Greska:" . $ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_tretmani_update',['id_tretman'=>$id_tretman])->with('poruka','Greška pri postavljanju slike na server!');
                }
            }
            else{
                $tretman->t_naziv = $t_naziv;
                $tretman->text_tretman = $text_tretman;
                $tretman->t_status = $t_status;
                $tretman->tt_id = $tt_id;
                $tretman->cena = $cena;
                $tretman->description = $description;
                $tretman->keywords = $keywords;

                try{
                    // $result = $tretman->save();
                    $result = $tretman->updateTretmanBezS($id_tretman);
                    return redirect()->route('adminPanel_tretmani',['id_tt'=>$tt_id])->with('poruka','Uspešna izmena tretmana!');
                }
                catch (\Exception $ex) {
                        Log::error("Greska:" . $ex->getMessage());
                }
            }
        }
    }

    public function adminPanel_tretmani_delete($id_tt,$id_tretman){
        $tretman = new Tretman();
        $tretman->id_tretman = $id_tretman;

        $thisTretman = $tretman->getOneTretman($id_tt,$id_tretman);
        $image_path = 'img/' . $thisTretman->putanja_slika;
        //        dd($thisTretman);
        try{
            if($thisTretman->t_status == 1){
                $this->data['tretman'] = $tretman->deleteOneTretman($id_tretman);
                return redirect()->route('adminPanel_tretmani',['id_tt'=>$id_tt])->with('poruka','Uspešno izvršeno deaktiviranje tretmana!');
            }
            else{
                $this->data['tretman'] = $tretman->realDeleteOneTretman($id_tretman);
                if (file_exists($image_path)) {
                    File::delete($image_path);
                    //                    @unlink($image_path);
                }
                return redirect()->route('adminPanel_tretmani',['id_tt'=>$id_tt])->with('poruka','Uspešno brisanje tretmana!');
            }
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function adminPanel_searchTretmani(Request $request, $id_tt){
        $unos = $request->input('unos');

        $tip = TipTretmana::find($id_tt);
        $this->data['tt_naziv'] = $tip ? $tip->tt_naziv : null;
        $this->data['id_tt'] = $id_tt;
        $this->data['tretmani'] = Tretman::where('t_naziv','LIKE','%'.$unos.'%')
                                            ->orderBy('created_at','desc')
                                            ->paginate(6);
        $this->data['tretmani']->appends(['unos' => $unos]);
        if($request->ajax()){
            return response()->json([
                'html' => view('pages.partials_index.admin.search_tretman',$this->data)->render(),
            ]);
        }
        return view('pages.admin.adminPanel_tretmani',$this->data);

    }
}
