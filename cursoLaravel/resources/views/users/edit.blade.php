@extends('layout')
@section('title',"Crear Usuario")
@section('content')
     @component('shared._card')

     	@slot('title', 'Editar Usuario')

     		<form action="{{ url("users/$user->id") }}" method="POST">
	       		{{ method_field('PUT')}}

	   			 @include('shared._errors')

	   			 @include('users._fields')
		    	<br>
		      	<button type="submit" class="btn btn-success mt-4"> Editar Usuario</button>
		       	<a href="{{ route('users.index') }}">
		              <button type="button" class="btn btn-danger mt-4">  REGRESAR </button>
		      	</a>
			</form> 
     @endcomponent
@endsection