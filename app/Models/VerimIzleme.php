<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VerimIzleme extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'line', 'persNo', 'persAdi', 'persSoyadi', 'gunSure', 'gerceklesenDakika', 'kayipDakika', 'kisiselVerimlilik', 'isletmeyeKatkıverimlilik', 'personelGorevi'
    ];
}
