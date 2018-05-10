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
        <li class="breadcrumb-item active">Tables</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 30px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="data" width="100%" cellspacing="0">
              <thead>
                <tr>
                	<th>No</th>
                  	<th>Nama</th>
                  	<th>Judul Campaign</th>
                  	<th>Sisa Hari</th>
                  	<th>Deadline Campaign</th>
                  	<th>Dana Terkumpul</th>
                  	<th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0?>
                @foreach($dataCampaignOrganisasi as $data)
              	<tr>
              		<td>{{$no += 1}}</td>
              		<td>{{$data->User->name}}</td>
              		<td>{{$data->judul}}</td>
                  <?php
                    $dateNow = time();
                    $end_date = strtotime($data->deadline);
                    // $interval = date_diff($dateNow,$end_date);
                    $diff = $end_date - $dateNow;
                    $interval=floor($diff / (60 * 60 * 24));
                  ?>
              		<td>{{$interval}} Hari</td>
              		<td>{{$data->deadline}}</td>
              		<td>{{$data->dana_sementara}}</td>
              		<td>
              			<button class="btn btn-primary "><i class="fa fa-edit"></i></button>
              			<button class="btn btn-danger "><i class="fa fa-trash"></i></butto>
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