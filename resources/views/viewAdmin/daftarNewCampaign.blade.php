@extends('layouts.admin')

@section('daftar-campaign')
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
        <li class="breadcrumb-item active">Daftar New Campaign</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 20px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data New Campaign</div>
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
                @foreach($dataNewCampaignUser as $data)
              	<tr>
              		<td>{{$data->id}}</td>
              		<td>{{$data->User->name}}</td>
              		<td>{{$data->judul}}</td>
                  <td></td>
                  <td>{{$data->target_donasi}}</td>
              		<td></td>
              		<td><button class="btn btn-info " data-toggle="tooltip" data-placement="right" title="View Detail"><i class="fa fa-eye"></i></button></td>
              		<td>
              			<a href="{{route('validasi-campaign',$data->id)}}" class="btn btn-primary " data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></a>
                    <button class="btn btn-danger " data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></button>
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