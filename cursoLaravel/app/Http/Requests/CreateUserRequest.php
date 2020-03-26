<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\DB;
use App\Models\{ User, UserProfile, Profession, Skills, Role};
use Illuminate\Validation\Rule;


class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
          'name'     => ['required'],
          'email'    => ['required','email','unique:users,email'],
          'password' => ['required','min:5'],
          'bio'      => ['required'],
          'twitter'  => ['url','present','nullable'],
          //'profession_id' => ['nullable', 'exists:professions,id']
          'profession_id'    => [
            'nullable',
             Rule::exists('professions','id'),
            'present'
          ],
          'other_profession' => ['unique:professions,title'],
          'skills'           => [
            'array', 
             Rule::exists('skills', 'id')
          ],
          'role' => ['nullable',Rule::in(Role::getList())]
        ];
    }

    public function messanges( )
    {
        return [
          'name.required'     => 'El nombre nombre es obligatorio',
          'email.required'    => 'El email nombre es obligatorio',
          'email.unique'      => 'Ya existe un usuario con este Email',
          'password.required' => 'Ingrese la Contraseña',
          'password.min'      => 'Requiere mas de 5 caracteres',
          'other_profession.unique'  => 'Profesion ya registrada en nuestra lista!'
        ];
    }
    public function createUser()
    {

         DB::transaction( function(){

            $data       = $this->validated(); 
            $profession = $this->profession_user();

            $user       = new User([
                'name'          => $data['name'],
                'email'         => $data['email'],   
                'password'      => $data['password'], 
                'role'          => $data['role']
            ]);

            $user->role = $data['role'];

            $user->save();

        // si trabajas con el metodo requenst $this.
            $user->profile()->create([
                'bio'           => $this->bio,
                'twitter'       => $this->twitter,
                'profession_id' => $profession
            ]);

            $user->Skills()->attach($data['skills'] ?? []);
        });
    }

    public function profession_user(){

       if(is_null($this->profession_id)){
            
            $profession = Profession::create([
                'title' => $this->other_profession
            ]);
      
            return $profession->id;

        }else{

            return  $profession = $this->profession_id;
        }
    }
  

}
