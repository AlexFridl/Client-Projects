<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Distribucija extends Model
{
    use HasFactory;

    protected $fillable = [
        'naslov_distribucija',
        'tekst_distribucija',
        'slika_distribucija'
    ];

    protected $table = 'distribucijas';
}
