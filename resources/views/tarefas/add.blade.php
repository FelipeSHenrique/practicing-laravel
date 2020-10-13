@extends('layouts.admin')

@section('title', 'Adição de Tarefas')
  
@section('content')

  <h1>Adição</h1>

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
      <input type="text" name="titulo" />
    </label>

    <input type="submit" value="Adicionar" />
  </form>

@endsection