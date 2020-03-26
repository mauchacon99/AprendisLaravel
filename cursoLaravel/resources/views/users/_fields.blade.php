	
	 {{ csrf_field() }}

	<label for="name"> Nombre</label>
    <input type="text" name="name" id="name" value="{{ old('name', $user->name) }}">

    <br>
    <label for="email">Email</label>
    <input type="email" name="email" id="email" value="{{ old('email', $user->email)}}">

    <br>
    <label for="password">Contraseña</label>
    <input type="password" name="password" id="password">

    <br>

    <label for="profession"> Profession </label>
    <select name="profession_id"  id="profession_id">
          <option value=""> Seleciona una Profesion</option>
          @foreach($professions as $profession)
              <option value="{{ $profession->id }}"{{ old('profession_id', $user->profile->profession_id) == $profession->id ? ' selected' : ''}}> {{ $profession->title }}</option>
          @endforeach
    </select>  
    <br>
  
      <label for="other_profession">Otra Profesion</label>
    <input type="other_profession" name="other_profession" id="other_profession" 
    value="{{ old('other_profession')}}">
      <br>
 
  
    <label for="twitter"> twitter</label>
    <input type="text" name="twitter" value="{{ old('twitter', $user->profile->twitter)}}" id="twitter" >
   <br>
       <label for="bio"> Biografia</label>
    <textarea name="bio" class="form-control" id="bio"> {{ old('bio', $user->profile->bio) }}</textarea>
   <br>

   <h5> Habilidades </h5>
   @foreach($skills as $skill)
      <div class="form-check form-check-inline">
        <input 
           name  ="skills[{{ $skill->id }}]"
           class ="form-check-input" 
           type  ="checkbox" 
           id    ="skill_{{ $skill->id }}" 
           value="{{ $skill->id }}" 
           {{ $errors->any() ? old('skills.'.$skill->id) : $user->skills->contains($skill) ? 'checked' : '' }}
        >
        <label class="form-check-label" for="skill_{{ $skill->id }}"> {{ $skill->name }}</label>
      </div>
    @endforeach
    <br>
    <h5> Rol</h5>
    @foreach($roles as $role => $name)
      <div class="form-check form-check-inline">
          <input 
            class="form-check-input"
            type="radio" 
            name="role"
            id="role_{{ $role }}"
            value="{{ $role }}"
            {{ old('role', $user->role) == $role ? 'checked' : ''}}
          >
          <label class="form-check-label" for="role_{{ $role }}"> {{ $name }}</label>
      </div>
    @endforeach