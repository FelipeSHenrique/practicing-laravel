@extends('layouts.admin')

@section('title', 'Edição de Tarefas')
  
@section('content')

  <h1>Edição</h1>

  @if($errors->any())
    <ul>
      @foreach ($errors->all() as $error)
        <li>{{$error}}</li>
      @endforeach
    </ul>
  @endif

  <form method="POST">
    @csrf

    <label>
      Titulo: <br>
      <input type="text" name="titulo" value="{{$data->titulo}}" />
    </label>

    <input type="submit" value="Salvar" />
  </form>

@endsection