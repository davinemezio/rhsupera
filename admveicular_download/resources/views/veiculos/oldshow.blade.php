@extends('layouts.main')
@section('title',$veiculo->modelo)
@section('content')
<div class="col-md-10 offset-md">
  <div id="info-container" class="col-md-6">
    <h1>{{$veiculo->modelo}}</h1>
    <p class="marca"><ion-icon name="location-outline"></ion-icon>{{$veiculo->marca}}</p>
    <p>{{$veiculoOwner['name']}}</p>
  </div>
</div>
@endsection