 @extends('layout')
     @section( 'title',"Lista de Usuarios")
     @section( 'content')
        <div class="md-6">
            
        <h4>{{ e($title) }} </h4>
               
                         <a href="{{route('users.create')}}">
                            <button type="button" class="btn btn-dark btn-block"> Nuevo Usuario </button>
                        </a>

        </div>
                
        @include('users._filters')

 
          <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NOMBRE  </th>
                    <th scope="col">CORREO  </th>
                    <th scope="col">ROLE    </th>
                    <th scope="col">EMPRESA </th>
                    <th scope="col">DETALLES</th>
                    <th scope="col">EDITAR  </th>
                    <th scope="col">ELIMINAR</th>

                 </tr>
            </thead>
            <tbody>

        @each('users._row', $users, 'user')
            
            </tbody>
        </table>
            {{ $users->appends(request(['search']))->links() }}
     @endsection

