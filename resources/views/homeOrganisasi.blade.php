@extends('layouts.home')

@section('content')

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="/" class="scrollto">MariDonasi</a></h1>
        <a href="#intro"><img src="img/logo.png" alt="" title="" width="60px" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="{{url('/home')}}">Home</a></li>
          <li class="menu-has-children"><a href="">ALL Kategori</a>
            <ul>
              <li><a href="#">Drop Down 1</a></li>
              <li><a href="#">Drop Down 3</a></li>
              <li><a href="#">Drop Down 4</a></li>
              <li><a href="#">Drop Down 5</a></li>
            </ul>
          </li>
          <li><a href="{{ route('campaignOrganisasi.index')}}">Galang Dana</a></li>
          <li class="menu-has-children">
            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                Hai Organisasi Baik, {{ Auth::guard('organitation')->user()->name }}  <span class="caret"></span>
            </a>
            <ul>
                <li>
                  <a href="{{route('member.index')}}">
                    {{ Auth::guard('organitation')->user()->name }}
                  </a>
                </li>
                <li>
                  <a href="{{ route('organisasi.logout') }}" >
                        Logout
                  </a>
                </li>
            </ul>
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->
@endsection