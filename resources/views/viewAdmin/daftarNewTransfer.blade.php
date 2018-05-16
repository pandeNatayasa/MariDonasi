@extends('layouts.admin')

@section('transfer')
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
        <li class="breadcrumb-item active">Daftar New Transfer</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 20px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data New Transfer</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="data" width="100%" cellspacing="0">
              <thead>
                <tr>
                	<th>Id</th>
                  <th>Nama Pendonasi</th>
                  <th>Judul Campaign</th>
                  <th>Nominal</th>
                  <th>Bukti Transfer</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;?>
                @foreach($dataTransfer as $data)
              	<tr>
              		<td>{{$no=$no+1}}</td>
              		<td>{{$data->User->name}}</td>
              		<td>{{$data->campaign_user->judul}}</td>
                  <td>Rp. {{number_format($data->nominal)}}</td>
              		<td>
                    <center>
                      <button class="btn btn-info " data-toggle="modal"  name="viewCoverCampaign" data-target="#modal_view_bukti_transfer_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="View Bukti Trasfer"><i class="fa fa-eye"></i></button>
                    </center>
                    <!-- Modal View Cover Campaign-->
                      <div class="modal fade" id="modal_view_bukti_transfer_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahDataLabel">Bukti Transfer id : {{$data->id}}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12 campaign_pic">
                                      <center>
                                        <img src="{{$data->bukti_transfer}}" class="img-responsive" alt="" >
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
                      <!-- End of Modal View View Cover Campaign -->
                  </td>
              		<td>
              			<a href="{{route('validasi-transfer',$data->id)}}" class="btn btn-primary " data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></a>
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
                                    <label class="control-label col-md-3">Nama Pendonasi</label>
                                    <div class="col-md-9">
                                      <input name="judul_delete" disabled type="text" class="form-control" value="{{$data->User->name}}">
                                  </div>
                                </div>
                                  <div class="row">
                                    <label class="control-label col-md-3">Nominal</label>
                                    <div class="col-md-9">
                                      <input name="target_donasi_delete" disabled type="text" class="form-control" value="Rp. {{number_format($data->nominal)}}">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-succes" type="button" data-dismiss="modal">Cancel</button>
                                  <form method="POST" action="{{route('campaignUser.destroy',$data->id)}}" >
                                  {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                  </form>
                                </div>
                            </div>
                            
                          </div>
                        </div>
                      <!-- End of Modal Confirmation delete -->
              		</td>
              	</tr>
                @endforeach
                <?php $no = 0;?>
                @foreach($dataTransferOrganisasi as $data)
                <tr>
                  <td>{{$no=$no+1}}</td>
                  <td>{{$data->organisasi->name}}</td>
                  <td>{{$data->campaign_user->judul}}</td>
                  <td>Rp. {{number_format($data->nominal)}}</td>
                  <td>
                    <center>
                      <button class="btn btn-info " data-toggle="modal"  name="viewCoverCampaign" data-target="#modal_view_bukti_transfer_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="View Bukti Trasfer"><i class="fa fa-eye"></i></button>
                    </center>
                    <!-- Modal View Cover Campaign-->
                      <div class="modal fade" id="modal_view_bukti_transfer_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="modalTambahDataLabel">Bukti Transfer id : {{$data->id}}</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">×</span>
                                </button>
                              </div>
                                <div class="modal-body">
                                  <div class="row">
                                    <div class="col-md-12 campaign_pic">
                                      <center>
                                        <img src="{{$data->bukti_transfer}}" class="img-responsive" alt="" >
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
                      <!-- End of Modal View View Cover Campaign -->
                  </td>
                  <td>
                    <a href="{{route('validasi-transfer-organisasi',$data->id)}}" class="btn btn-primary " data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></a>
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
                                    <label class="control-label col-md-3">Nama Pendonasi</label>
                                    <div class="col-md-9">
                                      <input name="judul_delete" disabled type="text" class="form-control" value="{{$data->organisasi->name}}">
                                  </div>
                                </div>
                                  <div class="row">
                                    <label class="control-label col-md-3">Nominal</label>
                                    <div class="col-md-9">
                                      <input name="target_donasi_delete" disabled type="text" class="form-control" value="Rp. {{number_format($data->nominal)}}">
                                  </div>
                                </div>
                                <div class="modal-footer">
                                  <button class="btn btn-succes" type="button" data-dismiss="modal">Cancel</button>
                                  <form method="POST" action="{{route('campaignUser.destroy',$data->id)}}" >
                                  {{csrf_field()}}
                                    <input type="hidden" name="_method" value="delete">
                                    <button class="btn btn-danger" type="submit">Delete</button>
                                  </form>
                                </div>
                            </div>
                            
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