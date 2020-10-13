@extends('layouts.admin')

@section('title', 'Configurações')
  
@section('content')
    
  <h1>Configurações</h1>

  Meu nome é {{ $nome }}. Eu tenho {{ $idade }} anos. <br>

  @if($idade > 18) 
    Eu sou maior de idade
  @else 
    Eu NÃO sou maior de idade.
  @endif  

  @isset($versao)
    Existe uma versao
  @endisset

  <br>

  @if(count($lista) > 0)
  Lista do bolo: 
  <ul>
    @foreach($lista as $item)
      <li>{{$item}}</li>
    @endforeach
  </ul>
  @else 
    Não há ingredientes
  @endif

  {{-- @for($q=0;$q<10;$q++)
    O valor é {{$q}} <br>
  @endfor --}}

  <form method="POST">
    @csrf
    Nome: <br>
    <input type="text" name="nome" /> <br>
    
    Idade: <br>
    <input type="text" name="idade"> <br>
    
    Cidade: <br>
    <input type="text" name="cidade"> <br>
    
    <input type="submit" value="Enviar">
  </form>

  <a href="/config/info">Informações</a>

@endsection