<?php

namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use  App\Models\Divida;
use  App\Models\Devedor;
use Illuminate\Support\Facades\DB;

class DividaController extends Controller
{

    /**
     * apresenta tabela de dívidas
     */
    public function index(){

        $grupo_devedores = Devedor::all();

        return view('divida.index', compact('grupo_devedores'));
    }

    /**
     * mostra formulário de registro de dívida
     */
    public function form($devedor_id){
        
        return view('divida.form', compact('devedor_id'));
    }

    /**
     * salva dívida
     */
    public function post(Request $request){
        $dados = $request->all();


        $dados["devedor_id"] = $dados['devedor'];

        DB::beginTransaction();
        try{

            $devedor = Divida::create($dados);
            DB::commit();

        }catch(\Exception $e){
            DB::rollback();
            $request->flash();
            return back()->with('errors',['Ocorreu um erro e não foi possível registrar divida']);
        }

        return redirect( route( 'devedor.index', $dados['devedor'] ) )->with('success','Divida registrada com sucesso');
    }

    /**
     * deletar divida
     */
    public function delete($divida_id){

        $divida = Divida::where('id', $divida_id)->first();
        DB::beginTransaction();

        try{

            Divida::where('id',$divida_id)->delete();
            DB::commit();

        }catch(\Exception $e){

            DB::rollback();
            return back()->with('errors',['Ocorreu um erro e não foi possível excluir divida']);

        }

        return redirect( route( 'devedor.index', $divida->devedor_id ) )->with('success','Divida excluida com sucesso');
    }

}
