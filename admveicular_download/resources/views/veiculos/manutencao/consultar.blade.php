@extends('layouts.main')
@section('title','Consultar Manutenção')
@section('content')
  <div id="search-container" search="col-md-12">
      <h1>Busque o veículo</h1>
      <form action="">
        <input type="text" id_veiculo="search" name="search" class="form-control" placeholder="Pesquisar...">
      </form>
  </div>
  <div id="veiculo-container">
    <h2>Manutenção</h2>
    <div id="cards-container" class="row">
      @foreach($manutencaos as $manutencao)
        <div class="card col-md-3">{{$manutencao->veiculo_id}}
          <div class="card-body">
            <p class="card-date">{{ date('d/m/Y', strtotime($manutencao->dt_manutencao))}}</p>
            <p class="card-info">{{ $manutencao->tx_manutencao }}</p>
          </div>
        </div>
      @endforeach
    </div>
  </div>  
@endsection