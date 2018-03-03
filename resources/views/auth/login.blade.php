@extends('layouts.app')

@section('content')


<div class="container" style="margin-top: 10em;">
    <div class="row">
        <div class="card white">
            <div class="card-content">
                <span class="card-title">Login</span>
                <div class="row">
                    <form class="col s12" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}
                        
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input id="email" name="email" type="email" class="validate" value="{{ old('email') }}" required autofocus>
                            <label for="email">Email Address</label>
                            @if ($errors->has('email'))
                                <span class="red-text">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input id="password" name="password" type="password" class="validate">
                            <label for="password">Password</label>
                            @if ($errors->has('password'))
                                <span class="red-text">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                            @endif
                        </div>
                        
                        <div class="col s12">
                            <br/>
                            <input type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }} />
                            <label for="remember">Remember Me</label>
                        </div>

                        <div class="input-field col s12">
                            <button type="submit" class="btn grey">
                                    Login
                                </button>

                                <a class="" href="{{ route('password.request') }}">
                                    Forgot Your Password?
                                </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
