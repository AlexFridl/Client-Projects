<?php

namespace App\Http\Controllers;

use App\Models\Podaci;
use App\Models\Termini;
use App\Models\TipTretmana;
use App\Models\Tretman;
use App\Models\Kategorija;
use App\Models\Podkategorija;
use App\Models\Blog;
use App\Models\Slika;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

class FrontendCotroller extends BaseFrontendController
{

    public function index(Request $request){
        try{

            return view('pages.pocetna',$this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function tretmani($id_tt, $id_tretman){
        try{
            $this->data['id_tt'] = $id_tt;
            $this->data['id_tretman'] = $id_tretman;
            $this->data['tretman'] = Tretman::find($id_tretman);
            $this->data['kategorije'] = Kategorija::with('tretman')
                                                    ->where('t_id', $id_tretman)
                                                    ->get();
            foreach($this->data['kategorije'] as $k_id){
                $this->data['podkategorije'] = Podkategorija::with('kategorijas')
                                                    ->where('kategorija_id',$k_id)
                                                    ->first();
                                                    // dd($this->data['podkategorije']);
            }

        return view('pages.tretmani', $this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }
    public function kategorija($id_tt, $id_tretman, $id_kategorija, Request $request){
        // dd($id_kategorija);
        try{
            $this->data['id_tt'] = $id_tt;
            $this->data['id_tretman'] = $id_tretman;

            $this->data['tretman'] = Tretman::find($id_tretman);

            $this->data['kategorija'] = Kategorija::with('tretman','podkategorijas')
                                                    ->where('t_id', $id_tretman)
                                                    ->where('id_kategorija', (int)$id_kategorija)
                                                    ->first();
            // dd($this->data['kategorija']);

         if($this->data['kategorija']){
                // dd($this->data['kategorija']);
                if($this->data['kategorija']->podkategorijas->isNotEmpty()){
                    //Kategorija ima podkategorije
                    // ovde treba da mi vrati str. sa tekstom kategorije i sa leve strane meni sa podkategorijama
                    if(request()->ajax()){
                        return response()->json([
                            'status' => 'sa_podkategorijama',
                            'kategorija' => $this->data['kategorija'],
                            'podkategorije' => $this->data['kategorija']->podkategorijas,
                            'tretman' => $this->data['tretman']
                        ]);
                    }
                    else{
                        $this->data['status'] = 'kategorija';
                        return view('pages.ne_ajax_stranica.tretman_kategorije_bez_ajax', $this->data);
                    }
                }
                else{
                  if(request()->ajax()){
                        // Kategorija nema podkategorije
                        // ovde treba da mi vrati str. sa tekstom kategorije
                        return response()->json([
                            'status' => 'bez_podkategorija',
                            'kategorija' => $this->data['kategorija'],
                            'tretman' => $this->data['tretman']
                        ]);
                    }
                    // else{
                    //     $this->data['status'] = 'kategorija';
                    //     return view('pages.ne_ajax_stranica.tretman_kategorije_bez_ajax', $this->data);
                    // }
                }
            }
            else{
                    return view('pages.ne_ajax_stranica.tretman_kategorije_bez_ajax', $this->data);
            }
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
            return response()->json([
                'status' => 'greska',
                'poruka' => 'Nema kategorije.'
            ], 500);
        }
    }

    public function podkategorija($id_tt, $id_tretman, $id_kategorija, $id_podkategorija){

        $this->data['tretman'] = Tretman::find($id_tretman);

        $this->data['kategorija'] = Kategorija::with('tretman','podkategorijas')
                                ->where('t_id', $id_tretman)
                                ->where('id_kategorija', (int)$id_kategorija)
                                ->first();
         $this->data['podkategorija'] = Podkategorija::with('kategorija')
                                                    ->where('id_podkategorija',$id_podkategorija)
                                                    ->first();

        if(request()->ajax()){
            return response()->json([
                                    'status' => 'podkategorija',
                                    'kategorija' => $this->data['kategorija'],
                                    'podkategorija' => $this->data['podkategorija'],
                                    'tretman' => $this->data['tretman'],
            ]);
        }
        else{
            $this->data['status'] = 'podkategorija';
            return view('pages.ne_ajax_stranica.tretman_kategorije_bez_ajax', $this->data);
        }

    }

    public function oneBlog($id_blog){
        try{
            $this->data['oneBlog'] = Blog::getOne($id_blog);
            return view('pages.oneBlog',['id_blog'=>$id_blog],$this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }

   public function search(Request $request)
   {
           $unos = $request->post('unos');

           $blog = new Blog();
           $rez = $blog->searchBlog($unos);
           $podaci = null;

           foreach ($rez as $item) {
               $podaci .= "<article class='blog_item'>";
               $podaci .= "<div class='blog_item_img'>";
               $podaci .= "<img class='card-img rounded-0' width='400px' height='400px' src='".asset('/')."img/".$item->putanja_slika_blog."' alt='".$item->naslov_blog."'>";
               $podaci .= "</div>";
               $podaci .= "<div class='blog_details'>";
               $podaci .= "<a class='d-inline-block' href='".route('one_Blog',['id_blog'=>$item->id_blog])."'>";
               $podaci .= "<h2 class='tekst1'>".$item->naslov_blog."</h2>";
               $podaci .= "</a>";
               $podaci .= "<h4 class='tekst'>".$item->podnaslov_blog."</h4>";
               $podaci .= "<p>";
               $podaci .= substr($item->text_blog,0,200);
               $podaci .= "(...)</p>";
               $podaci .= "<b><a href='".route('one_Blog',['id_blog'=>$item->id_blog])."' class='tekst1' '>Više</a></b>";
               $podaci .= "</div>";
               $podaci .= "</article>";
           }
           return json_encode($podaci);
       }

    public function blog1(){
        $blog = new Blog();
        $tretmani = new Tretman();

        try{
            $this->data['blog'] = $blog->getAllBlog();
            return view('pages.blog1',$this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }

    public function blog2(){
        $blog = new Blog();
        $tretmani = new Tretman();

        try{
            $this->data['blogovi'] = $blog->getAllBlog();
            return view('pages.blog2',$this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
            return view('pages.blog2',['blogovi'=>collect()]);
        }
    }

    public function blog3(){
        $blog = new Blog();

        try{
            $this->data['blogovi'] = $blog->getAllBlog();
            return view('pages.blog3',$this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
            return view('pages.blog3',['blogovi'=>collect()]);
        }
    }
    public function searchBlog1(Request $request){
        $unos = $request->post('unos');
        $blog = new Blog();
        $rez = $blog->searchBlog($unos);
        $podaci = null;

        if($unos == null){
            $rez2 = $blog->searchWithouthParam();
            $podaci .=  "<div class='row justify-content-center' style='padding-bottom: 50px;'>";
            $podaci .=  "<div style='margin: 0px auto;margin-bottom: 50px;'>";
            foreach($rez2 as $b) {
                $podaci .= "<div class='col-md-4'  style='float: left;'>";
                $podaci .= "<div class='about_us_content' id='opisTretmana'>";
                $podaci .= "<h5><a class='tekst1' href='" . route('one_Blog', ['id_blog' => $b->id_blog]) . "'>" . $b->naslov_blog . "</a></h5>";
                $podaci .= "<p class='tekst'>";
                $podaci .= substr($b->text_blog, 0, 200);
                $podaci .= "(...)</p>";
                $podaci .= "<p>";
                $podaci .= "<b><a href='" . route('one_Blog', ['id_blog' => $b->id_blog]) . "' class='tekst'>Više</a></b>";
                $podaci .= "</p>";
                $podaci .= "<div class='about_us_video'>";
                $podaci .= "<img class='img-fluid sredinaZaSliku' src='" . asset('/') . "img/blog/" . $b->putanja_slika_blog . "' width='250px' height='150px' alt='" . $b->naslov_blog . "'/>";
                $podaci .= "</div>";
                $podaci .= "</div>";
                $podaci .= "</div>";
            }
            $podaci .= "</div>";
            $podaci .= "</div>";
            return json_encode($podaci);
        }
        else{
            $podaci .=  "<div id='ispis' class='row justify-content-center'>";
            $podaci .=  "<div class='col-md-12 mt-3'>";
            $podaci .=  "<div style='float: none'>";
            foreach($rez as $b) {
                $podaci .= "<div class='col-md-4'  style='float: left;'>";
                $podaci .= "<div class='about_us_content' id='opisTretmana'>";
                $podaci .= "<h5><a class='tekst1' href='" . route('one_Blog', ['id_blog' => $b->id_blog]) . "'>" . $b->naslov_blog . "</a></h5>";
                $podaci .= "<p class='tekst'>";
                $podaci .= substr($b->text_blog, 0, 200);
                $podaci .= "(...)</p>";
                $podaci .= "<p>";
                $podaci .= "<b><a href='" . route('one_Blog', ['id_blog' => $b->id_blog]) . "' class='tekst'>Više</a></b>";
                $podaci .= "</p>";
                $podaci .= "<div class='about_us_video'>";
                $podaci .= "<img class='img-fluid sredinaZaSliku' src='" . asset('/') . "img/blog/" . $b->putanja_slika_blog . "' width='250px' height='150px' alt='" . $b->naslov_blog . "'/>";
                $podaci .= "</div>";
                $podaci .= "</div>";
                $podaci .= "</div>";
            }
            $podaci .= "</div>";
            $podaci .= "</div>";
            $podaci .= "</div>";

            // $podaci .= "<div class='row justify-content-center' id='ispis'>";
            // $podaci .= "<div class='col-md-12 mt-5'>";
            // $podaci .= $blog->links();
            // $podaci .= "</div>";
            // $podaci .= "</div>";
        return json_encode($podaci);
        }
    }
    public function searchBlog2( Request $request){
        $unos = $request->input('unos');
        $blog = new Blog();
        $this->data['blogovi'] = $blog->searchBlog($unos);
        $this->data['blogovi']->appends(['unos' => $unos]);

        if($request->ajax()){
            return response()->json([
                'html' => view('pages.partials_index.search_blog2', $this->data)->render(),
            ]);
        }
        return view('pages.blog2', $this->data);

    }

    public function searchBlog3(Request $request){
        $unos = $request->input('unos');
        $blog = new Blog();
        $this->data['blogovi'] = $blog->searchBlog($unos);
        $this->data['blogovi']->appends(['unos' => $unos]);
        if($request->ajax()){
            return response()->json([
                'html' => view('pages.partials_index.search_blog3',$this->data)->render(),
            ]);
        }
        return view('pages.blog3',$this->data);
    }

    // public function galerija(){
    //     $this->data['galerija'] =  Slika::with('tretman')->paginate(3);
    //     return view('pages.galerija', $this->data);
    // }

    public function kontakt(){
        return view('pages.kontakt',$this->data);
    }

    public function doKontakt(Request $request){
        $name = $request->name;
        $email = $request->email;
        $subject = $request->subject;
        $poruka = $request->message;

        require base_path().'/vendor/autoload.php';
        $mail = new PHPMailer(true);

        try{
            //Server settings
            $mail->SMTPDebug = 0;
            $mail->isSMTP();
            $mail->Host = "smtp.gmail.com";
            $mail->SMTPAuth = true;
            $mail->Username   = 'bebelak@gmail.com';
            $mail->Password   = 'fevj zbyz axui oxas';
            $mail->Mailer = "smtp";

            $mail->SMTPSecure = 'tls';
            $mail->Port       = 587; //za tls

            //Recipients
            $mail->setFrom($email,$name ); // Stavi svoju adresu kao From
            $mail->addReplyTo($email, $name); // Koristi korisnički mejl za odgovor
            $mail->addAddress('bebelak@gmail.com'); // Mejl gde će stići poruka

            // Content
            $mail->isHTML(true);
            $mail->CharSet = 'UTF-8';
            $mail->Subject = $subject;
                $mailText = "<table>";
                $mailText .= "<tr><td>Ime i prezime: ".$name."</td></tr>";
                $mailText .= "<tr><td>Email: ".$email."</td></tr>";
                $mailText .= "<tr><td>Naslov mejla: <br>".$subject."</td></tr>";
                $mailText .= "<tr><td>Poruka: <br>".$poruka."</td></tr>";
                $mailText .= "</table>";

            $mail->Body = $mailText;
            $rez = $mail->send();
            if (!$rez) {
                return redirect()->route('kontakt')->with('poruka', "Mejl nije poslat. Greška:',$mail->ErrorInfo");
            }
            else {
                return redirect()->route('kontakt')->with('poruka', "Mejl je poslat.");
            }
        }
        catch (\Exception $ex) {
            Log::error('Greska: ' . $ex->getMessage());
        }
    }
}

