<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Personel;

class KisiKayıtController extends Controller
{
    public function index()
    {
        return view('layouts.PersonelKayit');
    }

    public function store(Request $request)
    {
        // Doğrulama işlemleri
        $request->validate([
            'personel_no' => 'required|unique:personels',
            'first_name' => 'required',
            'last_name' => 'required',
            'birth_date' => 'required|date',
            'gender' => 'required',
            'marital_status' => 'required',
            'photo' => 'nullable|image|max:2048',
        ]);

        // Tüm istek verilerini alıyoruz
        $data = $request->all();

          if ($request->hasFile('photo')) {
        $data['photo'] = $request->file('photo')->storeAs('personel_photos', $request->file('photo')->getClientOriginalName(), 'public');
    }
        // Personel kaydını veritabanına ekliyoruz
        Personel::create($data);

        // Başarılı bir şekilde eklenmesi sonrası geri yönlendirme
        return redirect()->back()->with('success', 'Personel başarıyla eklendi.');
    }
}
