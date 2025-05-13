<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReportsModel extends Model
{
    use HasFactory;
    protected $table = 'reports'; // Tablo adı
    protected $fillable = [
        'date', 'line', 'productionOrder', 'customerOrder',
        'modelCode', 'product', 'operator', 'operation', 'quantity'
    ];
}
