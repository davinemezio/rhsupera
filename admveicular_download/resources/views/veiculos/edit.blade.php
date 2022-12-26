@extends('layouts.main')
@section('title','Alterar dados do Veiculo')
@section('content')
  <div id="veiculo-create-container" class="col-md-6 offset-md-3">
    <h1>Editando o veículo placa: {{ $veiculo->placa }}</h1>
    <form action="/veiculos/update/{{$veiculo->id}}" method="POST" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      <div id="form-group">
        <label for="modelo">Modelo:</label>
        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo do veículo" value="{{$veiculo->modelo}}">
      </div>
      <div id="form-group">
        <label for="modelo">Marca:</label>
        <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca do veículo" value="{{$veiculo->marca}}">
      </div>
      <div id="form-group">
        <label for="ano">Versão:</label>
        <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano do veículo" value="{{$veiculo->ano}}">
      </div>
      <div id="form-group">
        <label for="placa">Placa:</label>
        <input type="text" class="form-control" id="placa" name="placa" placeholder="Placa do veículo" value="{{$veiculo->placa}}">
      </div> 
        <input type="submit" class="btn btn-primary" value="Salvar">
      </form>
  </div>
@endsection