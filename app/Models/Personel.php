<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Personel extends Model
{
    
    protected $fillable = [
        'personel_no',
        'first_name',
        'last_name',
        'birth_date',
        'gender',
        'marital_status',
        'photo',
    ];
    
}
