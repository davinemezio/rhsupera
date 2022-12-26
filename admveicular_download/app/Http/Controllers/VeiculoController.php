<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Veiculo ;
use App\Models\User;
use App\Models\Manutencao;

class VeiculoController extends Controller
{
    //dados para o index
   public function index(){
        return view('welcome');
   }  
   public function dashboard(){
       $user = auth()->user();
       $data = date('Y/m/d', strtotime(today(). '+ 7 days'));
       $dados = User::join('veiculos','user_id','=', 'users.id')
            ->join('manutencaos','veiculo_id','=', 'veiculos.id')
            ->whereDate('manutencaos.dt_manutencao','=', $data)
            ->where('users.id','=',$user->id)
            ->get();
        return view('dashboard', ['dados'=> $dados]);
}
//dados para cadastrar o veículo
    public function create(){
        return view('veiculos.cadastrar');
    }
//salva os dados do veículo do usuário logado
    public function store(Request $request){
        $dados = new Veiculo;

        $dados->marca = $request->marca;
        $dados->modelo = $request->modelo;
        $dados->ano = $request->ano;
        $dados->placa = $request->placa;
        $user = auth()->user();
        $dados->user_id = $user->id;

        $dados->save();
        return redirect('/veiculos/home')->with('msg', 'Cadastro executado com sucesso!'); 
    }
//busca no banco os dados do veículo
    public function consultar(){
        $veiculos = Veiculo::all();
        return view('veiculos.consultar',['veiculos' => $veiculos]);
    }
//busca os dados do veículo para apagar
    public function deletar(){
        $veiculos = Veiculo::all();
        return view('veiculos.deletar',['veiculos' => $veiculos]);
    }

// dados para a home: manutenção para os próximos 7 dias
    public function home(){
        $user = auth()->user();
        $dados = User::with('veiculos.manutencaos')->where('id' , $user->id)->first();
        return view('veiculos.home',['dados' => $dados]);
    }

    public function destroy(Request $request){
        Veiculo::findOrFail($request->id_veiculo)->delete();
        return redirect ('/veiculos/home')->with('msg', 'Veículo excluído com sucesso.');
    }
    
    public function edit(Request $request){
        $veiculo = Veiculo::findOrFail($request->id_veiculo);
        return view ('veiculos.edit', ['veiculo' => $veiculo]);
    }

    public function update(Request $request){
        Veiculo::findOrFail($request->id)->update($request->only(['marca','ano','placa','modelo']));
        return redirect ('/veiculos/home')->with('msg', 'Dados alterado com sucesso!');
    }
//dados para API
    public function getveiculos(){
        $dados = User::with('veiculos.manutencaos')->first();
        return $dados;
    }
}