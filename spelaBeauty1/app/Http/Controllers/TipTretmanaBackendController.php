<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipTretmanaRequest;
use App\Models\TipTretmana;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
class
TipTretmanaBackendController extends BackendController
{
    public $data = [];

    //TIP TRETMANA
    public function adminPanel_tipTretman()
    {
        $tipTretman = new TipTretmana();
        try {
            $this->data['tipTretman'] = $tipTretman->getAllTipTretmana();
            //            dd($this->data['tipTretman']);
            return view('pages.admin.adminPanel_tipTretmana', $this->data);
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function adminPanel_tipTretman_insert()
    {
        return view('pages.admin.adminPanel_tipTretmana_insert', $this->data);
    }

    public function doAdminPanel_tipTretman_insert(TipTretmanaRequest $request){
        if($request->has('btnUnesi')){
            $naziv = $request->input('tbNazivTipTretmana');

            $status = $request->input('ddlStatus');
            $description = $request->input('description');
            $keywords = $request->input('keywords');
            try{
                $rez = TipTretmana::create(array(
                    'tt_naziv'=>$naziv,
                    'tt_status'=>$status,
                    'description' => $description,
                    'keywords' => $keywords
                ));
                if($rez){
                    return redirect()->route('adminPanel_tipTretman')->with('poruka','Uspešno ste uneli tip tretmana!');
                }
                else{
                    return redirect()->route('adminPanel_tipTretman_insert')->with('poruka','Niste uneli tip tretmana!');
                }
            }
            catch (\Exception $ex) {
                Log::error("Greska:" . $ex->getMessage());
                Log::error("Greska:" . $ex->getLine());
                Log::error("Greska:" . $ex->getFile());
            }
        }
    }

    public function adminPanel_tipTretman_update($id_tt)
    {
        //        dd($id_tt);
        $tipTretman = new TipTretmana();
        $tipTretman->id_tt = $id_tt;
        try{
            $this->data['tipTretman'] = TipTretmana::find($id_tt);
            //            dd($this->data['tipTretman']);
            return view('pages.admin.adminPanel_tipTretmana_update',['id_tt'=>$id_tt], $this->data);
        }
        catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function doAdminPanel_tipTretman_update($id_tt, TipTretmanaRequest $request){
        if($request->has('btnIzmena')){

            $naziv = $request->input('tbNazivTipTretmana');
            $description = $request->input('description');
            $keywords = $request->input('keywords');

            $status = $request->input('ddlStatus');
            try{
                $tipTretmana = TipTretmana::find($id_tt);
                $tipTretmana->id_tt = $id_tt;
                $tipTretmana->tt_naziv = $naziv;
                $tipTretmana->tt_status = $status;
                $tipTretmana->description = $description;
                $tipTretmana->keywords = $keywords;

                $rez = $tipTretmana->save();
                if($rez){
                    return redirect()->route('adminPanel_tipTretman')->with('poruka','Uspešno ste izmenili tip tretmana!');
                }
                else{
                    return redirect()->route('adminPanel_tipTretman_insert')->with('poruka','Niste izmenili tip tretmana!');
                }
            }
            catch (\Exception $ex) {
                Log::error("Greska:" . $ex->getMessage());
            }
        }
    }

    public function adminPanel_tipTretman_delete($id_tt)
    {
        $tipTretman = new TipTretmana();
        $tipTretman->id_tt = $id_tt;
        $thisTipTretmani = TipTretmana::find($id_tt);
        try {
            if($thisTipTretmani->tt_status == 1){
                $tipTretman->deleteTipTretman($id_tt);
                return redirect()->route('adminPanel_tipTretman')->with('poruka', 'Uspešno deaktiviranje tipa tretmana!');
            }
            else{
                $tipTretman->realDeleteTipTretman($id_tt);
                return redirect()->route('adminPanel_tipTretman')->with('poruka', 'Uspešno brisanje tipa tretmana!');
            }
        }
        catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }
}
