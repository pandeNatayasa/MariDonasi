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
        <li class="breadcrumb-item active">Daftar New Penerimaan Barang</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 20px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data New Penerimaan Barang</div>
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
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                <?php $no=0;?>
                @foreach($dataNewBarang as $data)
              	<tr>
              		<td>{{$no=$no+1}}</td>
              		<td>{{$data->User->name}}</td>
              		<td>{{$data->campaign_user->judul}}</td>
                  <td>{{$data->barang}}</td>
                  <td>{{$data->jumlah}}</td>
              		<td>{{$data->created_at}}</td>
              		<td>
                    <div class="row">
                      <div class="col-sm-1" style="padding: 0px; margin:0px;"></div>
                      <div class="col-sm-5" style="padding: 0px; margin:0px;">
                        <form action="{{route('validasi_barang')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" style="padding: 0px; margin:0px;">
                        {{csrf_field()}}
                          <input type="hidden" name="barang" value="{{$data->barang}}">
                          <input type="hidden" name="id" value="{{$data->id}}">
                          <button class="btn btn-primary " type="submit" data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></button>
                        </form>
                      </div>
                      <div class="col-sm-5" style="padding: 0px; margin:0px;">
                        <button class="btn btn-danger " data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></button>
                      </div>
                    </div>
              		</td>
              	</tr>
                @endforeach
                @foreach($dataNewBarangOrganisasi as $data)
                <tr>
                  <td>{{$no=$no+1}}</td>
                  <td>{{$data->organisasi->name}}</td>
                  <td>{{$data->campaign_organisasi->judul}}</td>
                  <td>{{$data->barang}}</td>
                  <td>{{$data->jumlah}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>
                    <div class="row">
                      <div class="col-sm-1" style="padding: 0px; margin:0px;"></div>
                      <div class="col-sm-5" style="padding: 0px; margin:0px;">
                        <form action="{{route('validasi_barang_organisasi')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" style="padding: 0px; margin:0px;">
                        {{csrf_field()}}
                          <input type="hidden" name="barang" value="{{$data->barang}}">
                          <input type="hidden" name="id" value="{{$data->id}}">
                          <button class="btn btn-primary " type="submit" data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></button>
                        </form>
                      </div>
                      <div class="col-sm-5" style="padding: 0px; margin:0px;">
                        <button class="btn btn-danger " data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></button>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                @foreach($dataNewBarangOrganisasiToUser as $data)
                <tr>
                  <td>{{$no=$no+1}}</td>
                  <td>{{$data->organisasi->name}}</td>
                  <td>{{$data->campaign_user->judul}}</td>
                  <td>{{$data->barang}}</td>
                  <td>{{$data->jumlah}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>
                    <div class="row">
                      <div class="col-sm-1" style="padding: 0px; margin:0px;"></div>
                      <div class="col-sm-5" style="padding: 0px; margin:0px;">
                        <form action="{{route('validasi_barang_organisasi_to_user')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" style="padding: 0px; margin:0px;">
                        {{csrf_field()}}
                          <input type="hidden" name="barang" value="{{$data->barang}}">
                          <input type="hidden" name="id" value="{{$data->id}}">
                          <button class="btn btn-primary " type="submit" data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></button>
                        </form>
                      </div>
                      <div class="col-sm-5" style="padding: 0px; margin:0px;">
                        <button class="btn btn-danger " data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></button>
                      </div>
                    </div>
                  </td>
                </tr>
                @endforeach
                @foreach($dataNewBarangUserToOrganisasi as $data)
                <tr>
                  <td>{{$no=$no+1}}</td>
                  <td>{{$data->User->name}}</td>
                  <td>{{$data->campaign_organisasi->judul}}</td>
                  <td>{{$data->barang}}</td>
                  <td>{{$data->jumlah}}</td>
                  <td>{{$data->created_at}}</td>
                  <td>
                    <div class="row">
                      <div class="col-sm-1" style="padding: 0px; margin:0px;"></div>
                      <div class="col-sm-5" style="padding: 0px; margin:0px;">
                        <form action="{{route('validasi_barang_user_to_organisasi')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8" style="padding: 0px; margin:0px;">
                        {{csrf_field()}}
                          <input type="hidden" name="barang" value="{{$data->barang}}">
                          <input type="hidden" name="id" value="{{$data->id}}">
                          <button class="btn btn-primary " type="submit" data-toggle="tooltip" data-placement="right" title="Validasi"><i class="fa fa-check"></i></button>
                        </form>
                      </div>
                      <div class="col-sm-5" style="padding: 0px; margin:0px;">
                        <button class="btn btn-danger " data-toggle="tooltip" data-placement="right" title="Hapus"><i class="fa fa-trash"></i></button>
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
            <table class="table table-bordered table-striped" id="dataBarang" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Id</th>
                  <th>Nama</th>
                  <th>Judul Campaign</th>
                  <th>Nama Barang</th>
                  <th>Jumlah</th>
                  <th>Tanggal Pengiriman</th>
                  <th>Status</th>
                </tr>
              </thead>
              <tbody>
                  <?php $no=0;?>
                  @foreach($dataBarang as $data)
                  <tr>
                    <td>{{$no=$no+1}}</td>
                    <td>{{$data->User->name}}</td>
                    <td>{{$data->campaign_user->judul}}</td>
                    <td>{{$data->barang}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                      {{$data->status}}
                    </td>
                  </tr>
                  @endforeach
                  @foreach($dataBarangOrganisasi as $data)
                  <tr>
                    <td>{{$no=$no+1}}</td>
                    <td>{{$data->organisasi->name}}</td>
                    <td>{{$data->campaign_organisasi->judul}}</td>
                    <td>{{$data->barang}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                      {{$data->status}}
                    </td>
                  </tr>
                  @endforeach
                  @foreach($dataBarangOrganisasiToUser as $data)
                  <tr>
                    <td>{{$no=$no+1}}</td>
                    <td>{{$data->organisasi->name}}</td>
                    <td>{{$data->campaign_user->judul}}</td>
                    <td>{{$data->barang}}</td>
                    <td>{{$data->jumlah}}</td>
                    <td>{{$data->created_at}}</td>
                    <td>
                      {{$data->status}}
                    </td>
                  </tr>
                  @endforeach
                  @foreach($dataBarangUserToOrganisasi as $data)
                  <tr>
                    <td>{{$no=$no+1}}</td>
                    <td>{{$data->User->name}}</td>
                    <td>{{$data->campaign_organisasi->judul}}</td>
                    <td>{{$data->barang}}</td>
                    <td>{{$data->jumlah}}</td>
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