<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Card extends Model
{
    use HasFactory;
    protected $table = 'cards';
    protected $primaryKey = 'uid';
    public $incrementing = false;
    protected $keyType = 'string';
    public function type(){
        return $this->belongsTo(CardType::class,'type_id');
    }
}
