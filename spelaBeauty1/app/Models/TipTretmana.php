<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TipTretmana extends Model
{
    use HasFactory;

    public $primaryKey = 'id_tt';
    public $timestamps = false;
    protected $fillable = ["id_tt", "tt_naziv","tt_status","description","keywords"];

    public function tretmans(){
        return $this->hasMany(Tretman::class);
    }
    public function getOne($id_tt){
        return $rez = DB::table('tip_tretmanas')
            ->select('*')
            ->where('id_tt','=',$id_tt)
            ->first();
    }
    public function getAll(){
        return $rez = DB::table('tip_tretmanas as tt')
            ->select('*')
            ->where('tt_status','=','1  ')
            ->get();
    }

    // public function getTipTretmana($id_tt){
    //     return $rez = DB::table('tip_tretmanas as tt')
    //         ->join('tretmans as t', 't.tt_id', '=', 'tt.id_tt')
    //         ->select('t.*','tt.*')
    //         ->where(['tt.id_tt' => $id_tt])
    //         ->first();
    // }
    public function getAllTipTretmana()
    {
        return $rez = DB::table('tip_tretmanas as tt')
            ->select('*')
            ->orderBy('tt.tt_naziv','desc')
            ->simplePaginate(6);
    }

    // public function getAllTretmane($id_tt){
    //     return $rez = DB::table('tip_tretmanas as tt')
    //         ->join('tretmans as t','t.tt_id','=','tt.id_tt')
    //         ->select('t.*','tt.*')
    //         ->where(
    //             ['tt.id_tt'=>$id_tt,
    //             't.t_status'=>'1']
    //         )
    //         ->simplePaginate(5);
    // }

    public  function  getTretmanPoTT($id_tt){
        return $rez = DB::table('tretmans as t')
            ->join('tip_tretmanas as tt','t.tt_id','=','tt.id_tt')
            ->select('t.*','tt.*')
            ->where(
                ['t.t_status'=>'1',
                'tt.id_tt'=>$id_tt]
            )
            ->get();
    }
    public function getTretmane($id_tt){
        return $rez = DB::table('tip_tretmanas as tt')
            ->join('tretmans as t','tt.id_tt','=','t.tt_id' )
            ->select('*')
            ->where('t.tt_id', $id_tt)
            ->get();
    }
    public function deleteTipTretman($id_tt){
        return $rez = DB::table('tip_tretmanas as tt')
            ->where(
                ['tt.id_tt'=>$id_tt]
            )
            ->update(
                ['tt.tt_status'=>'0']
            );
    }
    public function realDeleteTipTretman($id_tt){
        return $rez = DB::table('tip_tretmanas')
            ->where(
                ['id_tt'=>$id_tt,
                'tt_status'=>'0']
            )
        ->delete();
    }
}
