@extends('layouts.profilleUser')

@section('home')
  {{route('organisasi.home')}}
@endsection

@section('profile')
  {{route('profille-organisasi.index')}}
@endsection

@section('galang_dana')
  {{route('campaignOrganisasi.index')}}
@endsection

@section('name')
  {{ Auth::guard('organitation')->user()->name }}
@endsection

@section('logout')
  {{ route('organisasi.logout') }}
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
                $foto = Auth::guard('organitation')->user()->pic;
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
              {{Auth::guard('organitation')->user()->name}}
            </div>
            <div class="profile-usertitle-job">
              {{Auth::guard('organitation')->user()->email}}
            </div>
          </div>
          <!-- END SIDEBAR USER TITLE -->
          <!-- SIDEBAR BUTTONS -->
          <div class="profile-userbuttons">
            <!-- <button type="button" class="btn btn-success btn-sm">Follow</button> <button type="button" ></button>-->
            <a href="{{route('editProfile')}}" class="btn btn-info btn-sm">Edit Profile</a> 
          </div>
        </div>

        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav" >
            <li class="active">
              <a href="{{route('profille-organisasi.index')}}">
              <i class="glyphicon glyphicon-home"></i>
              Overview </a>
            </li>
            <li>
              <a href="{{route('campaignView')}}">
              <i class="glyphicon glyphicon-user"></i>
              Campaign Saya </a>
            </li>
            <li>
              <a href="{{route('profille-organisasi.create')}}">
              <i class="glyphicon glyphicon-user"></i>
              Donasi Saya </a>
            </li>
            <li>
              <a href="{{route('akun.organisasi')}}">
              <i class="glyphicon glyphicon-user"></i>
              Akun Saya </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" title="Dompet Kebaikan User">
              <a data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                <span >Dompet Kebaikan</span>
              </a>
              <ul id="collapseComponents" class="list-unstyled" style="padding-top: 10px;">
                <li >
                  <a href="{{route('dompetKebaikanUser.index')}}">
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
      <div class="profile-header">
        <strong> Overview</strong>
      </div>
      <div class="row">
        <div class="col-md-4">
          <div class="profile-overview">
            <div class="row">
              <div class="col-sm-3">
                <div class="profile-userpic" >
                  <img style="height: 65px; width: 65px;" src="img/start.jpg" class="img-responsive" alt=""> 
                </div>
              </div>
              <div class="col-sm-9">
                <div class="col-sm-12 jumlah">
                  <strong>{{$jumlahCampaignDimulai}}</strong> 
                </div>
                <div class="col-sm-12 jumlah1">
                  Campaign dimulai
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="profile-overview">
            <div class="row">
              <div class="col-sm-4">
                <div class="profile-userpic" >
                  <img style="height: 65px; width: 65px;" src="img/donate_plan.jpg" class="img-responsive" alt=""> 
                </div>
              </div>
              <div class="col-sm-8">
                <div class="col-sm-12 jumlah">
                  <strong>0</strong> 
                </div>
                <div class="col-sm-12 jumlah1">
                  Donasi
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-5">
          <div class="profile-overview">
            <div class="row">
              <div class="col-sm-3">
                <div class="profile-userpic" >
                  <img style="height: 65px; width: 65px;" src="img/donate.jpg" class="img-responsive" alt="">
                </div>
              </div>
              <div class="col-sm-9">
                <div class="col-sm-12 jumlah">
                  <strong>Rp. 15.000.000</strong> 
                </div>
                <div class="col-sm-12 jumlah1">
                  Donasi disalurkan
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      
      <div class="profile-content">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Deposit</div>
        <div class="card-body">
           <div class="table-responsive" style="margin-top: 10px;">
            <table class="table table-bordered table-striped table-hover display" id="table_donasi">
              <thead style="background-color: black;">
                <tr>
                  <th style="color: #fff;">No</th>
                  <th style="color: #fff;">Nominal</th>
                  <th style="color: #fff;">Tanggal Transfer</th>
                  <th style="color: #fff;">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>20000</td>
                  <td>201212</td>
                  <td>sukses</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>20000</td>
                  <td>201212</td>
                  <td>sukses</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>20000</td>
                  <td>201212</td>
                  <td>sukses</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>20000</td>
                  <td>201212</td>
                  <td>sukses</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div class="profile-content" style="margin-top: 20px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Pencairan</div>
        <div class="card-body">
           <div class="table-responsive" style="margin-top: 10px;">
            <table class="table table-bordered table-striped table-hover display" id="table_pencairan">
              <thead style="background-color: black;">
                <tr>
                  <th style="color: #fff;">No</th>
                  <th style="color: #fff;">Nominal</th>
                  <th style="color: #fff;">Tanggal Pencairan</th>
                  <th style="color: #fff;">Status</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>20000</td>
                  <td>201212</td>
                  <td>sukses</td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>20000</td>
                  <td>201212</td>
                  <td>sukses</td>
                </tr>
                <tr>
                  <td>3</td>
                  <td>20000</td>
                  <td>201212</td>
                  <td>sukses</td>
                </tr>
                <tr>
                  <td>4</td>
                  <td>20000</td>
                  <td>201212</td>
                  <td>sukses</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <!-- End of content -->
  </div>
</div>
@endsection