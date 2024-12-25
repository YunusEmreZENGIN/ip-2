<?php

use App\Http\Controllers\calculateAdetPercentage;
use App\Http\Controllers\ChartsController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\SimilationController;
use App\Http\Controllers\YeniController;
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
