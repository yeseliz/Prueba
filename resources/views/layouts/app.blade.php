    <!DOCTYPE html>
    <html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="{{asset('css/font-awesome.css')}}">
        <link rel="stylesheet" href="{{ asset('bootstrap/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/AdminLTE.min.css')}}">
        <link rel="stylesheet" href="{{asset('css/_all-skins.min.css')}}">
        <link rel="stylesheet" href="{{ URL::asset('/css/my-styles.css') }}">
        <link rel="stylesheet" href="{{ URL::asset('/css/app.css') }}">
        <link rel="icon" href="{{ asset('imagenes/img.ico')}}">
        <!-- CSRF Token -->
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{ asset('plugins/iCheck/square/green.css')}}">
        <link href="{{ asset('https://fonts.googleapis.com/css?family=Raleway:100,300,400,500" rel="stylesheet')}}">
        <link rel="stylesheet" href="{{ asset('css/custom.css')}}">

  <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css')}}">
  <script src="{{asset ('https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js')}}"></script>
  <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js')}}"></script>



        <title>Sistema de Reserva de Locales | Log in</title>
    </head>

    <body>
        <div id="app">
            <div class='my-content'>
                <div class="container">
                    <div class="row">
                        <div class="col-sm-20" >
                          <h1><strong>Sistema de Reserva de Locales</strong></h1>
                         
                      </div>
                  </div>
                  @if (Auth::guest())
                  <a href="{{ route('login') }}"></a>
                  @else

                  <div class="myform-bottom">
                      <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ Auth::user()->name }} <span class="carnet"></span>
                        </a>

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

                </li>
                @endif

                @yield('content')
            </div>
            @yield('content2')
        </div>
    </div>
</div>
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<script src="{{ asset('../../plugins/jQuery/jQuery-2.1.4.min.js')}}"></script>
<!-- Bootstrap 3.3.5 -->
<script src="{{ asset('../../bootstrap/js/bootstrap.min.js')}}"></script>
<!-- iCheck -->
<script src="{{ asset('../../plugins/iCheck/icheck.min.js')}}"></script>
</body>
</html>
