<?php

namespace App\Http\Controllers;

use App\Models\CardType;
use App\Models\ModelEkle;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Models\Personel;
use Illuminate\Support\Facades\Log;
class CardTypeController extends Controller
{
   
    public function CardType(){
        
        $cardTypes=CardType::all();
        $personel = Personel::all();
        $models=ModelEkle::all();
        $uids=DB::table('unknown_cards')->select('id','uid')->distinct()->get();

      
        return view("layouts.CardType",compact('cardTypes','personel','models','uids'));
       
   }
   
   public function store(Request $request)
   {
       $request->validate([
           'uid' => 'required',
           'card_type' => 'required|exists:card_types,id',
       ]);
   
       $cardTypeId = $request->card_type;
       $cardType = DB::table('card_types')->where('id', $cardTypeId)->first();
       $meta = [];
   
       if (Str::contains(strtolower($cardType->title), 'kişi')) {
           $request->validate([
               'first_name' => 'required',
               'last_name' => 'required',
               'personel_no' => 'required',
           ]);
           $meta = [
               'ad' => $request->first_name,
               'soyad' => $request->last_name,
               'personel_no' => $request->personel_no,
           ];
       } elseif (Str::contains(strtolower($cardType->title), 'operasyon')) {
           $request->validate([
               'line' => 'required',
               'operation' => 'required',
           ]);
           $meta = [
               'hat' => $request->line,
               'operasyon' => $request->operation,
           ];
       } elseif (Str::contains(strtolower($cardType->title), 'demet')) {
           $request->validate([
               'siparis_no' => 'required',
               'musteri_siparis_no' => 'required',
               'model_kodu' => 'required',
               'urun_adi' => 'required',
               'adet' => 'required|integer',
           ]);
           $meta = [
               'siparis_no' => $request->siparis_no,  // Corrected to match form input name
               'musteri_siparis_no' => $request->musteri_siparis_no,
               'model_kodu' => $request->model_kodu,
               'urun_adi' => $request->urun_adi,
               'adet' => $request->adet,
           ];
       }
   
       DB::table('cards')->insert([
           'uid' => $request->uid,
           'type_id' => $cardTypeId,
           'description' => json_encode($meta, JSON_UNESCAPED_UNICODE),
           'created_at' => now(),
           'updated_at' => now(),
       ]);
   
       return redirect()->back()->with('success', 'Kart başarıyla oluşturuldu.');
   }
   

    public function getMeta($id){
        $type=CardType::find($id);
        if(!$type){
            return response()->json(['error'=>"Kart Tipi Bulunamadi"],404);
        }
        return response()->json(['meta'=>$type->meta]);

    }
    public function getAdetRaporu(Request $request)
    {
        $adetRaporu = DB::table('rfid_sessions as rs')
            ->leftJoin('card_types as ct', 'rs.rfid_personel', '=', 'ct.uid')  // card_types tablosuyla ilişki kuruyoruz
            ->leftJoin('cards as c', 'ct.uid', '=', 'c.uid')  // cards tablosu ile UID'yi eşliyoruz
            ->select(
                'rs.date',
                'rs.line',
                'rs.productionOrder',
                'rs.customerOrder',
                'rs.modelCode',
                'rs.product',
                DB::raw("CONCAT(c.ad, ' ', c.soyad) as operator_name"),  // ad ve soyad'ı birleştiriyoruz
                'rs.operation',
                'rs.quantity'
            )
            ->get();

        // Veriyi JSON olarak döndürüyoruz
        return response()->json($adetRaporu);
    }
    

}
