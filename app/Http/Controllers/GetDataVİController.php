<?php

namespace App\Http\Controllers;

use App\Models\RfidSession;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetDataVİController extends Controller
{
    public function getDataVİ(){
        $data = RfidSession::all();
    
        $mappedData = $data->map(function ($item) {
            $personCards = DB::table('cards')->where('uid', $item->rfid_personel)->first();
            $operationCards = DB::table('cards')->where('uid', $item->rfid_operasyon)->first();
            $bundleCards = DB::table('cards')->where('uid', $item->rfid_demet1)->first();
    
            $personMeta = $personCards ? json_decode($personCards->description, true) : [];
            $operationMeta = $operationCards ? json_decode($operationCards->description, true) : [];
            $bundleMeta = $bundleCards ? json_decode($bundleCards->description, true) : [];
    
            return [
                'date' => $item->created_at->format('Y-m-d'),
                'line' => $operationMeta['hat'] ?? 'Hat Gelmedi',
                'persNo' => $personMeta['personel_no'] ?? 'PersNo Gelmedi',
                'persAdi' => $personMeta['ad'] ?? 'PersAdi Gelmedi',
                'persSoyadi' => $personMeta['soyad'] ?? 'Pers Soyadi Gelmedi',
                'gunSure' => '540',
                'gerceklesenDakika' => '510',
                'kayipDakika' => '30',
                'kisiselVerimlilik' => 94.4,
                'isletmeyeKatkıverimlilik' => 88.3,
                'personelGorevi' => 'operator',
            ];
        });
    
        return response()->json($mappedData);
    }
    
}
