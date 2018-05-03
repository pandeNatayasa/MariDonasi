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
            <button type="button" class="btn btn-info btn-sm">Edit Profile</button>
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
      <div class="profile-header" style="margin-bottom: 20px;">
        <strong>Edit Profile</strong> 
      </div>
      <div class="profile-content">
        <div class="box" style="margin-top: 10px;">
          <form action="{{route('member.store')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
            {{csrf_field()}}
             
            <div class="bodyone">
              <div class="box-body-col">
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
                    <label class="control-label col-md-3">No Telepun</label>
                    <div class="col-md-9">
                      <input class="form-control" placeholder="nomor telepon anda" name="noTelpUser" required="required" type="text" value="">
                    </div>
                  </div>     
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-md-3">Lokasi</label>
                    <div class="col-md-9">
                      <select name="lokasiUser" class="form-control" required="required">
                        <option value="" disabled selected>Pilih Lokasi Anda</option>
                        <option value="kabBadungBali">Kab. Badung, Prov. Bali</option>
                        <option value="kabBangliBali">Kab. Bangli, Prov. Bali</option> 
                        <option value="kabDenpasarBali">Kota Denpasar, Prov. Bali</option>
                        <option value="kabGianyarBali">Kab Gianyar, Prov. Bali</option>          
                      </select>
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-md-3">Bio</label>
                    <div class="col-md-9">
                      <textarea name="bioUser" class="form-control" required="required" placeholder="deskripsi lengkap dari campaign anda" rows="6"></textarea>
                    </div>
                  </div>
                </div>
                
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-md-3">Profil Picture</label>
                    <div class="col-md-9">
                      <input class="form-control" placeholder="Your last profil picture" name="profilPic" required="required" type="file" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-md-3">KTP Picture</label>
                    <div class="col-md-9">
                      <input class="form-control" placeholder="Your bio" name="ktpPic" required="required" type="file" value="">
                    </div>
                  </div>
                </div>
                <div class="form-group">
                  <div class="row">
                    <label class="control-label col-md-3">Verif Picture</label>
                    <div class="col-md-9">
                      <input class="form-control" placeholder="Your bio" name="verifPic" required="required" type="file" value="">
                    </div>
                  </div>
                </div>
                <div class="row">
                  <div class="col-md-12">
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