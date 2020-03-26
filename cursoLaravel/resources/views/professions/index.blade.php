 @extends('layout')
     @section( 'title',"Lista de Professiones")
     @section( 'content')
      

        <div class="d-flex justify-content-between align-items-end py-2">
        <a href="{{route('users.create')}}">
            <button type="button" class="btn btn-warning">Agregar </button>
        </a>
        <br> 
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">DETALLES</th>
                    <th scope="col">PERFILES ASOC.</th>
                    <th scope="col">ELIMINAR</th>

                 </tr>
            </thead>
            <tbody>
            @forelse ($professions as $profession)
                  <tr>
                        <td>
                            {{ e($profession->title) }}
                        </td>
                  
                        <td>
                            
                        </td>
                        <td>
                           {{ e($profession->profiles_count)}} 
                        </td>
                        <td>
                        	 @if($profession->profiles_count == 0) 
	                            <form action="{{ url("professions/{$profession->id}") }}" method="POST">

	                                 {{ csrf_field() }}
	                                {{ method_field('DELETE')}}
	                                     <button type="submit" class="btn btn-danger">
	                                        Eliminar
	                                     </button>
	                            </form>
                          @endif 
                        </td> 
                        </td>
                   </tr>
            @empty
                <li> No hay usuario Registrado</li>
            @endforelse
            </tbody>
        </table>
          
     @endsection