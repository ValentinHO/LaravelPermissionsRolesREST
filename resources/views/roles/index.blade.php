@extends('layouts.app')

@section('title','Inicio')

@section('content')
	<h1>{{ $title }}</h1>

	<a href="{{ route('roles.new') }}" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>

	<table id="dataTa">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@forelse ($roles as $role)
				<tr>
					<td><a href="{{ route('roles.show', ['role' => $role]) }}">{{ $role->id }}</a></td>
					<td>{{ $role->name }}</td>
					<td>
						<form action="{{ route('roles.delete', $role) }}" method="POST">
		                    {{ csrf_field() }}
		                    {{ method_field('DELETE') }}
		                    <a href="{{ route('roles.show', ['role' => $role]) }}" class="waves-effect waves-light btn"><i class="material-icons">visibility</i></a>
							<a href="{{ route('roles.edit', ['role' => $role]) }}" class="waves-effect waves-light btn orange"><i class="material-icons">edit</i></a>
		                    <button type="submit" class="waves-effect waves-light btn red"><i class="material-icons">delete</i></button>
		                </form>
					</td>
				</tr>
			@empty
				
			@endforelse
		</tbody>
	</table>
@endsection