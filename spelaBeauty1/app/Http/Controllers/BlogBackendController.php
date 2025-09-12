<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Http\Requests\BlogRequest;
use App\Models\Zakazano;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class BlogBackendController extends BackendController
{
    public function adminPanel_blog()
    {
        try {
            $this->data['blog'] = Blog::orderBy('postavljeno','desc')
                                        ->paginate(6);
            return view('pages.admin.adminPanel_blog', $this->data);
        }
        catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function adminPanel_blog_insert()
    {
        return view('pages.admin.adminPanel_blog_insert', $this->data);
    }
    public function adminPanel_pregled_blog($id_blog){
        try{
            $this->data['oneBlog'] = Blog::getOne($id_blog);
            return view('pages.oneBlog',['id_blog'=>$id_blog],$this->data);
        }
        catch(\Exception $ex){
            Log::error("Greska:" .$ex->getMessage());
        }
    }
    public function doAdminPanel_blog_insert(BlogRequest $request)
    {
        if ($request->has('btnDodaj')) {
            $naslov = $request->input('tbNaslovBlog');
            $podnaslov = $request->input('tbPodnaslovBlog');
            $tekst = $request->input('tbTekstBlog');
            $slika = $request->file('unosSlike');
            $video_link = $request->input('tbVideo');
            $description = $request->input('description');
            $keywords = $request->input('keywords');

            $tmp_path = $slika->getPathname();
            $extension = $slika->getClientOriginalExtension();
            $realName = $slika->getClientOriginalName();
            $new_path = 'img/blog/' . $realName;
            $prenos = File::move($tmp_path, $new_path);

            if ($prenos) {
                $blog = new Blog();
                $blog->naslov_blog = $naslov;
                $blog->podnaslov_blog = $podnaslov;
                $blog->text_blog = $tekst;
                $blog->putanja_slika_blog = $realName;
                if($video_link){
                    $blog->video_link = $video_link;
                }
                $blog->postavljeno = time();
                $blog->status = '1';
                $blog->description = $description;
                $blog->keywords = $keywords;

                try {
                    $rez = $blog->save();
                    if ($rez) {
                        return redirect()->route('adminPanel_blog')->with('poruka', "Uspešno ste uneli blog!");
                    } else {
                        return redirect()->route('adminPanel_blog_insert')->with('poruka', "Neuspešan unos bloga!");
                    }
                }
                catch (\Exception $ex) {
                    Log::error("Greska:" . $ex->getMessage());
                }
            }
            else {
                $blog = new Blog();
                $blog->naslov_blog = $naslov;
                $blog->podnaslov_blog = $podnaslov;
                $blog->text_blog = $tekst;
                $blog->putanja_slika_blog = $realName;
                if($video_link){
                    $blog->video_link = $video_link;
                }
                $blog->postavljeno = time();
                $blog->status = '1';
                $blog->description = $description;
                $blog->keywords = $keywords;

                try {
                    $rez = $blog->save();
                    if ($rez) {
                        return redirect()->route('adminPanel_blog')->with('poruka', "Uspešno ste uneli blog!");
                    } else {
                        return redirect()->route('adminPanel_blog_insert')->with('poruka', "Neuspešan unos bloga!");
                    }
                }
                catch (\Exception $ex) {
                    Log::error("Greska:" . $ex->getMessage());
                }
            }
        }
    }

    public function adminPanel_blog_update($id_blog)
    {
        try {
            $this->data['blog'] = Blog::getOne($id_blog);
            return view('pages.admin.adminPanel_blog_update', $this->data);
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function doAdminPanel_blog_update($id_blog, BlogRequest $request)
    {
        if ($request->has('btnIzmeni')) {
            $naslov = $request->input('tbNaslovBlog');
            $podnaslov = $request->input('tbPodnaslovBlog');
            $tekst = $request->input('tbTekstBlog');
            $status = $request->input('ddlBlog');
            $slika = $request->file('unosSlike');
            $video_link = $request->input('tbVideo');
            $description = $request->input('description');
            $keywords = $request->input('keywords');

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
                    if($video_link){
                        $newBlog->video_link = $video_link;
                    }
                    $newBlog->postavljeno = time();

                    $newBlog->status = $status;
                    $newBlog->description = $description;
                    $newBlog->keywords = $keywords;

                    try {
                        $rez = $newBlog->save();

                        if (file_exists($image_path)) {
                            File::delete($image_path);
                            @unlink($image_path);
                        }
                        if ($rez) {
                            return redirect()->route('adminPanel_blog')->with('poruka', 'Uspešno ste izmenili blog sa slikom!');
                        } else {
                            return redirect()->route('adminPanel_blog_update', ['id_blog' => $id_blog])->with('poruka', "Neuspešna izmena bloga sa slikom!");
                        }
                    } catch (\Exception $ex) {
                        Log::error("Greska:" . $ex->getMessage());
                    }
                } else {
                    return redirect()->route('adminPanel_blog_update', ['id_blog' => $id_blog])->with('poruka', "Greka!Neuspešna izmena bloga!");
                }
            } else {
                $newBlog = Blog::find($id_blog);
                $newBlog->naslov_blog = $naslov;
                $newBlog->podnaslov_blog = $podnaslov;
                $newBlog->text_blog = $tekst;
                if($video_link){
                    $newBlog->video_link = $video_link;
                }
                $newBlog->postavljeno = time();
                $newBlog->status = $status;
                $newBlog->description = $description;
                $newBlog->keywords = $keywords;
                try {
                    $rez = $newBlog->save();
                    if ($rez) {
                        return redirect()->route('adminPanel_blog')->with('poruka', 'Uspešno ste izmenili blog!');
                    } else {
                        return redirect()->route('adminPanel_blog_update', ['id_blog' => $id_blog])->with('poruka', "Neuspešna izmena bloga!");
                    }
                } catch (\Exception $ex) {
                    Log::error("Greska:" . $ex->getMessage());
                }
            }
        }
    }

    public function adminPanel_blog_delete($id_blog)
    {
        $blog = new Blog();
        $thisBlog = $blog->getOne($id_blog);

        $image_path = 'img/blog/'.$thisBlog->putanja_slika_blog;
        try {
            if ($thisBlog->status == 1) {
                $blog->deleteOne($id_blog);
                return redirect()->route('adminPanel_blog')->with('poruka', 'Uspešno deaktiviranje bloga!');
            } else {
                $blog->realDeleteOne($id_blog);
                if (file_exists($image_path)) {
                    File::delete($image_path);
                @unlink($image_path);
                }
                return redirect()->route('adminPanel_blog')->with('poruka', 'Uspešno brisanje bloga!');
            }
        } catch (\Exception $ex) {
            Log::error("Greska:" . $ex->getMessage());
        }
    }

    public function sortByDate_blog(Request $request)
    {

        $unos = $request->post('unos'); //2021-09-11 GG-MM-DD
        // dd($unos);
        // return json_encode($unos);
        // $taken_date = explode('-', $unos);


        // $rez = Blog::getAllgetAllForSearch();
        $this->data['blog'] = Blog::whereDate('created_at',$unos)
                                    ->paginate(6);

        $this->data['blog']->appends(['unos' => $unos]);
        if($request->ajax()){
            // dd($this->data['blog']);
            if($this->data['blog']->isEmpty()){
                return response()->json([
                    'html' => '<div class="col-md-7 text-center mx-auto mb-3 alert alert-danger">Nema rezultata za uneti datum!</div>',
                ]);
            }
            return response()->json([
                'html' => view('pages.partials_index.admin.search_by_date_blog',$this->data)->render(),
            ]);
        }
        return view('pages.admin.adminPanel_blog',$this->data);

        // $podaci = null;
        // $array = null;

        // $podaci .= "<table class='table table-striped adminTable'>";
        // $podaci .= "<thead>";
        // $podaci .= "<tr>";
        // $podaci .= "<th scope='col' class='zaglavljeTabele'>#</th>";
        // $podaci .= "<th scope='col' class='zaglavljeTabele'>Naslov</th>";
        // $podaci .= "<th scope='col' class='zaglavljeTabele'>Podnaslov</th>";
        // $podaci .= "<th scope='col' class='zaglavljeTabele'>Text</th>";
        // $podaci .= "<th scope='col' class='zaglavljeTabele'>Slika</th>";
        // $podaci .= "<th scope='col' class='zaglavljeTabele'>Postavljeno</th>";
        // $podaci .= "<th scope='col' class='zaglavljeTabele'>Status</th>";
        // $podaci .= "<th scope='col' class='zaglavljeTabele'>Izmeni</th>";
        // $podaci .= "<th scope='col' class='zaglavljeTabele'>Obrisi</th>";
        // $podaci .= "</tr>";
        // $podaci .= "</thead>";
        // $podaci .= "<tbody>";
        // $i = 1;
        // foreach ($rez as $b) {
        //     $array .= $b->id_blog;
        //     // dd($b->postavljeno);
        //     $date = date("Y-m-d", $b->postavljeno);

        //     list($year, $month, $day) = explode('-', $date);
        //     //dd($day);
        //     if ($unos == $date) {
        //         $podaci .= "<tr>";
        //         $podaci .= "<th scope='row' class='tekstTabela'>" . $i . "</th>";
        //         $i++;
        //         $podaci .= "<td class='tekstTabela'>" . $b->naslov_blog . "</td>";
        //         $podaci .= "<td class='tekstTabela'>" . $b->podnaslov_blog . "</td>";
        //         $podaci .= "<td class='tekstTabela'>" . $b->text_blog . "</td>";
        //         $podaci .= "<td class='tekstTabela'><img class='img-fluid' src='" . asset('/') . "img/blog/" . $b->putanja_slika_blog . " ' width='200px' height='250px' alt='" . $b->naslov_blog . "'/></td>";
        //         $podaci .= "<td class='tekstTabela'>" . date('d.m.Y.', $b->postavljeno) . "</td>";
        //         if ($b->status == 1) {
        //             $podaci .= "<td class='tekstTabela'>Aktivan</td>";
        //         } else {
        //             $podaci .= "<td class='tekstTabela'>Neaktivan</td>";
        //         }
        //         $podaci .= "<td class='tekstTabela'><a class='linkA'  href='" . route('adminPanel_blog_update', ['id_blog' => $b->id_blog]) . "'>Izmeni</a></td>";
        //         $podaci .= "<td class='tekstTabela'><a  class='linkA'  href='" . route('adminPanel_blog_delete', ['id_blog' => $b->id_blog]) . "''>Obrisi</a></td>";
        //         $podaci .= "</tr>";
        //     }
        // }
        // $podaci .= "</tbody>";
        // $podaci .= "</table>";
        // return json_encode($podaci);

    }
}
