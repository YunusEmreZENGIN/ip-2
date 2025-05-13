<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RfidLog extends Model
{
    use HasFactory;
    protected $fillable=[
        'employee_uid',
        'operation_uid',
        'bundle_uid',
    ];
}
