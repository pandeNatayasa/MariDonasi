@extends('layouts.admin')

@section('daftar-campaign-group')
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
        <li class="breadcrumb-item active">Daftar New Campaign Organisasi</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 20px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data New Campaign Organisasi</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="data" width="100%" cellspacing="0">
              <thead>
                <tr>
                	<th>Id</th>
                  <th>Nama</th>
                  <th>Judul Campaign</th>
                  <th>Cover Picture</th>
                  <th>Target Donasi</th>
                  <th>Verif Picture</th>
                  <th>Detail</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($dataNewCampaignOrganisasi as $data)
              	<tr>
              		<td>{{$data->id}}</td>
              		<td>{{$data->organisasi->name}}</td>
              		<td>{{$data->judul}}</td>
                  <td>
                    <center>
                      <button class="btn btn-info " data-toggle="modal"  name="viewCoverCampaign" data-target="#modal_view_cover_campaign_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="View Cover Campaign" ><i class="fa fa-eye"></i></button>
                    </center>
                    <!-- Modal View Cover Campaign-->
                      <div class="modal fade" id="modal_view_cover_campaign_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahDataLabel">Cover Campaign id : {{$data->id}}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12 campaign_pic">
                                      <center>
                                        <img src="{{$data->pic_cover_campaign}}" class="img-responsive" alt="" >
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
                      <!-- End of Modal View View Cover Campaign --></td>
                  <td>{{$data->target_donasi}}</td>
              		<td>
                    <center>
                      <button class="btn btn-info " data-toggle="modal"  name="viewVerifPicture" data-target="#modal_view_verif_picture_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="View Verif Picture"><i class="fa fa-eye"></i></button>
                    </center>
                    <!-- Modal View Pic Verif Campaign-->
                      <div class="modal fade" id="modal_view_verif_picture_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahDataLabel">Verif Picture Campaign id : {{$data->id}}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12 campaign_pic">
                                      <center>
                                        <img src="{{$data->pic_verif}}" class="img-responsive" alt="" >
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
                      <!-- End of Modal View View Pic Verif Campaign -->  
                  </td>
              		<td><button class="btn btn-info " data-toggle="tooltip" data-placement="right" title="View Detail"><i class="fa fa-eye"></i></button></td>
              		<td>
              			<a href="{{route('validasi-campaign-organisasi',$data->id)}}" class="btn btn-primary " data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></a>
                    <button class="btn btn-danger " data-toggle="modal"  name="conrifm_delete" data-target="#modal_confirm_delete_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></button>
                    <!-- Modal Confirmation Delete-->
                      <div class="modal fade" id="modal_confirm_delete_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahDataLabel">Confirmation Delete Campaign</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                              <form method="POST" action="" >
                              {{csrf_field()}}
                                <div class="modal-body">
                                  <div class="row">
                                    <label class="control-label col-md-12">Apakah anda yakin akan menghapus campaign dengan data :</label>
                                  </div>
                                  <div class="row">
                                    <label class="control-label col-md-3">ID</label>
                                    <div class="col-md-9">
                                      <input name="id_delete" disabled type="text" class="form-control" value="{{$data->id}}">
                                  </div>
                                  
                                </div>
                                  <div class="row">
                                    <label class="control-label col-md-3">Judul Campaign</label>
                                    <div class="col-md-9">
                                      <input name="judul_delete" disabled type="text" class="form-control" value="{{$data->judul}}">
                                  </div>
                                </div>
                                  <div class="row">
                                    <label class="control-label col-md-3">Target Donasi</label>
                                    <div class="col-md-9">
                                      <input name="target_donasi_delete" disabled type="text" class="form-control" value="{{$data->target_donasi}}">
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