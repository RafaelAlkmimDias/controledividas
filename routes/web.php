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
Route::post('/divida',[DividaController::class,'post'])->name('divida.post');
Route::get('/divida/excluir/{divida_id}', [DividaController::class, 'delete'])->name('divida.excluir');

Route::get('/devedor/detalhes/{devedor_id}',[DevedorController::class,'index'])->name('devedor.index');
Route::get('/devedor/form/',[DevedorController::class,'form'])->name('devedor.form');
Route::post('/devedor/post',[DevedorController::class,'post'])->name('devedor.post');


