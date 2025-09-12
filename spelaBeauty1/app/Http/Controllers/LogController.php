<?php

namespace App\Http\Controllers;

use App\Models\Korisnik;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Models\Podaci;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Exception;


class LogController extends BaseFrontendController
{
    public function logovanje(Request $request){
        return view('pages.logovanje',$this->data);
    }
    public function doLogovanje(Request $request)
    {
        if ($request->has('tbPotvrdi')) {

            $korIme = trim($request->input('tbKorIme'));
            $lozinka = trim($request->input('tbPassword'));

            $korisnik = new Korisnik();
            $korisnik->korisnicko_ime = $korIme;
            $korisnik->lozinka = md5($lozinka);
            //            dd($korisnik);
            try {
                $user = $korisnik->Logovanje($korIme, $lozinka);

                if ($user) {
                    $request->session()->put('user', $user);
                    //                    dd(session()->get('user'));
                    if (session()->has('user') && session()->get('user')->naziv == 'admin') {
                        return redirect()->route('adminPanel_tipTretman')->with('poruka', 'Uspešno logovanje kao administrator!');
                    }
                    elseif (session()->has('user') && session()->get('user')->naziv == 'bloger') {
                        return redirect()->route('bloger')->with('poruka', 'Uspešno logovanje kao bloger!');
                    }
                    //                    elseif (session()->has('user') && session()->get('user')->naziv == 'zaposleni') {
                    //                        return redirect()->route('zakazani')->with('poruka', 'Uspešno logovanje kao zaposleni!');
                    //                    }
                    else {
                        return redirect()->route('index')->with('poruka', 'Ne možete se ulogovati!');
                    }
                }
                else{
                    return redirect()->route('index')->with('poruka', 'Ne možete se ulogovati!');
                }
            }
            catch (\Exception $e) {
                Log::error('MOJA GRESKA: ' . $e->getMessage());
            }
        }
    }
    public function logout(Request $request){
        Auth::logout();
        Session::flush();
        return redirect()->route('index')->with('poruka','Izlogovani ste!');
   }

}
