@extends('layouts.app')

@section('title','Inicio')

@section('content')
	<div class="row">
		<div class=" col s6 offset-s3">
			<h2>Crear sitio</h2>
		</div>
	</div>

	<div class="row">
	    <form class="col s6 offset-s3" method="POST" action="{{ route('sites.create') }}">
	    	{!! csrf_field()!!}
	      <div class="row">
	        <div class="input-field col s12">
	          <input id="site" name="site" type="text" class="validate" value="{{ old('site') }}">
	          <label for="site">Nombre</label>
	          @if($errors->has('site'))
	          	<p class="red-text">{{ $errors->first('site') }}</p>
	          @endif
	        </div>
	      </div>
	      <div class="row">
	        <div class="input-field col s12">
	          <input id="lat" name="lat" type="text" class="validate" value="{{ old('lat') }}">
	          <label for="lat">Latitud</label>
	          @if($errors->has('lat'))
	          	<p class="red-text">{{ $errors->first('lat') }}</p>
	          @endif
	        </div>
	      </div>
	      <div class="row">
	        <div class="input-field col s12">
	          <input id="lng" name="lng" type="text" class="validate" value="{{ old('lng') }}">
	          <label for="lng">Longitud</label>
	          @if($errors->has('lng'))
	          	<p class="red-text">{{ $errors->first('lng') }}</p>
	          @endif
	        </div>
	      </div>

	      <button type="submit" class="waves-effect waves-light btn" formnovalidate>Crear</button>
	      <a href="{{ route('sites.index') }}" class="waves-effect waves-light btn"><i class="material-icons left">navigate_before</i>Volver</a>
	    </form>
	</div>
@endsection