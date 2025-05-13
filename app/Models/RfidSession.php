<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Card;
class RfidSession extends Model
{
    use HasFactory;
    protected $table ='rfid_sessions';
    protected $fillable = [
        'rfid_personel',
        'rfid_operasyon',
        'device_id',
        'rfid_demet1',
        'rfiddemetKartuid',
        'production_order',
        'customer_order',
        'model_code',
        'product',
    ];
    
    

    public function personCard()
    {
        return $this->hasOne(Card::class, 'uid', 'rfid_personel');
    }
    
    public function operationCard()
    {
        return $this->hasOne(Card::class, 'uid', 'rfid_operasyon');
    }
    
    public function bundleCard()
    {
        return $this->hasOne(Card::class, 'uid', 'rfid_demet1');
    }
    
}
