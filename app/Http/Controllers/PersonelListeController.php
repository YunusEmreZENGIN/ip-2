<?php

namespace App\Http\Controllers;

use App\Models\Personel;
use Illuminate\Http\Request;

class PersonelListeController extends Controller
{
    public function index(){
        $personeller =Personel::all();
        return view('layouts.PersonelListe',compact('personeller'));
    }
}
