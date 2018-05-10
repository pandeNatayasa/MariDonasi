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
        <li class="breadcrumb-item active">Daftar User</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 30px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data User</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="data" width="100%" cellspacing="0">
              <thead>
                <tr>
                	<th>Id</th>
                  	<th>Nama User</th>
                    <th>Email</th>
                  	<th>Foto Profile</th>
                  	<th>Pic Verif</th>
                  	<th>Status</th>
                </tr>
              </thead>
              <tbody>
                @foreach($daftarUser as $data)
                	<tr>
                		<td>{{$data->id}}</td>
                		<td>{{$data->name}}</td>
                		<td>{{$data->email}}</td>
                		<td></td>
                		<td></td>
                		<td>
                			<div class="row">
                				<div class="col-sm6">
                					<button>Edit</button>
                				</div>
                				<div class="col-sm6">
                					<button>Delete</button>
                				</div>
                			</div>
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