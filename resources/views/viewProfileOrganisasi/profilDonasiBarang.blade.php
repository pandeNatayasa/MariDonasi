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
                  $foto = "/img/profil_pic/profile_default.jpg";
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
            <!-- <button type="button" class="btn btn-success btn-sm">Follow</button> -->
            <a href="{{route('editProfile')}}" class="btn btn-info btn-sm">Edit Profile</a>
          </div>
        </div>
        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav" >
            <li >
              <a href="{{route('profille-organisasi.index')}}">
              <i class="glyphicon glyphicon-home"></i>
              Overview </a>
            </li>
            <li>
              <a href="{{route('campaignView')}}">
              <i class="glyphicon glyphicon-user"></i>
              Campaign Saya </a>
            </li>
            <li >
              <a href="{{route('profille-organisasi.create')}}">
              <i class="glyphicon glyphicon-user"></i>
              Donasi Saya </a>
            </li>
            <li class="active">
              <a href="{{url('/donasi-barang-organisasi-saya')}}">
              <i class="glyphicon glyphicon-user"></i>
              Donasi Barang Saya </a>
            </li>
            <li>
              <a href="{{route('akun.organisasi')}}">
              <i class="glyphicon glyphicon-ok"></i>
              Akun Saya </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" title="Dompet Kebaikan User">
              <a data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                <span >Dompet Kebaikan</span>
              </a>
              <ul id="collapseComponents" class="list-unstyled" style="padding-top: 10px;">
                <li >
                  <a href="{{route('dompet-kebaikan-organisasi.index')}}">
                    <i class="glyphicon glyphicon-flag fa fa-fw fa-upload"></i>
                    <span >Tambah Deposit</span>
                  </a>
                </li>
                <li>
                  <a href="{{route('pencairan_dana_organisasi')}}">
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
        <strong>Donasi Saya</strong> 
      </div>
      
      <div class="table-responsive" style="margin-top: 30px;">
        <table class="table table-bordered table-striped table-hover display" id="table_donasi">
          <thead style="background-color: black;">
            <tr>
              <th style="color: #fff;">No</th>
              <th style="color: #fff;">Judul Campaign</th>
              <th style="color: #fff;">Nominal</th>
              <th style="color: #fff;">Tanggal Donasi</th>
              <th style="color: #fff;">Bukti Transfer</th>
              <th style="color: #fff;">Status</th>
            </tr>
          </thead>
          <tbody>
            <?php $no = 0;?>
            @foreach($dataBarang as $data)
                  <tr>
                    <td>{{$no=$no+1}}</td>
                    <td>{{$data->campaign_organisasi->judul}}</td>
                    <td>{{$data->barang}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                      {{$data->status}}
                    </td>
                  </tr>
                  @endforeach
                  @foreach($dataBarangOrganisasiToUser as $data)
                  <tr>
                    <td>{{$no=$no+1}}</td>
                    <td>{{$data->campaign_organisasi->judul}}</td>
                    <td>{{$data->barang}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                      {{$data->status}}
                    </td>
                  </tr>
                  @endforeach
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