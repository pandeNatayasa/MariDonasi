@extends('layouts.home')

@section('navbar')

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="{{route('organisasi.home')}}" class="scrollto">MariDonasi</a></h1>
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
                  <a href="{{route('profille-organisasi.index')}}">
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

@section('content')
  @foreach($dataDonasi as $data)
  <?php $type = 'user';?>
  <a href="{{route('campaignOrganisasi.show',$data->id)}}">
    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
      
      <div class="portfolio-wrap">
        <figure>
          <img src="{{$data->pic_cover_campaign}}" class="img-fluid" alt="">
          <a href="{{$data->pic_cover_campaign}}" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
          <a href="{{route('campaign_organisasi_barang.show',$data->id)}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
        </figure>

        <div class="portfolio-info">
          <h4><a href="{{route('campaign_organisasi_barang.show',$data->id)}}">{{$data->judul}}</a></h4>
          <p>{{$data->User->name}}</p>
          <div class="row" style="padding: 15px 0px 0 0px; ">
            <div class="col-md-8 pleft" >Dana Terkumpul</div>
            <div class="col-md-4 pright">Sisa Hari</div>
          </div>
          <div class="row">
            <div class="col-md-8 pleft" >{{$data->dana_sementara}}</div>
            <?php
              $dateNow = time();
              $end_date = strtotime($data->deadline);
              // $interval = date_diff($dateNow,$end_date);
              $diff = $end_date - $dateNow;
              $interval=floor($diff / (60 * 60 * 24));
            ?>
            <div class="col-md-4 pright">{{$interval}}</div>
          </div>
        </div>
        
      </div>
      
    </div>
  </a>
  
  @endforeach

  @foreach($dataDonasiOrganisasi as $data)
  <?php $type = 'organisasi';?>
  <a href="{{route('campaign_organisasi_barang.show',$data->id)}}">
    <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp">
      
      <div class="portfolio-wrap">
        <figure>
          <img src="{{$data->pic_cover_campaign}}" class="img-fluid" alt="">
          <a href="{{$data->pic_cover_campaign}}" data-lightbox="portfolio" data-title="App 1" class="link-preview" title="Preview"><i class="ion ion-eye"></i></a>
          <a href="{{route('campaignOrganisasi.show',$data->id)}}" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
        </figure>

        <div class="portfolio-info">

          <h4><a href="{{route('campaignOrganisasi.show',$data->id)}}">{{$data->judul}}</a></h4>
          <p>{{$data->organisasi->name}}</p>
          <div class="row" style="padding: 15px 0px 0 0px; ">
            <div class="col-md-8 pleft" >Dana Terkumpul</div>
            <div class="col-md-4 pright">Sisa Hari</div>
          </div>
          <div class="row">
            <div class="col-md-8 pleft" >{{$data->dana_sementara}}</div>
            <?php
              $dateNow = time();
              $end_date = strtotime($data->deadline);
              // $interval = date_diff($dateNow,$end_date);
              $diff = $end_date - $dateNow;
              $interval=floor($diff / (60 * 60 * 24));
            ?>
            <div class="col-md-4 pright">{{$interval}}</div>
          </div>
        </div>
        
      </div>
      
    </div>
  </a>
  
  @endforeach
@endsection