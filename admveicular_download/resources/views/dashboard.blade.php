@extends('layouts.main')
@section('title','dashboard')
@section('content')
<div class="col-md-10 offset-md-1 dashboard-title-container">
    <h1>Veiculos com Manutenção prevista para sete dias:</h1>
</div>
<div id="veiculo-container">
    <div id="cards-container" class="row">
    @if(!empty($dados))
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
       @foreach($dados as $dado) 
       <tr>
        <td scropt="row"><a href="/veiculos/{{$dado->id}}">{{ $loop->index + 1 }}</a></td>
        <td>{{$dado->marca}}</a></td>
        <td>{{ $dado->modelo }}</td>
        <td>{{ $dado->ano }}</td>
        <td>{{ $dado->placa }}</td>
        <td>{{date('d/m/Y', strtotime($dado->dt_manutencao))}}</td>
      @endforeach
      </tbody>
      </table>
        @else
        <p>Você ainda não tem veículos cadastrados<a href="/veiculos/cadastrar">Cadastrar Veículo</a></p>
        @endif
    </div>
  </div>  
@endsection
