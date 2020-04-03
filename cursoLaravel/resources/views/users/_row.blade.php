<tr>
	<td>
	    <h6> {{ e($user->name) }}</h6>
	    @if($user->active == 'false')
	    <i class="fa fa-circle" style="color:red" aria-hidden="true"></i>
	    @else
	    <i class="fa fa-circle" style="color:green" aria-hidden="true"></i>
	    @endif

	</td>
	<td>
	     <span class="note">     {{ e($user->email) }}</span>
	</td>

	<td>
		{{ e($user->role)}}
	</td>
	<td>
		{{ e($user->team->name)}}

	</td>
	<td>
	    <a href="{{ route('users.show', $user) }}">
	        <button type="button" class="btn btn-outline-secondary btn-sm">
	            Detalles
	        </button>
	    </a>
	</td>
	<td>
	    <a href="{{ route('users.edit', $user) }}">
	        <button type="button" class="btn btn-outline-secondary btn-sm"> 
	             Editar
	        </button>
	    </a>
	</td>
	<td>
	    <form action="{{ route('users.destroy', $user)}}" method="POST">
	        {{ csrf_field() }}
	        {{ method_field('DELETE')}}

	            <button type="submit" class="btn btn-secondary btn-sm"> 
	             Editar
	        </button>
	    </form>
	</td>

	<tr>
		<td>
			@if($user->profile->exists)
		 		<span class="note"> {{ $user->profile->profession->title}}</span>
		 	@endif
		</td>
		<td>
			  <span class="note"> {{ $user->skills->implode('name',',')}}</span>
		</td>
	</tr>
</tr>
 

