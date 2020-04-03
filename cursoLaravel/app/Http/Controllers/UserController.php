<?php

namespace App\Http\Controllers;
use App\Models\{ User, UserProfile, Profession, Skill};
use App\Http\Requests\{ CreateUserRequest, UpdateUserRequest };

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;




class UserController extends Controller
{
    
     function index()
    {
      //$users = DB::table('users')->get();
          /* $users = User::query()
            ->when(request('team'), function ($query, $team) {
                if ($team === 'with_team') {
                    $query->has('team');
                } elseif ($team === 'without_team') {
                    $query->doesntHave('team');
                }
            })
            ->when(request('search'), function ($query, $search) {
                
                $query->where(function ($query) use ($search) {
                    $query->where('name', 'like', "%{$search}%")
                          ->orWhere('email', 'like', "%{$search}%");
                         
                });
            })
            ->orderByDesc('created_at')
            ->paginate();*/

            $users = User::query()
            ->with('team','profile.profession','skills')
            ->byState(request('state'))
            ->search(request('search'))
            ->orderByDesc('created_at')
            ->paginate(); 

      $title = 'Lista de Usuarios';
      /* return view('users')
      ->with('users', $users)
      ->with('title', 'Lista de Usuarios');*/

      return view('users.index', compact('users','title'));
    }

     function show(User $user)
    {   
          
      //$user = User::findOrFail($id);
      /* if($user == null){
        return response()->view('errors.404',[],404);  
      }*/
      return view('users.show', compact('user'));
    }

    function store(CreateUserRequest $request)
    {       
        //$data = request()->all();

       /* if(empty($data->name)){

          return redirect('users/new')->withErrors([
            'name' => 'El Campo nombre es obligatorio',
          ]);
        }*/
        
       /* $data = request()->validate([
          'name'     => ['required'],
          'email'    => ['required','email','unique:users,email'],
          'password' => ['required','min:5'],
          'bio'      => ['required'],
          'twitter'  => ['url']
        ],[
          'name.required'     => 'El nombre nombre es obligatorio',
          'email.required'    => 'El email nombre es obligatorio',
          'email.unique'      => 'Ya existe un usuario con este Email',
          'password.required' => 'Ingrese la Contraseña',
          'password.min'      => 'Requiere mas de 5 caracteres'
        ]);*/
  
       

    
        $request->createUser();

        return redirect()->route('users.index');
    }

    function create()
    {   
        $user        = new User;

        return view('users.create',['user'=> $user]);
    }

    function edit(User $user){

   

        return view('users.edit',[
          'user'        => $user
          /*'skills'      => $skills,
          'professions' => $professions,
          'roles'       => $roles*/


        ]);
    }

    function update(UpdateUserRequest $request, User $user){

        $request->updateUser($user);

        return redirect()->route('users.show', [ 
          'user'        => $user,
          /*'skills'      => $skills,
          'professions' => $professions,
          'roles'       => $roles*/

        ]);

    }

    function destroy(User $user){

        $user->delete();

        return redirect()->route('users.index', [ 'user' => $user]);

    }

    public function StoreTrash(User $user)  
    {
       $user->delete();

       return redirect()->route('users.index', [ 'user' => $user]);
    }
    
}
