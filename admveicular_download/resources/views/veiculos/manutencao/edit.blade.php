@extends('layouts.main')
@section('title','Alterar Manutenção')
@section('content')
  <div id="veiculo-create-container" class="col-md-6 offset-md-3">
    <h1>Editar manutenção</h1>
    <form action="/veiculos/manutencao/update/{{ $manutencao->id }}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div id="form-group">
        <label for="data">Veiculo</label>
        <p>{{ $veiculo->veiculo->marca.' '.$veiculo->veiculo->modelo.' '.$veiculo->veiculo->placa }}
      </div>
      <div id="form-group">
        <label for="data">data da Manutenção:</label>
        <input type="date" class="form-control" id="dt_manutenco" name="dt_manutencao" placeholder="Data da manutenção" value="{{ $manutencao->dt_manutencao }}">
      </div>
      <div id="form-group">
        <label for="manutencao">Manutenção:</label>
        <input type="text" class="form-control" id="tx_manutencao" name="tx_manutencao" placeholder="Descrição da manutenção" value="{{$manutencao->tx_manutencao}}">
      </div> 
        <input type="submit" class="btn btn-primary" value="Editar">
      </form>
  </div>
@endsection

