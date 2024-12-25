<?php

namespace App\Http\Controllers;

use App\Models\RoverModel;
use Illuminate\Http\Request;

class IndexController extends Controller
{
    public function index(){
        return view("layouts.anaekran");

    }
    public function adetRaporu(){
        return view("layouts.adetraporu");
    }
    
    public function verimİzleme(){
        return view("layouts.Verimİzleme");
    }

}
