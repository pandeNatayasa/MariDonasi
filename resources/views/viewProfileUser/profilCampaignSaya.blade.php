@extends('layouts.profilleUser')

@section('home')
  {{route('home')}}
@endsection

@section('profile')
  {{route('member.index')}}
@endsection

@section('galang_dana')
  {{route('galangDana.index')}}
@endsection

@section('name')
  {{ Auth::user()->name }}
@endsection

@section('logout')
  {{ route('user.logout') }}
@endsection

@section('content')
<div class="container">
    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
        <div class="profile-background">
          <!-- SIDEBAR USERPIC -->
          <div class="profile-userpic">
            <center>
              <?php
                $foto = Auth::user()->profil_pic;
                if($foto == '0'){
                  $foto = "img/profil_pic/profile_default.jpg";
                }

              ?>
              <img src="{{$foto}}" class="img-responsive" alt="">
            </center>
            
          </div>
          <!-- END SIDEBAR USERPIC -->
          <!-- SIDEBAR USER TITLE -->
          <div class="profile-usertitle">
            <div class="profile-usertitle-name">
              {{Auth::user()->name}}
            </div>
            <div class="profile-usertitle-job">
              {{Auth::user()->email}}
            </div>
          </div>
          <!-- END SIDEBAR USER TITLE -->
          <!-- SIDEBAR BUTTONS -->
          <div class="profile-userbuttons">
            <!-- <button type="button" class="btn btn-success btn-sm">Follow</button> -->
            <button type="button" class="btn btn-info btn-sm">Edit Profile</button>
          </div>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav" >
            <li >
              <a href="{{route('member.index')}}">
              <i class="glyphicon glyphicon-home"></i>
              Overview </a>
            </li>
            <li class="active">
              <a href="{{route('campaignSaya.index')}}">
              <i class="glyphicon glyphicon-user"></i>
              Campaign Saya </a>
            </li>
            <li >
              <a href="{{url('/donasi-saya')}}">
              <i class="glyphicon glyphicon-user"></i>
              Donasi Saya </a>
            </li>
            <li>
              <a href="route('akunsaya')">
              <i class="glyphicon glyphicon-ok"></i>
              Akun Saya </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" title="Dompet Kebaikan User">
              <a data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                <span >Dompet Kebaikan</span>
              </a>
              <ul id="collapseComponents" class="list-unstyled" style="padding-top: 10px;">
                <li >
                  <a href="{{route('dompet-kebaikan-user.index')}}">
                    <i class="glyphicon glyphicon-flag fa fa-fw fa-upload"></i>
                    <span >Tambah Deposit</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('pencairan_dana')}}">
                    <i class="glyphicon glyphicon-flag fa fa-fw fa-download"></i>
                    <span>Pencairan Dana</span>
                  </a>
                </li>
              </ul>
            </li>
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
    <!-- bagian kontent -->
    <div class="col-md-9">
      <div class="profile-header-campaignSaya">
        <strong>Pilih Salah Satu Campaign Anda</strong> 
      </div>
      <div class="row">
        @foreach($dataCampaignSaya as $data)
        <div class="col-md-4">
          <div class="daftar-campaign">
            <div class="view-cover-campaign">
              <img style="width: 100%; height: 190px;" src="{{$data->pic_cover_campaign}}" class="img-responsive" alt="">
            </div>
            <div style="padding : 0px 10px 10px 10px;">
              <div class="judul-campaign" style="padding-bottom: 2px;">
                <div class="row" >
                  <div class="col-sm-12" style="margin-bottom: 2px;">
                    {{$data->judul}}
                  </div>                  
                </div>
                <div class="row">
                  <div class="col-sm-6">
                    <p style="color: black; float: left; margin-bottom: 2px;">{{$data->status}}</p>
                  </div>
                  <div class="col-sm-6">
                    <a href="{{route('dompet-kebaikan-user.show',$data->id)}}" style="float: right;" >Detail</a>
                  </div>
                  
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 judul-data-campaign">
                  <p style=" margin-bottom: 0;">Dana Terkumpul</p> 
                </div>
                <div class="col-sm-6 judul-data-campaign">
                  <p style="text-align: right; margin-bottom: 0;">Sisa Hari</p> 
                </div>
              </div>
              <div class="row">
                <div class="col-sm-6 judul-data-campaign-cover">
                  <p style=" margin-bottom: 0;">Rp. {{number_format($data->dana_sementara)}}</p> 
                </div>
                <div class="col-sm-6 judul-data-campaign-cover">
                  <?php
                      $dateNow = time();
                      $end_date = strtotime($data->deadline);
                      // $interval = date_diff($dateNow,$end_date);
                      $diff = $end_date - $dateNow;
                      $interval=floor($diff / (60 * 60 * 24));
                    ?>
                  <p style=" text-align: right; margin-bottom: 0;">{{$interval}}</p> 
                </div>
              </div>
            </div>
          </div>
        </div>
        @endforeach
        <div class="col-md-4">
          <a href="{{route('campaignUser.index')}}">
            <div class="daftar-campaign1">
              <div class="col-sm-12">
                <i class="fa fa-plus fa-3x"></i>
              </div>
              
              Buat Campaign Anda
            </div>
          </a>
        </div>
      </div>
      <!-- <div class="profile-content">
         aaaaaaaaaa
      </div> -->
    </div>
    <!-- End of content -->
  </div>
</div>
@endsection