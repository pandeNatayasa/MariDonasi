@extends('layouts.admin')

@section('penerimaan')
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
        <li class="breadcrumb-item active">Daftar Penerimaan Barang</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 20px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Penerimaan Barang</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="data" width="100%" cellspacing="0">
              <thead>
                <tr>
                	<th>Id</th>
                  <th>Nama</th>
                  <th>Judul Campaign</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Tanggal Pengiriman</th>
                  <th>Detail</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
              	<tr>
              		<td>1</td>
              		<td>Bagus</td>
              		<td>Bantu Andi</td>
                  <td></td>
                  <td></td>
              		<td></td>
              		<td><button class="btn btn-info " data-toggle="tooltip" data-placement="right" title="View Detail"><i class="fa fa-eye"></i></button></td>
              		<td>
              			<button class="btn btn-primary " data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></button>
                    <button class="btn btn-danger " data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></button>
              		</td>
              	</tr>
              	<tr>
              		<td>2</td>
                  <td>Aagus</td>
                  <td>Bantu Anto</td>
                  <td></td>
                  <td></td>
                  <td></td>
                  <td><button class="btn btn-info "><i class="fa fa-eye"></i></button></td>
                  <td>
                    <button class="btn btn-primary "><i class="fa fa-check"></i></button>
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