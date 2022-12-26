@extends('layouts.main')
@section('title','Consultar Veiculo')
@section('content')
<div id="veiculo-create-container" class="col-md-6 offset-md-3">  
  <form action="/veiculos/manutencao/buscar">
        @csrf
        <div id="form-group">
          <h2>Escolha o veículo:</h2>
          <select name="id_veiculo" id="id_veiculo" class="form-control">
          <option value="0">Escolha o veículo</option>
          @foreach ($veiculos as $veiculo)
            <option value="{{$veiculo->id}}">{{$veiculo->modelo.' '.$veiculo->placa}}</option>
            @endforeach
          </select> 
          <button type="submit"  class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Enviar</button>
        </div>  
  </form>
</div>  
  @endsection