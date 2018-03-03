@extends('layouts.app')

@section('title','Inicio')

@section('content')
	<div class="row">
		<div class=" col s6 offset-s3">
			<h2>Crear usuario</h2>
		</div>
	</div>
	
	@if ($errors->any())
		{{--@foreach ($errors->all() as $error)
			<li>{{ $error }}</li>
		@endforeach--}}
	@endif

	<div class="row">
	    <form class="col s6 offset-s3" method="POST" action="{{ route('users.create') }}">
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
	          <input id="password" name="password" type="password" class="validate">
	          <label for="password">Password</label>
	          @if($errors->has('password'))
	          	<p class="red-text">{{ $errors->first('password') }}</p>
	          @endif
	        </div>
	      </div>
	      <div class="row">
	        <div class="input-field col s12">
	          <input id="email" name="email" type="email" class="validate" value="{{ old('email') }}">
	          <label for="email">Email</label>
	          @if($errors->has('email'))
	          	<p class="red-text">{{ $errors->first('email') }}</p>
	          @endif
	        </div>
	      </div>

	      <button type="submit" class="waves-effect waves-light btn" formnovalidate>Crear</button>
	      <a href="{{ route('users.index') }}" class="waves-effect waves-light btn"><i class="material-icons left">navigate_before</i>Volver</a>
	    </form>
	</div>
@endsection