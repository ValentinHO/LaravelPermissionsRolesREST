<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="favicon.ico">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Materialize CSS -->
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/css/materialize.min.css">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">
  </head>

  <body>

    @guest
      <style type="text/css">
        header, main, footer {
            padding-left: 0px !important;
        }
      </style>
    @else
    <header>
      <!-- Fixed navbar -->
      <nav class="black lighten-2">
        <div class="nav-wrapper">
            <!--<a href="#" class="brand-logo">Logo</a>-->
            <ul id="slide-out" class="side-nav fixed">
              <li><div class="user-view">
                <div class="background">
                  <img src="{{ asset("images/fondo.png") }}">
                </div>
                <a href="#!user"><img class="circle" src="{{ asset("images/user-512.png") }}"></a>
                @guest
                  <a href="#!name"><span class="white-text name">username</span></a>
                  <a href="#!email"><span class="white-text email">user@example.com</span></a>
                @else
                  <a href="#!name"><span class="white-text name">{{ Auth::user()->name }}</span></a>
                  <a href="#!email"><span class="white-text email">{{ Auth::user()->email }}</span></a>
                @endguest
              </div></li>
              <li><a href="{{ route('home') }}">Inicio</a></li>
              @can('users.index')
                <li><a href="{{ route('users.index') }}">Usuarios</a></li>
              @endcan
              @can('roles.index')
                <li><a href="{{ route('roles.index') }}">Roles</a></li>
              @endcan

              <li><a href="#!">Permisos</a></li>
              <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                  <li class="bold active">
                    <a class="collapsible-header">Dropdown</a>
                    <div class="collapsible-body">
                      <ul>
                        <li><a href="#!">First</a></li>
                        <li class="active"><a href="#!">Second</a></li>
                        <li><a href="#!">Third</a></li>
                        <li><a href="#!">Fourth</a></li>
                      </ul>
                    </div>
                  </li>
                </ul>
              </li>

            </ul>
            <a href="#" data-activates="slide-out" class="button-collapse"><i class="material-icons">menu</i></a>

            <ul class="right hide-on-med-and-down">
                <!-- Authentication Links -->
                @guest
                    <li><a href="{{ route('login') }}">Login</a></li>
                    <li><a href="{{ route('register') }}">Register</a></li>
                @else
                    <li>
                        <a class="dropdown-button" href="#!" data-activates="dropdown1">{{ Auth::user()->name }} <i class="material-icons right">arrow_drop_down</i></a>

                        <ul id="dropdown1" class="dropdown-content">
                            <li><a href="#">Configuración</a></li>
                            <li class="divider"></li>
                            <li>
                                <a href="{{ route('logout') }}"
                                    onclick="event.preventDefault();
                                    document.getElementById('logout-form').submit();">
                                    Cerrar Sesión
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    {{ csrf_field() }}
                                </form>
                            </li>
                        </ul>
                    </li>
                @endguest
            </ul>

        </div>
      </nav>
    </header>
    @endguest

    <!-- Begin page content -->
    <main class="container">
      @yield('content')
    </main>
  
    @guest
    @else
    <footer class="page-footer black lighten-2">
      <div class="footer-copyright">
        <div class="container">
        © 2014 Copyright Text
        <a class="grey-text text-lighten-4 right" href="#!">More Links</a>
        </div>
      </div>
    </footer>
    @endguest

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
      <script type="text/javascript" src="https:////cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
    <!-- Compiled and minified JavaScript -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script>

  <script type="text/javascript">
    $(document).ready(function(){
      $('#dataTa').DataTable();
      $("select").val('10');
      $('select').addClass("browser-default");
      $('select').material_select();
      $('.dropdown-button').dropdown();

      $('.button-collapse').sideNav({
        menuWidth: 270, // Default is 300
        edge: 'left', // Choose the horizontal origin
        closeOnClick: true, // Closes side-nav on <a> clicks, useful for Angular/Meteor
        draggable: true, // Choose whether you can drag to open on touch screens,
        onOpen: function(el) {}
      });
    });
  </script>
  </body>
</html>

