@extends('layouts.app')

@section('title',"Usuario {$user->id}")

@section('content')
	
	<h2>Detalles de usuario</h2>
	<table id="dataTa">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Rol</th>
				<th>Profesión</th>
			</tr>
		</thead>

		<tbody>
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->name }}</td>
				<td>{{ $user->email }}</td>
				@if ($user->is_admin == 1)
					<td>Administrador</td>
				@else
					<td>Usuario</td>
				@endif

				@if ($user->profession == null)
					<td></td>
				@else
					<td>{{ $user->profession->title }}</td>
				@endif
			</tr>
		</tbody>
	</table>
	<a href="{{ route('users.index') }}" class="waves-effect waves-light btn"><i class="material-icons left">navigate_before</i>Volver</a>
@endsection