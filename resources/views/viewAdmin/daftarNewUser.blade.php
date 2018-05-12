@extends('layouts.admin')

@section('daftar-user')
  active
@endsection

@section('content')
	
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Daftar New User</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 20px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data New User</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="data" width="100%" cellspacing="0">
              <thead>
                <tr>
                	<th>Id</th>
                  <th>Nama</th>
                  <th>Email</th>
                  <th>Biography</th>
                  <th>Ktp Picture</th>
                  <th>Verif Picture</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataUser as $data)
              	<tr>
              		<td>{{$data->id}}</td>
              		<td>{{$data->name}}</td>
              		<td>{{$data->email}}</td>
                  <td>{{$data->bio}}</td>
              		<td>
                    <center>
                      <button class="btn btn-info " data-toggle="modal"  name="viewKtpPicture" data-target="#modal_view_ktp_picture_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="Ktp Picture"><i class="fa fa-eye"></i></button>
                    </center>
                    <!-- Modal View KTP Picture-->
                      <div class="modal fade" id="modal_view_ktp_picture_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahDataLabel">KTP Picture dari nama : {{$data->name}}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12 campaign_pic">
                                      <center>
                                        <?php
                                          $ktp_pic = $data->ktp_pic;
                                          if($ktp_pic == 0){
                                            $ktp_pic = '/img/ktp_pic/ktp.jpg';
                                          }
                                        ?>
                                        <img src="{{$ktp_pic}}" class="img-responsive" alt="" >
                                      </center>
                                    </div>
                                  </div>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Done</button>
                                </div>
                            </div>
                          </div>
                        </div>
                      <!-- End of Modal View KTP Picture -->
                  </td>
                  <td>
                    <center>
                      <button class="btn btn-info " data-toggle="modal"  name="viewKtpPicture" data-target="#modal_view_verif_picture_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="Verif Picture"><i class="fa fa-eye"></i></button>
                    </center>
                    <!-- Modal View Verif Picture-->
                      <div class="modal fade" id="modal_view_verif_picture_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahDataLabel">Verif Picture dari nama : {{$data->name}}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12 campaign_pic">
                                      <center>
                                        <?php
                                          $verif_pic = $data->verif_pic;
                                          if($verif_pic == 0){
                                            $verif_pic = '/img/ktp_pic/ktp.jpg';
                                          }
                                        ?>
                                        <img src="{{$verif_pic}}" class="img-responsive" alt="" >
                                      </center>
                                    </div>
                                  </div>
                                  
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-secondary" type="button" data-dismiss="modal">Done</button>
                                </div>
                            </div>
                          </div>
                        </div>
                      <!-- End of Modal View Verif Picture -->
                  </td>
              		<td>
                    <a href="" class="btn btn-info " data-toggle="tooltip" data-placement="right" title="Vew Detail"><i class="fa fa-eye"></i></a>
              			<a href="{{route('admin.edit',$data->id)}}" class="btn btn-primary " data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></a>
                    <button href="" class="btn btn-danger " data-toggle="modal"  name="conrifm_delete" data-target="#modal_confirm_delete_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></button>
                    <!-- Modal Confirmation Delete-->
                      <div class="modal fade" id="modal_confirm_delete_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahDataLabel">Confirmation Delete User</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <form method="POST" action="" >
                              {{csrf_field()}}
                                <div class="modal-body">
                                  <div class="row">
                                    <label class="control-label col-md-12">Apakah anda yakin akan menghapus user dengan data :</label>
                                  </div>
                                  <div class="row">
                                    <label class="control-label col-md-3">ID</label>
                                    <div class="col-md-9">
                                      <input name="id_delete" disabled type="text" class="form-control" value="{{$data->id}}">
                                  </div>
                                  
                                </div>
                                  <div class="row">
                                    <label class="control-label col-md-3">Nama</label>
                                    <div class="col-md-9">
                                      <input name="judul_delete" disabled type="text" class="form-control" value="{{$data->name}}">
                                  </div>
                                </div>
                                  <div class="row">
                                    <label class="control-label col-md-3">Bio</label>
                                    <div class="col-md-9">
                                      <input name="target_donasi_delete" disabled type="text" class="form-control" value="{{$data->bio}}">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-succes" type="button" data-dismiss="modal">Concel</button>
                                  <button class="btn btn-danger" type="button" data-dismiss="modal">Delete</button>
                                </div>
                            </div>
                            </form>
                          </div>
                        </div>
                      <!-- End of Modal Confirmation delete -->
              		</td>
              	</tr>
                @endforeach
              	
              </tbody>
            </table>
          </div>
        </div>
    </div>

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>

@endsection