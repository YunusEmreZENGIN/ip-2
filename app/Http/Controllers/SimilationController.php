<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SimilationController extends Controller
{
    public function store(Request $request){
        $data = $request->json()->all();

        DB::table("üretim-loglari")->insert([
            "machine_id"=>$data["machine_id"],
            "rover_id"=>$data["rover_id"],
            "operator_id"=>$data["operator_id"],
            "effiency"=>$data["effiency"],
            "bundle_id"=>$data["bundle_id"],
            "processed_units"=>$data["processed_units"],
            "timestamp"=>$data["timestamp"],
            "created_at"=>now(),
            "updated_at"=>now()
        ]);
        return response()->json(["message"=>"Veri Başarıyla Kaydedildi"]);

    }
}
