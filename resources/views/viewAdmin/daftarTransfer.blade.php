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
        <li class="breadcrumb-item active">Daftar Transfer</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 20px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Transfer</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="data" width="100%" cellspacing="0">
              <thead>
                <tr>
                	<th>No</th>
                  <th>Nama</th>
                  <th>Judul Campaign</th>
                  <th>Jumlah Transfer</th>
                  <th>Tanggal Transfer</th>
                  <th>Detail</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;?>
                @foreach($dataTransfer as $data )
                <tr>
                  <td>{{$no=$no+1}}</td>
                  <td>{{$data->User->name}}</td>
                  <td>{{$data->campaign_user->judul}}</td>
                  <td>Rp. {{number_format($data->nominal)}}</td>
                  <td>{{$data->created_at}}</td>
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
                  <td>{{$data->status}}</td>
                </tr>
                @endforeach

                <?php $no = 0;?>
                @foreach($dataTransferOrganisasi as $data )
                <tr>
                  <td>{{$no=$no+1}}</td>
                  <td>{{$data->organisasi->name}}</td>
                  <td>{{$data->campaign_organisasi->judul}}</td>
                  <td>Rp. {{number_format($data->nominal)}}</td>
                  <td>{{$data->created_at}}</td>
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
                  <td>{{$data->status}}</td>
                </tr>
                @endforeach

                <?php $no = 0;?>
                @foreach($dataTransferUserToOrganisasi as $data )
                <tr>
                  <td>{{$no=$no+1}}</td>
                  <td>{{$data->User->name}}</td>
                  <td>{{$data->campaign_organisasi->judul}}</td>
                  <td>Rp. {{number_format($data->nominal)}}</td>
                  <td>{{$data->created_at}}</td>
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
                  <td>{{$data->status}}</td>
                </tr>
                @endforeach

                <?php $no = 0;?>
                @foreach($dataTransferOrganisasiToUser as $data )
                <tr>
                  <td>{{$no=$no+1}}</td>
                  <td>{{$data->organisasi->name}}</td>
                  <td>{{$data->campaign_user->judul}}</td>
                  <td>Rp. {{number_format($data->nominal)}}</td>
                  <td>{{$data->created_at}}</td>
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
                  <td>{{$data->status}}</td>
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