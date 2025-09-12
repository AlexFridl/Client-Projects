<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Saradnici extends Model
{
    use HasFactory;


    public $id_saradnici;
    public $ime_saradnika;
    public $postavljeno;
    public $putanja_slika;
    public $status_slika;

    public $timestamps = false;
    public $primaryKey = 'id_saradnici';

    protected $fillable = ['ime_saradnika','postavljeno','putanja_slika','status_slika'];

    public function getAllAktivne(){
        return $rez = DB::table('saradnicis as s')
            ->select('*', 's.putanja_slika as slika_galerija','s.description as slika_description','s.keywords as slika_keywords')
            ->where('s.status_slika','=','1')
            // ->orderBy('s.postavljeno','desc')
            ->paginate(6);
    }

    public function deleteOne($id_saradnici){
        return DB::table('saradnicis as s')
            ->where(
                ['s.id_saradnici'=>$id_saradnici]
            )
            ->update(
                ['s.status_slika'=>'0']
            );
    }

    public function realDeleteOne($id_saradnici){
        return DB::table('saradnicis')
            ->where(
                ['id_saradnici'=>$id_saradnici,
                'status_slika'=>'0']
            )
           ->delete();
    }


}
