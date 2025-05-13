<?php

namespace App\Http\Controllers;

use App\Models\ModelEkle;
use Illuminate\Http\Request;

class ModelEkleController extends Controller
{
     public function create()
    {
        return view('layouts.modelEkle');   
    }

    public function store(Request $request)
    {
        // Validation
        $request->validate([
            'siparis_no' => 'required|string',
            'musteri_siparis_no' => 'required|string',
            'model_kodu' => 'required|string',
            'urun_adi' => 'required|string',
        ]);

        // Yeni model kaydetme
        $model = new ModelEkle();
        $model->siparis_no = $request->siparis_no;
        $model->musteri_siparis_no = $request->musteri_siparis_no;
        $model->model_kodu = $request->model_kodu;
        $model->urun_adi = $request->urun_adi;
        $model->save();

        // Başarılı kayıttan sonra yönlendirme
        return redirect()->route('model.create')->with('success', 'Model başarıyla tanımlandı!');
    }
}
