<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DividaController;
use App\Http\Controllers\DevedorController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',[DividaController::class,'index'])->name('divida.index');
Route::get('/divida/{devedor_id}',[DividaController::class,'form'])->name('divida.form');
Route::post('/divida',[DividaController::class,'post'])->name('diviva.post');

Route::get('/devedor',[DevedorController::class,'index'])->name('divida.index');
Route::get('/devedor/form/',[DevedorController::class,'form'])->name('divida.form');
Route::post('/devedor/post',[DevedorController::class,'post'])->name('diviva.post');


