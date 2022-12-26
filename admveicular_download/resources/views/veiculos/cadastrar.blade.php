@extends('layouts.main')
@section('title','Cadastrar Veiculo')
@section('content')
  <div id="veiculo-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre o veículo</h1>
    <form action="/veiculos" method="POST">
      @csrf
      <div id="form-group">
        <label for="modelo">Modelo:</label>
        <input type="text" class="form-control" id="modelo" name="modelo" placeholder="Modelo do veículo">
      </div>
      <div id="form-group">
        <label for="modelo">Marca:</label>
        <input type="text" class="form-control" id="marca" name="marca" placeholder="Marca do veículo">
      </div>
      <div id="form-group">
        <label for="ano">Versão:</label>
        <input type="text" class="form-control" id="ano" name="ano" placeholder="Ano do veículo">
      </div>
      <div id="form-group">
        <label for="placa">Placa:</label>
        <input type="text" class="form-control" id="placa" name="placa" placeholder="Placa do veículo">
      </div> 
        <input type="submit" class="btn btn-primary" value="cadastrar veículo">
      </form>
  </div>
@endsection