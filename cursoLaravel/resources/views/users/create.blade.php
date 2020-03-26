@extends('layout')

  @section('title',"Crear Usuario")

  @section('content')

    @component('shared._card')

        @slot('title','Crear usuario')

              @include('shared._errors')
 
            <form action="{{url('users/create')}}" method="POST">
                {{ csrf_field() }}

              @include('users._fields')
              <br>
                <button type="submit" class="btn btn-success mt-4"> Crear Usuario</button>
                 <a href="{{ route('users.index')}}">
                        <button type="button" class="btn btn-danger mt-4">  REGRESAR </button>
                </a>
            </form>

    @endcomponent
   
  @endsection



