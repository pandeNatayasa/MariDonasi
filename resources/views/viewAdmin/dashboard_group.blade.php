@extends('layouts.admin')

@section('dashboard-organisasi')
  active
@endsection

@section('content')
  <div class="content-wrapper">
    <div class="container-fluid" style="padding-left: 25px;">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">MariDonasi</a>
        </li>
        <li class="breadcrumb-item active">Admin</li>
        <li class="breadcrumb-item active">Group</li>
      </ol>
      <!-- Icon Cards-->
      <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-info o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-comments"></i>
              </div>
              <div class="mr-5">
                {{$jumlahNewOrganisasi}}
                New Acount Organisasi!
              </div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('daftar-new-organisasi')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white bg-secondary o-hidden h-100">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-list"></i>
              </div>
              <div class="mr-5">{{$jumlahNewCampaignOrganisasi}} New Campaign Organisasi!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('daftar-new-campaign-group')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white o-hidden h-100" style="background-color: #F5AB99;">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-shopping-cart"></i>
              </div>
              <div class="mr-5">123 New Transfer Organisasi!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('daftar-new-transfer')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
          <div class="card text-white o-hidden h-100" style="background-color: #ea125e;">
            <div class="card-body">
              <div class="card-body-icon">
                <i class="fa fa-fw fa-money"></i>
              </div>
              <div class="mr-5">13 New Pencairan Dana Organisasi!</div>
            </div>
            <a class="card-footer text-white clearfix small z-1" href="{{route('daftar-new-pencairan-group')}}">
              <span class="float-left">View Details</span>
              <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
            </a>
          </div>
        </div>
      </div>
   
      <!-- Example DataTables Card-->
      <div class="card mb-3" style="margin-top: 20px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Table Example</div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered table-striped" id="data" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>Nama</th>
                  <th>Judul Campaign</th>
                  <th>Tempat Penerima</th>
                  <th>Sisa Hari</th>
                  <th>Deadline</th>
                  <th>Dana Terkumpul</th>
                </tr>
              </thead>
              <!-- <tfoot>
                <tr>
                  <th>Nama</th>
                  <th>Judul Campaign</th>
                  <th>Tempat Penerima</th>
                  <th>Sisa Hari</th>
                  <th>Deadline</th>
                  <th>Dana Terkumpul</th>
                </tr>
              </tfoot> -->
              <tbody>
                <tr>
                  <td>Tiger Nixon</td>
                  <td>System Architect</td>
                  <td>Edinburgh</td>
                  <td>61</td>
                  <td>2011/04/25</td>
                  <td>$320,800</td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
        <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
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