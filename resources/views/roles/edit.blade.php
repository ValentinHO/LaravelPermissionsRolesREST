@extends('layouts.app')

@section('title','Editar')

@section('content')
	<div class="row">
		<div class=" col s10 offset-s1">
			<h2>Editar rol</h2>
		</div>
	</div>

	<div class="row">
	    {!! Form::model($role, ['route' => ['roles.update', $role->id],'method' => 'POST', 'class' =>"col s10 offset-s1"]) !!}
	    	{{ method_field('PUT') }}
	    	{{ csrf_field() }}
	      
	      <div class="row">
	        <div class="input-field col s12">
				{{ Form::text('name', null, ['class' => 'validate', 'id' => 'name']) }}
				{{ Form::label('name', 'Nombre') }}
		        
		        @if($errors->has('name'))
		          	<p class="red-text">{{ $errors->first('name') }}</p>
		        @endif
	        </div>
	      </div>

	      <div class="row">
	        <div class="input-field col s12">
	          	{{ Form::textarea('description', null, ['class' => 'materialize-textarea', 'id' => 'description']) }}
				{{ Form::label('description', 'Descripción') }}
	        </div>
	      </div>

	      @foreach($permissions as $permission)
      			<p>
      				{{ Form::checkbox('permissions[]', $permission->id, null, ['id' => $permission->id]) }}
      				<label for="{{ $permission->id }}">{{ $permission->title }} <em>({{ $permission->description }})</em></label>
				</p>
    		@endforeach
			
	      <button type="submit" class="waves-effect waves-light btn" formnovalidate>Actualizar <i class="material-icons right">send</i></button>
	      <a href="{{ route('roles.index') }}" class="waves-effect waves-light btn"><i class="material-icons left">navigate_before</i>Volver</a>
	    {!! Form::close() !!}
	</div>
@endsection