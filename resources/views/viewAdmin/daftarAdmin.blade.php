@extends('layouts.admin')

@section('daftar-admin')
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
        <li class="breadcrumb-item active">Daftar Admin</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 30px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Admin</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="data" width="100%" cellspacing="0">
              <thead>
                <tr>
                	<th>Id</th>
                  	<th>Nama Admin</th>
                  	<th>Alamat</th>
                  	<th>usia</th>
                  	<th>Tanggal Terdaftar</th>
                  	<th>Status</th>
                </tr>
              </thead>
              <tbody>
              	<tr>
              		<td>1</td>
              		<td>Bagus</td>
              		<td>Bantu Andi</td>
              		<td>19</td>
              		<td>25-12-2018</td>
              		<td>
              			<button class="btn btn-primary "><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger "><i class="fa fa-trash"></i></button>
              		</td>
              	</tr>
              	<tr>
              		<td>2</td>
              		<td>Aagus</td>
              		<td>Bantu Andi</td>
              		<td>15</td>
              		<td>25-12-2018</td>
              		<td>
              			<button class="btn btn-primary "><i class="fa fa-edit"></i></button>
                    <button class="btn btn-danger "><i class="fa fa-trash"></i></button>
              		</td>
              	</tr>
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