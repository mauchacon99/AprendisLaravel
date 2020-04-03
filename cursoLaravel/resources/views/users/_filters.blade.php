<form class="form-inline" method="GET" action="{{ url('users') }}">

     <div class="btn-sm">
      @foreach($active as $value => $text )
              <div class="custom-control custom-radio custom-control-inline">
                <input 
                  type="radio" 
                  id="{{ $value}}" 
                  name="state" 
                  value="{{ $value }}" 
                  class="custom-control-input"
                  {{ $value === request('state','')? 'checked' : ''}}
                >
                <label class="custom-control-label" for="{{ $value}}"> {{ $text }} </label>
              </div>
        @endforeach
      </div>
         <input type="text" name="search" value="{{ request('search') }}"class="form-control form-control-sm " id="" placeholder=" Buscar...">
       {{--
			<div class="form-group">
        <div class="btn-sm ">
           @foreach($team as $value => $text )
              <div class="custom-control custom-radio custom-control-inline">
                <input 
                  type="radio" 
                  id="team_{{ $value ?: 'all' }}" 
                  name="team" 
                  value="{{ $value}}" 
                  class="custom-control-input"
                  {{ $value === request('team','')? 'checked' : ''}}
                >
                <label class="custom-control-label" for="team_{{ $value ?: 'all' }}"> {{ $text }} </label>
              </div>
        @endforeach
               

    			        <select class="custom-select btn-sm" name="role "id="" >
                      <option  value=""> Roles </option>
                      @foreach($roles as $value => $name)
                        <option value="{{$value}}" {{ request('role') == $value ? 'selected': ''}}> {{ $name }}</option>
                      @endforeach
                  </select>
           </div>

      
        @foreach($skills as $skill )
              <div class="form-check form-check-inline">
                  <input 
                    type="checkbox" 
                    id="skill_{{ $skill->id }}" 
                    name="skill[]"
                    value="{{$skill->id}}" 
                    class="form-check-input"
                    {{ $checkedSkills->contains($skill->id) ? 'checked' : '' }}
                    >
                  
                  <label class="form-check-label" for="skill_{{ $skill->id }}"> {{ $skill->name }} </label>
                </div>
          @endforeach
      
</div>
          <div class="btn-sm">
                <a> <h6>Fecha </a> 
                 <input type="date" class="form-control btn-sm" name="desde" id="date" placeholder="Desde">
                 <input type="date" class="form-control btn-sm" name="hasta" id="date" placeholder="Hasta">
                

            </div> --}}
             <button type="submit" class="btn btn-dark btn-sm"> Filtrar</button>
</form>