<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\Devedor;


class DevedorController extends Controller
{
    private $validation = [

    ];

    /**
     * apresenta dados do devedor
     */
    public function index($devedor_id){
        
        $devedor = Devedor::where('id',$devedor_id)->first();
        $grupo_dividas = $devedor->divida;

        return view('devedor.index',compact('devedor', 'grupo_dividas') );
    }

    /**
     * mostra formulário de registro de devedor
     */
    public function form(){
        return view('devedor.form');
    }

    /**
     * salva devedor
     */
    public function post(Request $request){
        
        $dados = $request->all();

        DB::beginTransaction();
        try{
            $dados['documento'] = $bodytag = str_replace(['.', ',', '-', '+'], ['', '', '', '+'], $dados['documento']);
            $devedor = Devedor::create($dados);
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            $request->flash();
            return back()->with('errors',['Ocorreu um erro e não foi possível registrar devedor']);
        }

        return redirect('/')->with('success','Devedor registrado com sucesso');

    }
}
