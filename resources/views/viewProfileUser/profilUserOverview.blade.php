@extends('layouts.profilleUser')

@section('home')
  {{route('home')}}
@endsection

@section('profile')
  {{route('member.index')}}
@endsection

@section('galang_dana')
  {{route('campaignUser.index')}}
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
            <!-- <button type="button" class="btn btn-success btn-sm">Follow</button> <button type="button" ></button>-->
            <a href="{{route('editProfile')}}" class="btn btn-info btn-sm">Edit Profile</a> 
          </div>
        </div>

        <!-- END SIDEBAR BUTTONS -->
        <!-- SIDEBAR MENU -->
        <div class="profile-usermenu">
          <ul class="nav" >
            <li class="active">
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
            <li>
              <a href="{{route('akunsaya')}}">
              <i class="glyphicon glyphicon-user"></i>
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
                  <strong>Rp. {{$jumlahDonasiDisalurkan}}</strong> 
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
                  <th style="color: #fff;">Bukti Transfer</th>
                  <th style="color: #fff;">Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataTambahDeposit as $i => $data)
                  <tr>
                    <td>{{$i+1}}</td>
                    <td>{{$data->nominal}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                      @if($data->pic_bukti_transfer =='0')
                        <center><button class="btn btn-info " data-toggle="modal"  name="tambahData" data-target="#modal-form_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="Pic Bukti Transfer"><i class="fa fa-upload"></i></button></center>
                      @else
                        <center><button class="btn btn-success " data-toggle="tooltip" data-placement="right" title="Pic Bukti Transfer Sudah Terupload"><i class="fa fa-check"></i></button></center>
                      @endif
                      <!-- Modal Tambah Data-->
                        <div class="modal fade" id="modal-form_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Donasi Barang</h5>
                                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">×</span>
                                  </button>
                                </div>
                                <!-- method="post" action="{{route('campaign_user_barang.store')}}" -->
                                <form method="POST" enctype="multipart/form-data"  action="{{route('dompet-kebaikan-user.update',$data->id)}}" >
                                {{csrf_field()}}
                                {{method_field('PUT')}}
                                  <div class="modal-body">
                                    <div class="row">
                                      <label class="control-label col-md-3">Pic Bukti Trasfer</label>
                                      <div class="col-md-9">
                                        <!-- <input class="form-control" placeholder="Gambar Bukti Transfer" name="pic_bukti_transfer" type="file" required id="pic_bukti_trasnfer" accept="image/*"> -->
                                        <input name="picBuktiTransfer" id="picBuktiTransfer" type="file" class="form-control" accept="image/*">
                                      </div>
                                    </div>
                                    
                                  </div>
                                  <div class="modal-footer">
                                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                                    <input class="btn btn-primary" name="tambahBuktiTransfer" value="Upload" type="submit" id="tambahBuktiTransfer">
                                  </div>
                                </form>
                              </div>
                            </div>
                          </div>

                    </td>
                    <td>{{$data->status}}</td>
                  </tr>
                @endforeach
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