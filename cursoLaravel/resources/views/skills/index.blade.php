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
                    <th scope="col">EDITAR</th>
                    <th scope="col">ELIMINAR</th>

                 </tr>
            </thead>
            <tbody>
            @forelse ($skills as $skill)
                  <tr>
                        <td>
                            {{ e($skill->name) }}
                        </td>
                  
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                        <td>
                            
                        </td>
                   </tr>
            @empty
                <li> No hay usuario Registrado</li>
            @endforelse
            </tbody>
        </table>
          
     @endsection
