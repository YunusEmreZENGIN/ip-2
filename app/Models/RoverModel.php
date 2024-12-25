<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoverModel extends Model
{
    use HasFactory;
    protected $fillable=[
        'rover_id',
        'operator_id',
        'bundle_id',
        'effiency',
        'processed_units',
        'operation_name',
        'quality',
    ];
}
