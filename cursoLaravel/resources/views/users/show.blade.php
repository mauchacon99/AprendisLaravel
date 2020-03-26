 
 
@extends('layout')
@section('title',"Usuario{$user->id}")
@section('content')
    <h1>Usuario: #{{$user->id}}</h1> 
    <ul>
        Mostrando detalles del Usuario: {{$user->id}}

        Nombre del usuario: {{$user->name}}
        <br>
  
        Email del usuario : {{$user->email}}
        <br>

         <a href="{{ route('users.index')}}">
            <button type="button" class="btn btn-danger">  REGRESAR </button>
        </a>
    </ul>   
@endsection