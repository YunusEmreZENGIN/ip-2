<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModelEkle extends Model
{
  protected $table='models';
  protected $fillable = [
    'siparis_no',
    'musteri_siparis_no',
    'model_kodu',
    'urun_adi',
  ];
}
