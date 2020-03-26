<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

use Illuminate\Support\Facades\DB;
use App\Models\{ User, UserProfile, Profession, Skills, Role};
use Illuminate\Validation\Rule;

class UpdateUserRequest extends FormRequest
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
          'email'    => ['required','email', Rule::unique('users')->ignore($this->user->id)],
           'bio'     => ['required'],
          'twitter'  => ['url','present','nullable'],
          'profession_id'    => [
                $tipsValid = ($_REQUEST['other_profession'] == '') ? "required" : "nullable",
                $tipsValid = (!empty($_REQUEST['profession_id'])) ? Rule::exists('professions','id'):'',
                'present'
          ],
          'other_profession' => [
                'present',
                $tipsValid = ($_REQUEST['profession_id'] == '') ? "required" : "nullable",
                $tipsValid = (!empty($_REQUEST['other_profession'])) ? Rule::unique('professions','title')->ignore($this->user->id):'',
            ],
          'skills' => ['array', Rule::exists('skills', 'id')],
          'role'   => [Rule::in(Role::getList())]
        ];
    }

    public function messanges(){

        return [
          'name.required '      => 'El nombre nombre es obligatorio',
          'email.required'      => 'El email nombre es obligatorio',
          'email.unique  '      => 'Ya existe un usuario con este Email',
          'password.required'   => 'Ingrese la Contraseña',
          'password.min '       => 'Requiere mas de 5 caracteres',
           'other_profession.unique'  => 'Profesion ya registrada en nuestra lista!'
        ];
    }

    public function UpdateUser(User $user)
    {
 
        $data = $this->validated();

        if(is_null($this->profession_id) && $this->other_profession){
            
            $profession = Profession::create([
                'title' => $this->other_profession
            ]);
            
           $this->profession_id = $profession->id;
        } 

        if($this->password != null){

            $user->password = bcrypt($this->password);
        }

        //autorizacion en el modelo fillable

        $user->fill([
            'name'  => $this->name,
            'email' => $this->email
        ]);

        $user->role = $this->role;

        $user->save();

        $user->profile->update([

            'profession_id' => $this->profession_id,
            'bio'           => $this->bio,
            'twitter'       => $this->twitter
        ]);

        $user->skills()->sync($this->skill ?? []);

    }



}
