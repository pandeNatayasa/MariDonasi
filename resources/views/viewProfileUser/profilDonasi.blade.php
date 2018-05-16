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
              <a href="{{route('akunsaya')}}">
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
            @foreach($dataDonasi as $i => $data)
            <tr>
              <td>{{$i+1}}</td>
              <td>{{$data->campaign_user->judul}}</td>
              <td>Rp. {{number_format($data->nominal)}}</td>
              <td>{{$data->created_at}}</td>
              <td>
                @if($data->bukti_transfer =='0')
                  <center><button class="btn btn-info " data-toggle="modal"  name="tambahData" data-target="#modal-form_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="Pic Bukti Transfer"><i class="fa fa-upload"></i></button></center>
                @else
                  <center><button class="btn btn-success " data-toggle="tooltip" data-placement="right" title="Pic Bukti Transfer Sudah Terupload"><i class="fa fa-check"></i></button></center>
                @endif
                <!-- Modal Tambah Data-->
                  <div class="modal fade" id="modal-form_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="modalTambahDataLabel">Upload Bukti Transfer</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">×</span>
                            </button>
                          </div>
                          <!-- method="post" action="{{route('campaign_user_barang.store')}}" -->
                          <form method="POST" enctype="multipart/form-data"  action="{{route('galangDana.update',$data->id)}}" >
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
                  <!-- End of modal upload bukti transfer -->
              </td>
              <td>{{$data->status}}</td>
            </tr>
            @endforeach
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