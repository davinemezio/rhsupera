<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Manutencao;
use App\Models\Veiculo;

class ManutencaoController extends Controller
{
    public function store(Request $request){
        $dados = new Manutencao; 

        $dados->dt_manutencao = $request->data;
        $dados->tx_manutencao = $request->manutencao;
        $dados->veiculo_id = $request->id_veiculo;
        $dados->save();
        return redirect('/veiculos/home')->with('msg', 'Dados da manutenção salvos com sucesso!'); 
    }
    
    public function create(){
        $veiculos = new Veiculo;
        $veiculos = Veiculo::all();

        return view('veiculos.manutencao.cadastrar', ['veiculos' => $veiculos]);
    }

    public function consultar($id){
        $dados = Manutencao::Where('veiculo_id',$id)->get();
        $manutencaoOwner = $id;
        return view('veiculos.manutencao.consultar', ['manutencaos' => $dados, 'manutencaoOwner'=> $manutencaoOwner]);
    }

    public function buscar(){
        $veiculos = new Veiculo;
        $veiculos = Veiculo::all();
        return view('veiculos.manutencao.buscaveiculo', ['veiculos'=> $veiculos]);
    }

    public function edit($id){        
        $manutencao = Manutencao::findOrFail($id);
        $veiculo = Manutencao::with('veiculo')->where('id', $id)->first();
        return view('veiculos.manutencao.edit', ['manutencao'=> $manutencao, 'veiculo' => $veiculo]);
    }

    public function manutencao(Request $request){
        $veiculos = new Veiculo;
        $veiculos = Veiculo::Where('id',$request->id_veiculo)->get();
        
        $dados = Manutencao::Where('veiculo_id',$request->id_veiculo)->get();
    return view('veiculos.manutencao.buscar', ['manutencao'=> $dados, 'veiculo'=> $veiculos]);
    }

    public function update(Request $request){
        Manutencao::findOrFail($request->id)->update($request->only(['dt_manutencao','tx_manutencao']));
        return redirect ('/veiculos/home')->with('msg', 'Dados alterado com sucesso!');
    }

    public function destroy(Request $request){
        Manutencao::findOrFail($request->id)->delete();
        return redirect ('/veiculos/home')->with('msg', 'Manutenção excluída com sucesso.');
    }
}
