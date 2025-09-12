<?php

namespace App\Http\Controllers;

use App\Http\Requests\SlajderRequest;
use Illuminate\Http\Request;
use App\Models\Slajder;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class SlajderBackendController extends BackendController{

    public function adminPanel_slajder(){
        $this->data['slajder']  = Slajder::orderBy('status','desc')->paginate(6);

        return view('pages.admin.adminPanel_slajder',$this->data);
    }

    public  function adminPanel_slajder_insert(){
        return view('pages.admin.adminPanel_slajder_insert',$this->data);
    }
    public function doAdminPanel_slajder_insert(SlajderRequest $request){
        if($request->has('btnUnesi')){
            $naslov = $request->input('tbNaslov');
            $status = $request->input('ddlStatus');
            $slika = $request->file('fSlika');
            $description = $request->input('description');
            $keywords = $request->input('keywords');

            if($slika){
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $realName = $slika->getClientOriginalName();
                //                $slika_ime = time().'_'.$realName;
                $new_path = 'img/slajder/' . $realName;

                if(File::move($tmp_path, $new_path)) {
                    try {
                        $rez = Slajder::create(
                            array(
                                'naslov_slajder' => $naslov,
                                'putanja_slajder' =>$realName,
                                'postavljeno' => time(),
                                'status' => $status,
                                // 'description' => $description,
                                // 'keywords' => $keywords
                            )
                        );
                        if($rez){
                            return redirect()->route('adminPanel_slajder')->with('poruka','Uspešno ste uneli sliku za sajder!');
                        }
                        else{
                            return redirect()->route('adminPanel_slajder_insert')->with('poruka','Niste uneli sliku za slajder!');
                        }
                    }
                    catch (\Exception $ex) {
                        Log::error("Greska:" . $ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_slajder')->with('poruka','Greška pri postavljanju slike na server!');
                }
            }
            else{
                return redirect()->route('adminPanel_slajder_insert')->with('poruka','Morate odabrati sliku!');
            }
        }


    }

    public  function adminPanel_slajder_update($id_slajder)
    {
        $this->data['slajder'] = Slajder::find($id_slajder);
        return view('pages.admin.adminPanel_slajder_update',$this->data);
    }
    public function doAdminPanel_slajder_update($id_slajder, SlajderRequest $request){
      if($request->has('btnIzmeni')){
            $naslov = $request->input('tbNaslov');
            $status = $request->input('ddlStatus');
            $slika = $request->file('fSlika');
            $one = Slajder::find($id_slajder);

            $image_path = 'img/slajder/' . $one->putanja_slajder;

            if($slika){
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $realName = $slika->getClientOriginalName();
                // $slika_ime = time().'_'.$realName;
                $new_path = 'img/slajder/' . $realName;

                if(File::move($tmp_path, $new_path)) {
                    $slajd = Slajder::find($id_slajder);
                    $slajd->id_slajder = $id_slajder;
                    $slajd->naslov_slajder = $naslov;
                    $slajd->putanja_slajder = $realName;
                    $slajd->postavljeno = time();
                    $slajd->status = $status;
                    if($status != $one->status && $status == 1){
                        $sort_positions = Slajder::where('sort', '!=', null)->pluck('sort')->toArray();
                        sort($sort_positions);
                        $sort_current_value = end($sort_positions)+1;
                        $slajd->sort = $sort_current_value;
                    }
                    else{
                        $slajd->sort = null;
                    }
                    try {
                        $rez = $slajd->save();
                        if (file_exists($image_path)) {
                            File::delete($image_path);
                            @unlink($image_path);
                        }
                        if($rez){
                            return redirect()->route('adminPanel_slajder')->with('poruka','Uspešno ste uneli sliku za sajder!');
                        }
                        else{
                            return redirect()->route('adminPanel_slajder_update')->with('poruka','Niste uneli sliku za slajder!');
                        }
                    }
                    catch (\Exception $ex) {
                        Log::error("Greska:" . $ex->getMessage());
                    }
                }
                else{
                    return redirect()->route('adminPanel_slajder')->with('poruka','Greška pri postavljanju slike na server!');
                }
            }
            else{
                $slajd = Slajder::find($id_slajder);
                $slajd->id_slajder = $id_slajder;
                $slajd->naslov_slajder = $naslov;
                $slajd->postavljeno = time();
                $slajd->status = $status;
                if($status != $one->status && $status == 1){
                        $sort_positions = Slajder::where('sort', '!=', null)->pluck('sort')->toArray();
                        sort($sort_positions);
                        $sort_current_value = end($sort_positions)+1;
                        $slajd->sort = $sort_current_value;
                }
                else{
                    $slajd->sort = null;
                }
                try {
                    $rez = $slajd->save();
                    if($rez){
                        return redirect()->route('adminPanel_slajder')->with('poruka','Uspešno ste izmenili podatke za slajder!');
                    }
                    else{
                        return redirect()->route('adminPanel_slajder_update')->with('poruka','Izmena nije uspela!');
                    }
                }
                catch (\Exception $ex) {
                    Log::error("Greska:" . $ex->getMessage());
                }
            }
        }
    }

    public function adminPanel_slajder_delete($id_slajder){
        $slajder = new Slajder();
        $slajder->id_slajder = $id_slajder;
        $sveSlike = $slajder->getOne($id_slajder);
        $image_path = 'img/slajder/' . $sveSlike->putanja_slajder;

        try{

            if($sveSlike->status == 1){
                $slajder->deleteOne($id_slajder);
                return redirect()->route('adminPanel_slajder')->with('poruka','Uspešno deaktiviranje slike slajdera!');
            }
            else{
                $slajder->realDeleteOne($id_slajder);
                if (file_exists($image_path)) {
                    // dd($image_path);
                    File::delete($image_path);
                    @unlink($image_path);
                }                return redirect()->route('adminPanel_slajder')->with('poruka','Uspešno brisanje slike slajdera!');
            }
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function adminPanel_slajder_sort(){
        $this->data['slajder']  = Slajder::where('sort','!=',null)
                                            ->where('status','=','1')
                                            ->orderBy('sort','asc')->get();

        $sortValues = $this->data['slajder']->pluck('sort')->toArray();
        $duplikati = array_filter(array_count_values($sortValues), function($count) {
            return $count > 1;
        });

        $duplikatneVrednosti = array_keys($duplikati);

        // Dobavi id-jeve koji imaju duplikatnu sort vrednost
        $duplikatniIdjevi = $this->data['slajder']
                                    ->filter(function ($s) use ($duplikatneVrednosti) {
                                            return in_array($s->sort, $duplikatneVrednosti);
                                    })->pluck('id_slajder')->toArray();

         return view('pages.admin.adminPanel_slajder_sort', [
            'podaci'    => $this->data['podaci'],
            'tipTretmana' =>  $this->data['tipTretmana'],
            'tretmani'  => $this->data['tretmani'],
            'slajder' => $this->data['slajder'],
            'duplikatniIdjevi' => $duplikatniIdjevi
        ]);
    }

    public function doAdminPanel_slajder_sort(Request $request){
        $sortData = $request->input('sortData');

        foreach($sortData as $item){
            $rez = Slajder::where('id_slajder', $item['id_slider'])
                ->update(['sort' => $item['sort_value']]);
        }
        return response()->json(['success' => true,
                                        'message' => 'Slajderi su uspešno sortirani!']);
    }


}
