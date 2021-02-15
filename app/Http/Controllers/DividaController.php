<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DividaController extends Controller
{

    /**
     * apresenta tabela de dívidas
     */
    public function index(){
        return view('divida.index');
    }

    /**
     * mostra formulário de registro de dívida
     */
    public function form(Request $request){

    }

    /**
     * salva dívida
     */
    public function post(Request $request){

    }
}
