<?php

namespace App\Models;

use App\Http\Controllers\FrontendCotroller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Blog extends Model
{
    use HasFactory;

    public $primaryKey = 'id_blog';

    protected $fillable = ["naslov_blog", "text_blog","podnaslov_blog","status","putanja_slika_blog","postavljeno","description","keywords"];


    public function getAllBlog(){
        //BlogerController@index
        // FrontendCotroller@blog1/blog2/blog3

        return $rez = DB::table('blogs as b')
            ->select('*')
            ->where('b.status','=','1')
            ->orderBy('b.postavljeno','desc')
            ->paginate(3);
    }

    public function getAllForSearch(){
        // BlogerController@sortByDateBlog
        //BlogBackendController@sortByDate_blog

        return $rez = DB::table('blogs as b')
            ->select('*')
            ->where([
                ['b.status','=','1']
            ])
            ->orderBy('b.postavljeno','desc')
            ->get();
    }
    public static function getOne($id_blog){
        // BlogBackendController@adminPanel_pregled_blog
        //BlogerController@oneBlog/blog_update/doBlog_update/
        //FrontendController@oneBlog

        return $rez = DB::table('blogs')
            ->select('*')
            ->where(
                ['id_blog'=>$id_blog]
            )
            ->first();
    }

    public function deleteOne($id_blog){
        return $rez = DB::table('blogs as b')
            ->where(
                ['b.id_blog'=>$id_blog]
             )
            ->update(
                ['b.status'=>'0']
            );
    }

    public function realDeleteOne($id_blog){
        return $rez = DB::table('blogs')
            ->where(
                ['id_blog'=>$id_blog,
                'status'=>'0']
            )
            ->delete();
    }

    public function searchBlog($unos){
        return $rez = DB::table('blogs as b')
            ->select('*')
            ->where('b.naslov_blog','LIKE','%'.$unos.'%')
            ->orWhere('b.text_blog','LIKE','%'.$unos.'%')
            ->orWhere('b.podnaslov_blog','LIKE','%'.$unos.'%')
            ->orderBy('b.postavljeno','desc')
            ->where([
                ['b.status','=','1']
            ])
            ->paginate(3);
    }

    // public function searchWithouthParam(){
    //     return $rez = DB::table('blogs as b')
//            ->join('slikas as s','b.slika_id','=','s.id_slika')
            // ->select('*')
//            ->where('b.naslov_blog','LIKE','%'.$unos.'%')
//            ->orWhere('b.text_blog','LIKE','%'.$unos.'%')
//            ->orWhere('b.podnaslov_blog','LIKE','%'.$unos.'%')
//            ->orderBy('b.postavljeno','desc')
    //         ->get();
    // }

}
