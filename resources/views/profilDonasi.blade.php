@extends('layouts.profilleUser')

@section('content')
<div class="container">
    <div class="row profile">
    <div class="col-md-3">
      <div class="profile-sidebar">
        <div class="profile-background">
          <!-- SIDEBAR USERPIC -->
          <div class="profile-userpic">
            <center>
              <img src="{{Auth::user()->profil_pic}}" class="img-responsive" alt="">
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
            <li>
              <a href="{{route('campaignSaya.index')}}">
              <i class="glyphicon glyphicon-user"></i>
              Campaign Saya </a>
            </li>
            <li class="active">
              <a href="{{url('/donasi-saya')}}">
              <i class="glyphicon glyphicon-user"></i>
              Donasi Saya </a>
            </li>
            <li>
              <a href="{{url('/edit-profile')}}">
              <i class="glyphicon glyphicon-ok"></i>
              Akun Saya </a>
            </li>
            <li>
              <a href="{{route('dompetKebaikanUser.index')}}">
              <i class="glyphicon glyphicon-flag"></i>
              Dompet Kebaikan </a>
            </li>
          </ul>
        </div>
        <!-- END MENU -->
      </div>
    </div>
    <!-- bagian kontent -->
    <div class="col-md-9">
      <div class="profile-header">
        <strong>Donasi Saya</strong> 
      </div>
      
      <div class="table-responsive" style="margin-top: 30px;">
        <table class="table table-bordered table-striped table-hover display" id="table_donasi">
          <thead style="background-color: black;">
            <tr>
              <th style="color: #fff;">Judul Campaign</th>
              <th style="color: #fff;">Nominal</th>
              <th style="color: #fff;">Tanggal Donasi</th>
              <th style="color: #fff;">Status</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>eee</td>
              <td>20000</td>
              <td>201212</td>
              <td>sukses</td>
            </tr>
            <tr>
              <td>aaaaaaa</td>
              <td>20000</td>
              <td>201212</td>
              <td>sukses</td>
            </tr>
            <tr>
              <td>aaaaaaa</td>
              <td>20000</td>
              <td>201212</td>
              <td>sukses</td>
            </tr>
            <tr>
              <td>aaaaaaa</td>
              <td>20000</td>
              <td>201212</td>
              <td>sukses</td>
            </tr>
          </tbody>
        </table>
      </div>

      <!-- <div class="profile-content">
         aaaaaaaaaa
      </div> -->
    </div>
    <!-- End of content -->
  </div>
</div>
@endsection