<?php

namespace App\Http\Controllers;

use App\Models\Podaci;
use App\Models\Slajder;
use App\Models\Tretman;
use App\Models\Kategorija;
use App\Models\TipTretmana;
use App\Models\Saradnici;
use Illuminate\Http\Request;
use App\Models\Podkategorija;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\View;


class BaseFrontendController extends Controller
{
    public $data = [];

    public function __construct()
    {
        try{
            $this->data['tipTretmana'] = TipTretmana::get();
            $this->data['tretmani'] = Tretman::all();
            $this->data['slajder'] = Slajder::where('status', '1')->orderBy('sort','asc')->get();
            $this->data['saradnici'] = Saradnici::where('status_slika','=','1')->get();
            $this->data['podaci'] = Podaci::first();
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }
}
