@extends('layouts.main')
@section('title','Alterar Manutenção')
@section('content')
<table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">Data Manutencao</th>
            <th scope="col">Manutencao</th>
            <th scope="col">Ação</th>
          </tr>
        </thead>
      <tbody>
       @foreach($manutencao as $dado)
       <tr>
        <td scropt="row"><a href="/veiculos/manutencao/id{{$dado->id}}">{{ $loop->index + 1 }}</a></td>
        <td>{{ date('d/m/Y',strtotime($dado->dt_manutencao)) }}</a></td>
        <td>{{ $dado->tx_manutencao }}</td>
        <td><a href="/veiculos/manutencao/edit/{{$dado->id}}" class="btn btn-info edit-btn"><ion-icon name="create-outline"></ion-icon>Editar</a>
        <form action="/veiculos/manutencao/{{$dado->id}}" method="POST">
              @csrf 
              @method('DELETE')
              <button type="submit" class="btn btn-danger delet-bt"><ion-icon name="trash outline"></ion-icon>Excluir</button>
            </form>
       </tr>
       @endforeach
      </tbody>
      </table>
@endsection