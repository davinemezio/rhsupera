@extends('layouts.main')
@section('title','dashboard')
@section('content') 
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Meus Veiculos</h1>
</div>
<div id="veiculo-container">
    <div id="cards-container" class="row">
    @if(count($dados->veiculos)>0)
            <table class="table">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Marca</th>
                  <th scope="col">Modelo</th>
                  <th scope="col">Versão</th>
                  <th scope="col">Placa</th>
                  <th scope="col">Próxima Manutenção</th>
                </tr>
              </thead>
            <tbody> 
       @foreach($dados->veiculos as $veiculo)
       <tr>
        <td scropt="row"><a href="/veiculos/{{$veiculo->id}}">{{ $loop->index + 1 }}</a></td>
        <td>{{$veiculo->marca}}</a></td>
        <td>{{ $veiculo->modelo }}</td>
        <td>{{ $veiculo->ano }}</td>
        <td>{{ $veiculo->placa }}</td>
        @foreach($veiculo->manutencaos as $manutencao)
        <td>{{date('d/m/Y', strtotime($manutencao->dt_manutencao))}}</td>
  @endforeach
@endforeach
      </tbody>
      </table>
        @else
        <p>Você ainda não tem veículos cadastrados<a href="/veiculos/cadastrar">Cadastrar Veículo</a></p>
        @endif
    </div>
  </div>  
 
@endsection
