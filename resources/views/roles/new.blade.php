@extends('layouts.app')

@section('title','Inicio')

@section('content')
	<div class="row">
		<div class=" col s6 offset-s3">
			<h2>Crear rol</h2>
		</div>
	</div>

	<div class="row">
	    <form class="col s10 offset-s1" method="POST" action="{{ route('roles.create') }}">
	    	{!! csrf_field()!!}
	      
		      <div class="row">
		        <div class="input-field col s12">
		          <input id="name" name="name" type="text" class="validate" value="{{ old('name') }}">
		          <label for="name">Nombre</label>
		          @if($errors->has('name'))
		          	<p class="red-text">{{ $errors->first('name') }}</p>
		          @endif
		        </div>
		      </div>
		      
		      <div class="row">
		        <div class="input-field col s12">
		          <textarea id="description" name="description" class="materialize-textarea">{{ old('description') }}</textarea>
		          <label for="description">Descripción</label>
		        </div>
		      </div>
			
			
    		@foreach($permissions as $permission)
      			<p>
      				<input type="checkbox" name="permissions[]" id="{{ $permission->id }}" value="{{ $permission->id }}" />
					<label for="{{ $permission->id }}">{{ $permission->title }} <em>({{ $permission->description }})</em></label>
				</p>
    		@endforeach
		    	


	      <button type="submit" class="waves-effect waves-light btn" formnovalidate>Crear</button>
	      <a href="{{ route('roles.index') }}" class="waves-effect waves-light btn"><i class="material-icons left">navigate_before</i>Volver</a>
	    </form>
	</div>
@endsection