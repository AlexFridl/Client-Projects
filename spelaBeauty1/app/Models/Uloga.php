<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Uloga extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $primaryKey = 'id_uloga';

    public function korisnik(){
        return $this->belongsToMany(Korisnik::class, 'id_korisnik', 'id_uloga');
    }

}
