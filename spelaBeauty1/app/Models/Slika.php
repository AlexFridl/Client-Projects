<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slika extends Model
{
    use HasFactory;


    public $id_slika;
    public $postavljeno;
    public $tretman_id;
    public $putanja_slika;
    public $status_slika;
    public $description;
    public $keywords;

    public $timestamps = false;
    public $primaryKey = 'id_slika';
    public $foreignKey = 'tretman_id';

    protected $fillable = ['postavljeno','tretman_id','putanja_slika','status_slika','description','keywords'];

    public function tretman(){
        return $this->belongsTo(Tretman::class,'tretman_id');
    }


    public function getAllAktivne(){
        return $rez = DB::table('slikas as s')
            ->join('tretmans as t','s.tretman_id','=','t.id_tretman')
            ->join('tip_tretmanas as tt','t.tt_id','=','tt.id_tt')
            ->select('*', 's.putanja_slika as slika_galerija','s.description as slika_description','s.keywords as slika_keywords')
            ->where('s.status_slika','=','1')
            // ->orderBy('s.postavljeno','desc')
            ->paginate(6);
    }

    // public function getAll(){
    //     return $rez = DB::table('slikas as s')
    //         ->join('tretmans as t','s.tretman_id','=','t.id_tretman')
    //         ->join('tip_tretmanas as tt','t.tt_id','=','tt.id_tt')
    //         ->select('*', 's.putanja_slika as slika_galerija','s.description as slika_description','s.keywords as slika_keywords')
    //         // ->orderBy('s.postavljeno','desc')
    //         ->paginate(6);
    // }

    public function getOneSlika($id_slika){
        return $rez = DB::table('slikas as s')
            ->join('tretmans as t','s.tretman_id','=','t.id_tretman')
            ->join('tip_tretmanas as tt','t.tt_id','=','tt.id_tt')
            ->select('*', 's.putanja_slika as slika_galerija','s.description as slika_description','s.keywords as slika_keywords')
            ->where(['s.id_slika'=>$id_slika])
            ->first();
    }
    public function insertSlikuGalerije(){
        return $rez = DB::table('slikas')
            ->insert(
                    ['postavljeno'=>$this->postavljeno,
                    'tretman_id'=>$this->tretman_id,
                    'putanja_slika'=>$this->putanja_slika,
                    'status_slika'=>$this->status_slika,
                    'description'=>$this->description,
                    'keywords'=>$this->keywords]
            );
    }

    public function doUpdateSaSlikom($id_slika){
        return $rez = DB::table('slikas')
            ->where(['id_slika'=>$id_slika])
            ->update([
                'postavljeno'=>time(),
                'tretman_id'=>$this->tretman_id,
                'putanja_slika'=>$this->putanja_slika,
                'status_slika'=>$this->status_slika,
                'description'=> $this->description,
                'keywords' => $this->keywords
            ]);
    }

    public function doUpdateBezSlike($id_slika){
        return $rez = DB::table('slikas')
            ->where(['id_slika'=>$id_slika])
            ->update([
                'postavljeno'=>$this->postavljeno,
                'tretman_id'=>$this->tretman_id,
                'status_slika'=>$this->status_slika,
                'description'=>$this->description,
                'keywords'=>$this->keywords
            ]);
    }

    public function deleteOne($id_slika){
        return DB::table('slikas as s')
            ->where(
                ['s.id_slika'=>$id_slika]
            )
            ->update(
                ['s.status_slika'=>'0']
            );
    }

    public function realDeleteOne($id_slika){
        return DB::table('slikas')
            ->where(
                ['id_slika'=>$id_slika,
                'status_slika'=>'0']
            )
           ->delete();
    }


}
