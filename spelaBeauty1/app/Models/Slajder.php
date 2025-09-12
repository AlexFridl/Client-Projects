<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Slajder extends Model
{
    public $timestamps = false;
    public $primaryKey = 'id_slajder';
    protected $fillable = ["naslov_slajder", "putanja_slajder","postavljeno","status","description","keywords"];

    use HasFactory;

    public function deleteOne($id_slajder){
        return DB::table('slajders')
            ->where(
                ['id_slajder'=>$id_slajder]
            )
            ->update(
                ['status'=>'0']
            );
    }

    public function realDeleteOne($id_slajder){
        return DB::table('slajders')
            ->where(
                ['id_slajder'=>$id_slajder],
                ['status'=>'1']
            )
            ->delete();
    }
}
