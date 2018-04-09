<!-- <!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <! CSRF Token
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>MariDonasi</title>
 -->
     <!-- Favicons 
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">
-->
  <!-- Google Fonts 
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">
-->
  <!-- Bootstrap CSS File 
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
-->
  <!-- Libraries CSS Files 
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">
-->
  <!-- Main Stylesheet File 
  <link href="css/style.css" rel="stylesheet">-->

    <!-- Styles -->
     <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet">  
     Main Stylesheet File -->
<!--</head>
<body>
    <div id="app">
        <header id="header">
            <div class="container-fuild">
                <div id="logo" class="pull-left">
                    <h1>
                        <a href="{{url('/')}}">MariDonasi</a>
                    </h1>
                </div>

                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <!-- Authentication Links -->
                        @guest
                            <li><a href="{{ route('login') }}">Login</a></li>
                            <li><a href="{{ route('register') }}">Register</a></li>
                        @else
                            <li class="dropdown">
                                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                                    {{ Auth::user()->name }} <span class="caret"></span>
                                </a>

                                <ul class="dropdown-menu">
                                    <li>
                                        <a href="{{ route('logout') }}"
                                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                            Logout
                                        </a>

                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                            {{ csrf_field() }}
                                        </form>
                                    </li>
                                </ul>
                            </li>
                        @endguest
                        
                    </ul>
                </nav>
            </div>
            
        </header>

        @yield('content')
    </div>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
 -->