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
                    <center><button class="btn btn-info " data-toggle="tooltip" data-placement="right" title="Ktp Picture"><i class="fa fa-eye"></i></button></center>
                  </td>
                  <td>
                    <center><button class="btn btn-info " data-toggle="tooltip" data-placement="right" title="Verif Picture"><i class="fa fa-eye"></i></button></center> 
                  </td>
              		<td>
                    <a href="" class="btn btn-info " data-toggle="tooltip" data-placement="right" title="Vew Detail"><i class="fa fa-eye"></i></a>
              			<a href="{{route('admin.edit',$data->id)}}" class="btn btn-primary " data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></a>
                    <a href="" class="btn btn-danger " data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></a>
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