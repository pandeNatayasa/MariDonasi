@extends('layouts.admin')

@section('pencairan')
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
        <li class="breadcrumb-item active">Daftar Pencairan</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 20px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Pencairan</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="data" width="100%" cellspacing="0">
              <thead>
                <tr>
                	<th>No</th>
                  <th>Nama</th>
                  <th>Judul Campaign</th>
                  <th>Dana Dicairkan</th>
                  <th>Tanggal</th>
                  <th>Detail</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $no =0;?>
                @foreach($dataPencairan as $data)
              	<tr>
              		<td>{{$no=$no+1}}</td>
              		<td>{{$data->User->name}}</td>
              		<td>{{$data->campaign_user->judul}}</td>
                  <td>Rp. {{number_format($data->nominal)}}</td>
              		<td>{{$data->created_at}}</td>
              		<td>
                    <center>
                      <button class="btn btn-info " data-toggle="tooltip" data-placement="right" title="View Detail"><i class="fa fa-eye"></i></button>
                    </center>
                  </td>
              		<td>
              			{{$data->status}}
              		</td>
              	</tr>
                @endforeach

                @foreach($dataPencairanOrganisasi as $data)
                <tr>
                  <td>{{$no=$no+1}}</td>
                  <td>{{$data->organisasi->name}}</td>
                  <td>{{$data->campaign_organisasi->judul}}</td>
                  <td>Rp. {{number_format($data->nominal)}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>
                    <center>
                      <button class="btn btn-info " data-toggle="tooltip" data-placement="right" title="View Detail"><i class="fa fa-eye"></i></button>
                    </center>
                  </td>
                  <td>
                    {{$data->status}}
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