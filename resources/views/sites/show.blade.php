@extends('layouts.app')

@section('title',"Sitio {$site->id}")

@section('content')
	
	<h2>Detalles de sitio</h2>
	<table id="dataTa">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Latitud</th>
				<th>Longitud</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>{{ $site->id }}</td>
				<td>{{ $site->site }}</td>
				<td>{{ $site->lat }}</td>
				<td>{{ $site->lng }}</td>
			</tr>
		</tbody>
	</table>
	<a href="{{ route('sites.index') }}" class="waves-effect waves-light btn"><i class="material-icons left">navigate_before</i>Volver</a>
@endsection