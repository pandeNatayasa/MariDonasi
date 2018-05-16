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
          <!-- SIDEBAR BUTTONS -->
          <div class="profile-userbuttons">
            <!-- <button type="button" class="btn btn-success btn-sm">Follow</button> -->
            <button type="button" class="btn btn-info btn-sm">Edit Profile</button>
          </div>
          <!-- END SIDEBAR USER TITLE -->
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
            <li>
              <a href="{{route('profille-organisasi.create')}}">
              <i class="glyphicon glyphicon-user"></i>
              Donasi Saya </a>
            </li>
            <li class=>
              <a href="{{route('akun.organisasi')}}">
              <i class="glyphicon glyphicon-ok"></i>
              Akun Saya </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" title="Dompet Kebaikan User">
              <a data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
                <span >Dompet Kebaikan</span>
              </a>
              <ul id="collapseComponents" class="list-unstyled" style="padding-top: 10px;">
                <li class="active">
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
      <div class="profile-header" style="margin-bottom: 20px;">
        <strong>Dompet Kebaikan > Tambah Deposit</strong> 
      </div>
      <form>
        <div class="bodyone" style="margin-bottom: 20px;">
          <strong >
            <div class="row">
               <h2 style="padding-top: 10px; padding-right: 10px;">Saldo </h2><h1> Rp. {{Auth::guard('organitation')->user()->wallet}}</h1>
            </div>
          </strong>
        </div>
      </form>
      <div class="profile-content1">
        
        <div class="box" style="margin-top: 10px;">
        <form action="{{route('dompet-kebaikan-organisasi.store')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            {{csrf_field()}}
             
            <div class="bodyone">
              <div class="box-body-col">
                <div class="form-group">
                  <div class="row" style="padding-bottom: 30px;">
                    <label class="col-md-12" style="text-align: center;"><strong><h4>Tambah Jumlah Uang pada Dompet Anda</h4> </strong> </label>
                  </div> 
                  <div class="row" >
                    <div class="col-md-1"></div>
                    <label class="control-label col-md-4">Jumlah Penambahan Deposit</label>
                    <div class="col-md-6">
                      <input class="form-control" name="jumlahPenambahanDeposit" required="required" type="text" value="">
                    </div>
                  </div>  
                  <div class="row" style="padding-top: 20px;">
                    <div class="col-md-1"></div>
                    <label class="control-label col-md-4">Silahkan Transfer Ke </label>
                    <div class="col-md-6">
                      <input class="form-control" name="rekTransfer" required="required" type="text" disabled value="45476571652871251">
                    </div>
                  </div>        
                </div>
                
                <div class="row">
                  <div class="col-md-11">
                    <input type="submit" name="submit" value="Save & Next" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px; float: right; "> 
                  </div>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
    </div>
    <!-- End of content -->
  </div>
</div>
@endsection