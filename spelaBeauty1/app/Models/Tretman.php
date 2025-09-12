<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Tretman extends Model
{
    use HasFactory;

    public $table = 'tretmans';

    public $primaryKey = 'id_tretman';
    public $foreignKey = 'tt_id';

    public $timestamps = false;

    protected $fillable = ['t_naziv', 'text_tretman','t_status','tt_id','putanja_slika','description','keywords'];

    public function tipTretman(){
        return $this->belongsTo(TipTretmana::class);
    }


    public function slikas(){
        return $this->hasMany(Slika::class, 'tretman_id');
    }

    public function kategorijas(){
        return $this->hasMany(Kategorija::class, 't_id','id_tretman');
    }

    public function getAllAktivne(){
        return $rez = DB::table('tretmans')
            ->select('*')
            ->where( ['t_status'=>'1'])
            ->orderBy('id_tretman', 'asc')
            ->get();
    }

    public function getAll(){
        return $rez = DB::table('tretmans')
            ->select('*')
            ->get();
    }
    public function getTretamane(){
        return $rez = DB::table('tip_tretmanas as tt')
            ->join('tretmans as t','t.tt_id','=','tt.id_tt')
            ->select('*')
            ->where([
                ['t.t_status','=','0'],
            ])
            ->get()->toArray();
    }

    public function getOneTretmanPoTipu($id_tt){
        return $rez = DB::table('tretmans as t')
            ->join('tip_tretmanas as tt','t.tt_id','=','tt.id_tt')
            ->select('t.*')
            ->where(
                ['t.tt_id'=>$id_tt])
            ->get();
    }


    public function getOneTretman($id_tt,$id_tretman){
        return $rez = DB::table('tretmans as t')
            ->select('t.*')
            ->where(
                ['t.tt_id'=>$id_tt])
            ->where(['t.id_tretman'=>$id_tretman])
            ->first();
    }
    public function getOneTretmanUpdate($id_tretman){
        return $rez = DB::table('tip_tretmanas as tt')
            ->join('tretmans as t','t.tt_id','=','tt.id_tt')
            ->select('*')
            ->where(['t.id_tretman'=>$id_tretman])
            ->first();

    }
    // Admin Panel - Search Tretman
    //  public function searchTretamn($unos){
    //     return $rez = DB::table('tretmans as t')
    //         ->select('*')
    //         ->where('t.t_naziv','LIKE','%'.$unos.'%')
    //         ->orderBy('t.postavljeno','desc')
    //         ->paginate(6);
    // }
    public function deleteOneTretman($id_tretman){
        return $rez = DB::table('tretmans as t')
            ->where(
                ['t.id_tretman'=>$id_tretman]
            )
            ->update(
                ['t.t_status'=>'0']
            );
    }

    public function realDeleteOneTretman($id_tretman){
        return $rez = DB::table('tretmans')
            ->where(
                ['id_tretman'=>$id_tretman,
                't_status'=>'0']
            )
            ->delete();
    }

    public function insertTretman(){
        return $rez = DB::table('tretmans')
            ->insert([
                't_naziv'=>$this->t_naziv,
                'text_tretman'=>$this->text_tretman,
                't_status'=>$this->t_status,
                'tt_id'=>$this->tt_id,
                'putanja_slika'=>$this->putanja_slika,
                'cena' => $this->cena,
                'description'=>$this->description,
                'keywords'=>$this->keywords
            ]);
    }
    public function updateTretmanSaS($id_tretman){
        return $rez = DB::table('tretmans')
            ->where(
                ['id_tretman'=>$id_tretman]
            )
            ->update([
                't_naziv'=>$this->t_naziv,
                'text_tretman'=>$this->text_tretman,
                't_status'=>$this->t_status,
                'tt_id'=>$this->tt_id,
                'putanja_slika'=>$this->putanja_slika,
                'cena' => $this->cena,
                'description'=>$this->description,
                'keywords'=>$this->keywords
            ]);
    }

    public function updateTretmanBezS($id_tretman){
        return $rez = DB::table('tretmans')
            ->where(['id_tretman'=>$id_tretman])
            ->update([
                't_naziv'=>$this->t_naziv,
                'text_tretman'=>$this->text_tretman,
                't_status'=>$this->t_status,
                'tt_id'=>$this->tt_id,
                'cena' => $this->cena,
                'description'=>$this->description,
                'keywords'=>$this->keywords
            ]);
    }
    public function getTretmane($id_tt){
        return $rez = DB::table('tip_tretmanas as tt')
            ->join('tretmans as t','tt.id_tt','=','t.tt_id' )
            ->select('*')
            ->where('tt_id', $id_tt)
           ->orderBy('t.t_naziv','desc')
            ->simplePaginate(6);
            // ->get();
    }
}
