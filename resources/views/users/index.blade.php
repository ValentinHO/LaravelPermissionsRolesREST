@extends('layouts.app')

@section('title','Inicio')

@section('content')
	<h1>{{ $title }}</h1>
	@can('users.new')
		<a href="{{ route('users.new') }}" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
	@endcan

	<table id="dataTa">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre</th>
				<th>Email</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@forelse ($users as $user)
				<tr>
					<td><a href="{{ route('users.show', ['user' => $user]) }}">{{ $user->id }}</a></td>
					<td>{{ $user->name }}</td>
					<td>{{ $user->email }}</td>
					<td>
						<form action="{{ route('users.delete', $user) }}" method="POST">
		                    {{ csrf_field() }}
		                    {{ method_field('DELETE') }}
		                    @can('users.show')
		                    	<a href="{{ route('users.show', ['user' => $user]) }}" class="waves-effect waves-light btn"><i class="material-icons">visibility</i></a>
		                    @endcan
		                    @can('users.edit')
								<a href="{{ route('users.edit', ['user' => $user]) }}" class="waves-effect waves-light btn orange"><i class="material-icons">edit</i></a>
							@endcan
							@can('users.delete')
		                    	<button type="submit" class="waves-effect waves-light btn red"><i class="material-icons">delete</i></button>
		                    @endcan
		                </form>
					</td>
				</tr>
			@empty
				
			@endforelse
		</tbody>
	</table>
@endsection