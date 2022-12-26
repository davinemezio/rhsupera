@extends('layouts.main')
@section('title','Cadastrar Manutenção')
@section('content')
  <div id="veiculo-create-container" class="col-md-6 offset-md-3">
    <h1>Cadastre a manutenção</h1>
    <form action="/veiculos/manutencao/{{$id=Request::segment(4)}}" method="POST">
      @csrf
      <div id="form-group">
        <label for="veiculo">Escolha o veículo:</label>
        <select name="id_veiculo" id="id_veiculo" class="form-control">
        @foreach ($veiculos as $veiculo)
          <option value="{{$veiculo->id}}">{{$veiculo->modelo.' '.$veiculo->placa}}</option>
          @endforeach
        </select>    
      <div id="form-group">
        <label for="data">data da Manutenção:</label>
        <input type="date" class="form-control" id="data" name="data" placeholder="Data da manutenção">
      </div>
      <div id="form-group">
        <label for="manutencao">Manutenção:</label>
        <input type="text" class="form-control" id="manutencao" name="manutencao" placeholder="Descrição da manutenção">
      </div> 
        <input type="submit" class="btn btn-primary" value="cadastrar manutenção">
      </form>
  </div>
@endsection