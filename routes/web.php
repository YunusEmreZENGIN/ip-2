<?php

use App\Http\Controllers\Api\UnknownCardController;
use App\Http\Controllers\calculateAdetPercentage;
use App\Http\Controllers\CardTypeController;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\GetDataARController;
use App\Http\Controllers\GetDataVİController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\KisiKayıtController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ModelEkleController;
use App\Http\Controllers\PersonelListeController;
use App\Http\Controllers\RfidController;
use App\Http\Controllers\SimilationController;
use App\Http\Controllers\UnkownCardController;
use App\Http\Controllers\YeniController;
use App\Http\Middleware\VerifyCsrfToken;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get("/" , [ChartsController::class,"showCharts"])->name('layouts.anaekran');
Route::post('/',[ChartsController::class,"calculateAdetPercentage"])->name('calculate.adet');
Route::get("/adetRaporu", [IndexController::class,"adetRaporu"])->name('layouts.adetraporu');
Route::get("/verimİzleme",[IndexController::class,"verimİzleme"])->name('layouts.Verimİzleme');
Route::get('/veriGönderme',[IndexController::class,"veriGönderme"])->name('layouts.veriGönderme');
Route::get('/getData',[GetDataARController::class,"getData"])->name('getData');
Route::post('/rfid-data', [RfidController::class,'store']);



Route::get('/CardType',[CardTypeController::class,"CardType"])->name('CardType');
Route::post('/rfid-cards',[CardTypeController::class,"store"])->name('rfid-cards.store');
//Route::get('/get-card-meta/{id}',[CardTypeController::class,"getMeta"]);
Route::get('/get-card-fields/{id}', [CardTypeController::class, 'getFields']);
Route::get('get-data-vi',[GetDataVİController::class,"getDataVİ"]);
Route::get('/personel-kayit',[KisiKayıtController::class,"index"])->name('layouts.PersonelKayit');
Route::post('/personelkayit',[KisiKayıtController::class,"store"])->name('personel.store');
Route::get('model-ekle',[ModelEkleController::class,"create"])->name('model.create');
Route::post('modelekle',[ModelEkleController::class,"store"])->name('model.store');
Route::post('/unknowncards',[UnknownCardController::class,"store"]);
Route::get('/personel-liste',[PersonelListeController::class,"index"])->name('personel.liste');