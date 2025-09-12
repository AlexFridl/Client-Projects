<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Podkategorija extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'id_podkategorija';
    public $foreignKey = 'kategorija_id';

    protected $fillable = ["podkat_naziv", "tekst_podkat","slika_putanja","kategorija_id","podkat_status","description","keywords"];

    public function kategorija(){
        return $this->belongsTo(Kategorija::class, 'kategorija_id', 'id_kategorija');
    }

}
