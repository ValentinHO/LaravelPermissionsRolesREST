@extends('layouts.app')

@section('content')

    <div class="row" id="app">
        <h3>Bienvenido al sistema Laravel 5.5</h3>

        <passport-clients></passport-clients>
        <passport-authorized-clients></passport-authorized-clients>
        <passport-personal-access-tokens></passport-personal-access-tokens>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="{{ asset('js/app.js') }}"></script>
@endsection
