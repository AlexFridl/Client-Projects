<?php

namespace App\Http\Controllers;

use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Tretman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BlogerController extends BaseFrontendController
{
    public function blog()
    {
        $blog = new Blog();
        $tretmani = new Tretman();
        try {
            $this->data['tretmani'] = $tretmani->getTretamane();
            $this->data['blog'] = $blog->getAllBloger();
            return view('pages.blog.blog1', $this->data);
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function oneBlog($id_blog)
    {
        $blog = new Blog();
        try {
            $this->data['oneBlog'] = $blog->getOne($id_blog);
            return view('pages.blog.oneBlog', ['id_blog' => $id_blog], $this->data);
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function blog_blog()
    {
        $blog = new Blog();
        try {
            $this->data['blog'] = $blog->getAllAdmin();
            return view('pages.blog.sviBlogovi', $this->data);
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function blog_insert()
    {
        return view('pages.blog.unosBlog', $this->data);
    }

    public function doBlog_insert(BlogRequest $request)
    {
        if ($request->has('btnDodaj')) {
            $naslov = $request->input('tbNaslovBlog');
            $podnaslov = $request->input('tbPodnaslovBlog');
            $tekst = $request->input('tbTekstBlog');
            $slika = $request->file('unosSlike');
            // dd($slika);

            if ($slika) {
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $realName = $slika->getClientOriginalName();
                $new_path = 'img/blog/' . $realName;
                // $slika_ime = time() . '.' . $extension;

                $pak = File::move($tmp_path, $new_path);

                if ($pak) {
                    $blog = new Blog();
                    $blog->naslov_blog = $naslov;
                    $blog->podnaslov_blog = $podnaslov;
                    $blog->text_blog = $tekst;
                    $blog->putanja_slika_blog = $realName;
                    $blog->postavljeno = time();
                    $blog->status = '1';

                    try {
                        $rez = $blog->save();
                        if ($rez) {
                            return redirect()->route('all_blog')->with('poruka', "Uspešno ste uneli blog!");
                        } else {
                            return redirect()->route('blog_insert')->with('poruka', "Neuspešan unos bloga!");
                        }
                    } catch (\Exception $ex) {
                        Log::error("Greska:" . $ex->getMessage());
                    }
                }
            } else {
                return redirect()->route('blog_insert')->with('poruka', "Morate odabrati sliku!");
            }
        }
    }

    public function blog_update($id_blog)
    {
        $blog = new Blog();
        $blog->id_blog = $id_blog;
        try {
            $this->data['blog'] = $blog->getOne($id_blog);
            // dd($this->data['blog']);
            return view('pages.blog.izmeniBlog', $this->data);
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }

        // return view('pages.blog.izmeniBlog',['id_blog'=>$id_blog],$this->data);
    }

    public function doBlog_update($id_blog, Request $request)
    {
        if ($request->has('btnIzmeni')) {
        // dd($id_blog);
            $naslov = $request->input('tbNaslovBlog');
            $podnaslov = $request->input('tbPodnaslovBlog');
            $tekst = $request->input('tbTekstBlog');
            $status = $request->input('ddlBlog');
            $slika = $request->file('unosSlike');

            $one = Blog::getOne($id_blog);

            $image_path = 'img/blog/' . $one->putanja_slika_blog;

            if ($slika) {
                $tmp_path = $slika->getPathname();
                $extension = $slika->getClientOriginalExtension();
                $realName = $slika->getClientOriginalName();
                $new_path = 'img/blog/' . $realName;

                if (File::move($tmp_path, $new_path)) {
                    $newBlog = Blog::find($id_blog);
                    $newBlog->naslov_blog = $naslov;
                    $newBlog->podnaslov_blog = $podnaslov;
                    $newBlog->text_blog = $tekst;
                    $newBlog->putanja_slika_blog = $realName;
                    $newBlog->postavljeno = time();
                    $newBlog->status = $status;
                    try {
                        $rez = $newBlog->save();
                        if (file_exists($image_path)) {
                            File::delete($image_path);
                            @unlink($image_path);
                        }
                        if ($rez) {
                            return redirect()->route('all_blog')->with('poruka', 'Uspešno ste izmenili blog sa slikom!');
                        } else {
                            return redirect()->route('izmeniBlog', ['id_blog' => $id_blog])->with('poruka', "Neuspešna izmena bloga sa slikom!");
                        }
                    } catch (\Exception $ex) {
                        Log::error("Greska:" . $ex->getMessage());
                    }
                } else {
                    return redirect()->route('izmeniBlog', ['id_blog' => $id_blog])->with('poruka', "Greka!Neuspešna izmena bloga!");
                }
            } else {
                $newBlog = Blog::find($id_blog);
                $newBlog->naslov_blog = $naslov;
                $newBlog->podnaslov_blog = $podnaslov;
                $newBlog->text_blog = $tekst;
                $newBlog->postavljeno = time();
                $newBlog->status = $status;
                try {
                    $rez = $newBlog->save();
                    if ($rez) {
                        return redirect()->route('all_blog')->with('poruka', 'Uspešno ste izmenili blog!');
                    } else {
                        return redirect()->route('izmeniBlog', ['id_blog' => $id_blog])->with('poruka', "Neuspešna izmena bloga!");
                    }
                } catch (\Exception $ex) {
                    Log::error("Greska:" . $ex->getMessage());
                }
            }
        }


    }

    public function blog_delete($id_blog)
    {
        $blog = new Blog();
        $blog->id_blog = $id_blog;
        $thisBlog = $blog->($id_blog);
        // dd($thisBlog);
        try {
            if ($thisBlog->status == 1) {
                $blog->deleteOne($id_blog);
                return redirect()->route('all_blog')->with('poruka', 'Uspešno deaktiviranje bloga!');
            } else {
                $blog->realDeleteOne($id_blog);
                return redirect()->route('all_blog')->with('poruka', 'Uspešno brisanje bloga!');
            }
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function sortByDateBlog(Request $request)
    {
        $unos = $request->post('unos'); //2021-09-11
        // return json_encode($unos);
        list($year_sort, $month_sort, $day_sort) = explode('-', $unos);
        // dd($day_sort);

        $blog = new Blog();
        $rez = $blog->getAllgetAllForSearch();
        // return json_encode($rez);
        $podaci = null;
        $array = null;

        $podaci .= "<table class='table table-striped adminTable'>";
        $podaci .= "<thead>";
        $podaci .= "<tr>";
        $podaci .= "<th scope='col' class='zaglavljeTabele'>#</th>";
        $podaci .= "<th scope='col' class='zaglavljeTabele'>Naslov</th>";
        $podaci .= "<th scope='col' class='zaglavljeTabele'>Podnaslov</th>";
        $podaci .= "<th scope='col' class='zaglavljeTabele'>Text</th>";
        $podaci .= "<th scope='col' class='zaglavljeTabele'>Slika</th>";
        $podaci .= "<th scope='col' class='zaglavljeTabele'>Postavljeno</th>";
        $podaci .= "<th scope='col' class='zaglavljeTabele'>Status</th>";
        $podaci .= "<th scope='col' class='zaglavljeTabele'>Izmeni</th>";
        $podaci .= "<th scope='col' class='zaglavljeTabele'>Obrisi</th>";
        $podaci .= "</tr>";
        $podaci .= "</thead>";
        $podaci .= "<tbody>";
        $i = 1;
        foreach ($rez as $b) {
            $array .= $b->id_blog;
            // dd($b->postavljeno);
            $date = date("Y-m-d", $b->postavljeno);

            list($year, $month, $day) = explode('-', $date);
            //dd($day);
            if ($unos == $date) {
                $podaci .= "<tr>";
                $podaci .= "<th scope='row'>" . $i . "</th>";
                $i++;
                $podaci .= "<td class='tekstTabela'>" . $b->naslov_blog . "</td>";
                $podaci .= "<td class='tekstTabela'>" . $b->podnaslov_blog . "</td>";
                $podaci .= "<td class='tekstTabela'>" . $b->text_blog . "</td>";
                $podaci .= "<td class='tekstTabela'><img class='img-fluid' src='" . asset('/') . "img/blog/" . $b->putanja_slika_blog . " ' width='200px' height='250px' alt='" . $b->naslov_blog . "'/></td>";
                $podaci .= "<td class='tekstTabela'>" . date('d.m.Y.', $b->postavljeno) . "</td>";
                if ($b->status == 1) {
                    $podaci .= "<td class='tekstTabela'>Aktivan</td>";
                } else {
                    $podaci .= "<td class='tekstTabela'>Neaktivan</td>";
                }
                $podaci .= "<td class='linkA'><a class='linkA'  href='" . route('blog_update', ['id_blog' => $b->id_blog]) . "'>Izmeni</a></td>";
                $podaci .= "<td class='linkA'><a  class='linkA'  href='" . route('blog_delete', ['id_blog' => $b->id_blog]) . "''>Obrisi</a></td>";
                $podaci .= "</tr>";
            }
        }
        $podaci .= "</tbody>";
        $podaci .= "</table>";
        return json_encode($podaci);

    }

//    public function searchBlog(Request $request)
//    {
//        if ($request->has('btnSearch')) {
//            $unos = $request->post('unos');
//
//            $blog = new Blog();
//            $rez = $blog->searchBlog($unos);
//            //dd($rez);
//
//            $podaci = null;
//
//            //return json_encode($rez);
//            foreach ($rez as $item) {
//                $podaci .= "<article class='blog_item'>";
//                $podaci .= "<div class='blog_item_img'>";
//                $podaci .= "<img class='card-img rounded-0' width='400px' height='400px' src='" . asset('/') . "img/" . $item->putanja_slika_blog . "' alt='" . $item->naslov_blog . "'>";
//                $podaci .= "</div>";
//                $podaci .= "<div class='blog_details'>";
//                $podaci .= "<a class='d-inline-block' href='" . route('one_Blog', ['id_blog' => $item->id_blog]) . "'>";
//                $podaci .= "<h2>" . $item->naslov_blog . "</h2>";
//                $podaci .= "</a>";
//                $podaci .= "<h4>" . $item->podnaslov_blog . "</h4>";
//                $podaci .= "<p>";
//                $podaci .= substr($item->text_blog, 0, 200);
//                $podaci .= "(...)</p>";
//                $podaci .= "<b><a href='" . route('one_Blog', ['id_blog' => $item->id_blog]) . "' style='color:#B08EAD;'>Više</a></b>";
//                $podaci .= "</div>";
//                $podaci .= "</article>";
//            }
//            return json_encode($podaci);
//        }
//    }

    public function blog1(){
        $blog = new Blog();
        $tretmani = new Tretman();
        try {
            $this->data['tretmani'] = $tretmani->getTretamane();
            $this->data['blog'] = $blog->getAll();
//            dd($this->data['blog']);

            return view('pages.blog.blog1', $this->data);
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }

    }

    public function searchBloger(Request $request){
        $unos = $request->post('unos');
        //        dd($unos);
        //        return json_encode($unos);
        $blog = new Blog();
        $rez1 = $blog->searchBlog($unos);
        //        $rez1 = $blog->searchBlog($unos);
        $podaci = null;

        if($unos == null){
            $rez2 = $blog->searchWithouthParam();
            $podaci .= "<div style='width: 1400px;height: 100%;margin: 0px auto;'>";
            $podaci .=  "<div class='row justify-content-center' style='padding-bottom: 50px;'>";
            $podaci .=  "<div style='margin: 0px auto;margin-bottom: 50px;'>";
        $podaci .=  "<div style='float: none'>";
            foreach($rez2 as $b) {
                $podaci .= "<div class='col-md-4'  style='float: left;'>";
                $podaci .= "<div class='about_us_content' id='opisTretmana'>";
                $podaci .= "<h5><a class='tekst1' href='" . route('one_Blog', ['id_blog' => $b->id_blog]) . "'>" . $b->naslov_blog . "</a></h5>";
                $podaci .= "<p class='aktivanNeaktivan'>";
                $podaci .= substr($b->text_blog, 0, 200);
                $podaci .= "(...)</p>";
                $podaci .= "<p>";
                $podaci .= "<b><a href='" . route('one_Blog', ['id_blog' => $b->id_blog]) . "' class='navigacija'>Više</a></b>";
                $podaci .= "</p>";
                $podaci .= "<div class='about_us_video'>";
                $podaci .= "<img class='img-fluid' src='" . asset('/') . "img/blog/" . $b->putanja_slika_blog . "' width='250px' height='150px' alt='" . $b->naslov_blog . "'/>";
                $podaci .= "</div>";
                $podaci .= "</div>";
                $podaci .= "</div>";
            }
            $podaci .= "</div>";
            $podaci .= "</div>";
            $podaci .= "</div>";
            return json_encode($podaci);
        }
        else{
            //        $podaci .=  "<div class='poravnanje_Blog1' style='padding-bottom: 50px;'>";
            $podaci .=  "<div class='row justify-content-center' style='padding-bottom: 50px;'>";
            $podaci .=  "<div style='margin: 0px auto;margin-bottom: 50px;'>";
            //        $podaci .=  "<div style='float: none'>";
            foreach($rez1 as $b) {
                $podaci .= "<div class='col-md-4'  style='float: left;'>";
                $podaci .= "<div class='about_us_content' id='opisTretmana'>";
                $podaci .= "<h5><a style='color:#B08EAD;' href='" . route('one_Blog', ['id_blog' => $b->id_blog]) . "'>" . $b->naslov_blog . "</a></h5>";
                $podaci .= "<p>";
                $podaci .= substr($b->text_blog, 0, 200);
                $podaci .= "(...)</p>";
                $podaci .= "<p>";
                $podaci .= "<b><a href='" . route('one_Blog', ['id_blog' => $b->id_blog]) . "' style='color:#515828/*#B08EAD*/;'>Više</a></b>";
                $podaci .= "</p>";
                $podaci .= "<div class='about_us_video'>";
                $podaci .= "<img class='img-fluid' src='" . asset('/') . "img/blog/" . $b->putanja_slika_blog . "' width='250px' height='150px' alt='" . $b->naslov_blog . "'/>";
                $podaci .= "</div>";
                $podaci .= "</div>";
                $podaci .= "</div>";
            }
            $podaci .= "</div>";
            $podaci .= "</div>";
            return json_encode($podaci);
        }
        return json_encode($podaci);
    }


}
