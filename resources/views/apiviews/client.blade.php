@extends('layouts.app')

@section('content')
	
	<div class="row">
		<div class=" col s6 offset-s3">
			<h2>Crear cliente</h2>
		</div>
	</div>

	<div class="row">
	    <form class="col s6 offset-s3" method="POST" action="{{ url('/oauth/clients') }}">
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
	          <input id="redirect" name="redirect" type="text" class="validate">
	          <label for="redirect">Redirect</label>
	          @if($errors->has('redirect'))
	          	<p class="red-text">{{ $errors->first('redirect') }}</p>
	          @endif
	        </div>
	      </div>

	      <button type="submit" class="waves-effect waves-light btn" formnovalidate>Crear</button>
	    </form>
	</div>

	<table id="dataTa">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Redirección</th>
				<th>Secret</th>
			</tr>
		</thead>

		<tbody>
			@forelse ($clients as $client)
				<tr>
					<td>{{ $client->id }}</td>
					<td>{{ $client->name }}</td>
					<td>{{ $client->redirect }}</td>
					<td>{{ $client->secret }}</td>
				</tr>
			@empty
				
			@endforelse
		</tbody>
	</table>



	<div class="row">
		<div class=" col s10 offset-s1">
			<h2>Personal Access Token</h2>
		</div>
	</div>

	<div class="row">
	    <form class="col s6 offset-s3" method="POST" action="{{ url('/oauth/personal-access-tokens') }}">
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

	      <button type="submit" class="waves-effect waves-light btn" formnovalidate>Crear</button>
	    </form>
	</div>

@endsection