 @extends('layout')
     @section( 'title',"Lista de Usuarios")
     @section( 'content')
        <h4>{{ e($title) }} </h4>

         <div class="d-flex justify-content-between align-items-end py-2">
        <a href="{{route('users.create')}}">
            <button type="button" class="btn btn-warning">Agregar </button>
        </a>
        </div>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">NOMBRE</th>
                    <th scope="col">EMAIL</th>
                    <th scope="col">DETALLES</th>
                    <th scope="col">EDITAR</th>
                    <th scope="col">ELIMINAR</th>

                 </tr>
            </thead>
            <tbody>
            @forelse ($users as $user)
                  <tr>
                        <td>
                            {{ e($user->name) }}
                        </td>
                        <td>
                            {{ e($user->email) }}
                        </td>
                        <td>
                            <a href="{{ route('users.show', $user) }}">
                                <button type="button" class="btn btn-success">
                                    Detalles
                                </button>
                            </a>
                        </td>
                        <td>
                            <a href="{{ route('users.edit', $user) }}">
                                <button type="button" class="btn btn-info"> 
                                     Editar
                                </button>
                            </a>
                        </td>
                        <td>
                            <form action="{{ route('users.destroy', $user)}}" method="POST">
                                {{ csrf_field() }}
                                {{ method_field('DELETE')}}
                                     <button type="submit" class="btn btn-danger">
                                        Eliminar
                                     </button>
                            </form>
                        </td>
                   </tr>
            @empty
                <li> No hay usuario Registrado</li>
            @endforelse
            </tbody>
        </table>
            {{ $users->links() }}
     @endsection

