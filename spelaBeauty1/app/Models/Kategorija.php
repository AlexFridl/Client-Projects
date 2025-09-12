<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Kategorija extends Model
{
    use HasFactory;
    public $table = 'kategorijas';
    public $timestamps = false;
    public $primaryKey = 'id_kategorija';
    public $foreignKey = 't_id';


    protected $fillable = ["naslov_blog", "text_blog","podnaslov_blog","status","putanja_slika_blog","postavljeno","description","keywords"];

    public function podkategorijas(){
        return $this->hasMany(Podkategorija::class, 'kategorija_id', 'id_kategorija');
    }

    public function tretman(){
        return $this->belongsTo(Tretman::class, 't_id','id_tretman');
    }

    // public function getKategorijePoT($id_tretman){
    //     return $rez = DB::table('kategorijas')
    //         ->join('tretmans','t_id','=','id_tretman')
    //         ->select('*')
    //         ->where('t_id',$id_tretman)
    //         ->get();
    // }

    public function deleteOne($id_kategorija){
        return $rez = DB::table('kategorijas as k')
            ->where(
                ['k.id_kategorija'=>$id_kategorija]
             )
            ->update(
                ['k.k_status'=>'0']
            );
    }
}


