@extends('layouts.main')
@section('title','Escolher Veiculo')
@section('content')
<div id="veiculo-create-container" class="col-md-6 offset-md-3">  
  <form action="/veiculos">
        @csrf
        @method('DELETE')
        <div id="form-group">
          <h2>Excluir o veículo:</h2>
          <select name="id_veiculo" id="id_veiculo" class="form-control">
          <option value="0">Escolha o veículo</option>
          @foreach ($veiculos as $veiculo)
            <option value="{{$veiculo->id}}">{{$veiculo->modelo.' '.$veiculo->placa}}</option>
            @endforeach
          </select> 
          <button type="submit"  class="btn btn-danger delet-bt"><ion-icon name="trash-outline"></ion-icon>Apagar</button>
        </div>  
  </form>
</div>  
  @endsection