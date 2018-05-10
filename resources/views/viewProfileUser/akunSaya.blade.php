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
          <!-- SIDEBAR BUTTONS -->
          <div class="profile-userbuttons">
            <!-- <button type="button" class="btn btn-success btn-sm">Follow</button> -->
            <a href="{{route('editProfile')}}" type="button" class="btn btn-info btn-sm">Edit Profile</a>
          </div>
          <!-- END SIDEBAR USER TITLE -->
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
            <li>
              <a href="{{url('/donasi-saya')}}">
              <i class="glyphicon glyphicon-user"></i>
              Donasi Saya </a>
            </li>
            <li class="active">
              <a href="{{url('/edit-profile')}}">
              <i class="glyphicon glyphicon-ok"></i>
              Akun Saya </a>
            </li>
            <li data-toggle="tooltip" data-placement="right" title="Dompet Kebaikan User">
              <a data-toggle="collapse" href="#collapseComponents" >
                <span >Dompet Kebaikan</span>
                <!-- data-parent="#exampleAccordion" -->
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
      <div class="profile-header" style="margin-bottom: 20px;">
        <strong>Your Profille</strong> 
      </div>
      <div class="profile-content">
        <div class="box" style="margin-top: 10px;">
          <!-- <form action="{{route('member.store')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            {{csrf_field()}} -->
             
            <div class="bodyone">
              <div class="box-body-col">
                <div class="form-group ">
                  <div class="row">
                    <label class="control-label col-md-3">Your Profil Picture</label>
                    <div class="col-md-9 ">
                      <div class="userpic bg-secondary" style="padding: 10px  0px 10px 0 ;">
                        <center>
                          <?php
                            $foto = Auth::user()->profil_pic;
                            if($foto == '0'){
                              $foto = "img/profil_pic/profile_default.jpg";
                            }
                          ?>
                          <img src="{{$foto}}" class="img-responsive" alt="" >
                        </center>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-md-3">Nama</label>
                    <div class="col-md-9">
                      <input class="form-control" disabled name="nama" required="required" type="text" value="{{Auth::user()->name}}">
                    </div>
                  </div>         
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-md-3">Email</label>
                    <div class="col-md-9">
                      <input class="form-control" disabled name="email" required="required" type="text" value="{{Auth::user()->email}}">
                    </div>
                  </div>        
                </div>
                <div class="form-group">
                  <div class="row">
                    <?php
                      $no_telp = Auth::user()->no_telp;
                      if($no_telp == '0'){
                        $no_telp = "Belum Diisi";
                      }
                    ?>
                    <label class="control-label col-md-3">No Telepun</label>
                    <div class="col-md-9">
                      <input class="form-control" disabled name="noTelpUser" required="required" type="text" value="{{$no_telp}}">
                    </div>
                  </div>     
                </div>
                <div class="form-group">
                  <div class="row">
                    <?php
                      $lokasi = Auth::user()->lokasi;
                      if($lokasi == '0'){
                        $lokasi = "Belum Diisi";
                      }
                    ?>
                    <label class="control-label col-md-3">Lokasi</label>
                    <div class="col-md-9">
                      <input class="form-control" disabled name="lokasi" required="required" type="text" value="{{$lokasi}}">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <?php
                      $bio = Auth::user()->bio;
                      if($bio == '0'){
                        $bio = "Belum Diisi";
                      }
                    ?>
                    <label class="control-label col-md-3">Bio</label>
                    <div class="col-md-9">
                      <textarea name="bioUser" class="form-control" required="required" value="{{$bio}}" rows="6"></textarea>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    
                    <label class="control-label col-md-3">KTP Picture</label>
                    <div class="col-md-9 ">
                      <center>
                        <?php
                          $ktp_pic = Auth::user()->ktp_pic;
                          if($ktp_pic == '0'){
                            $ktp_pic = "img/ktp_pic/ktp.jpg";
                          }
                        ?>
                        <div class="bg-secondary" style="padding: 10px  0px 10px 0 ;">
                          <img src="{{$ktp_pic}}" class="img-responsive" alt="" style="height: 150px;">
                        </div>
                      </center>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-md-3">Verif Picture</label>
                    <div class="col-md-9">
                      <center>
                        <?php
                          $verif_pic = Auth::user()->verif_pic;
                          if($verif_pic == '0'){
                            $verif_pic = "img/verif_pic/ktp.jpg";
                          }
                        ?>
                        <div class="bg-secondary" style="padding: 10px  0px 10px 0 ;">
                          <img src="{{$verif_pic}}" class="img-responsive" alt="" style="height: 150px;" >
                        </div>
                      </center>
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
                  <center>
                    <a href="{{route('editProfile')}}" type="button" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px; "  >Edit Profille </a>
                  </center>
                    
                  </div>
                  <!-- -->
                </div>
              </div>
            </div>
          <!-- </form> -->
        </div>
      </div>
    </div>
    <!-- End of content -->
  </div>
</div>

@endsection