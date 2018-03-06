@extends('layouts.app')

@section('title','Inicio')

@section('content')
	<h1>{{ $title }}</h1>
	@can('sites.new')
		<a href="{{ route('sites.new') }}" class="btn-floating btn-large waves-effect waves-light red right"><i class="material-icons">add</i></a>
	@endcan

	<table id="dataTa">
		<thead>
			<tr>
				<th>ID</th>
				<th>Nombre Sitio</th>
				<th>Lat</th>
				<th>Lng</th>
				<th>Acciones</th>
			</tr>
		</thead>

		<tbody>
			@forelse ($sites as $site)
				<tr>
					<td><a href="{{ route('sites.show', ['site' => $site]) }}">{{ $site->id }}</a></td>
					<td>{{ $site->site }}</td>
					<td>{{ $site->lat }}</td>
					<td>{{ $site->lng }}</td>
					<td>
						<form action="{{ route('sites.delete', $site) }}" method="POST">
		                    {{ csrf_field() }}
		                    {{ method_field('DELETE') }}
		                    @can('sites.show')
		                    	<a href="{{ route('sites.show', ['site' => $site]) }}" class="waves-effect waves-light btn"><i class="material-icons">visibility</i></a>
		                    @endcan
		                    @can('sites.edit')
								<a href="{{ route('sites.edit', ['site' => $site]) }}" class="waves-effect waves-light btn orange"><i class="material-icons">edit</i></a>
							@endcan
							@can('sites.delete')
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