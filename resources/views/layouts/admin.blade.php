<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MariDonasi-admin</title>

  <!-- Favicons -->
  <link href="{{asset('/img/favicon.png')}}" rel="icon">
  <link href="{{asset('/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
  <!-- Custom fonts for this template-->
  <link href="{{asset('/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="{{asset('/css/sb-admin.css')}}" rel="stylesheet">

  <!-- Page level plugin CSS-->
   <link rel="stylesheet" type="text/css" href="{{asset('/css/datatables.min.css')}}">
  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
  <!-- Navigation-->
  <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top" id="mainNav">
    <a class="navbar-brand" href="{{route('admin.home')}}">MariDonasi</a>
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarResponsive">
      <ul class="navbar-nav navbar-sidenav" id="exampleAccordion" style="overflow: auto;">
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <div class="row" style="height: 80px; background-color: #060606; margin-right: 0px;">
            <div class="col-sm-4 admin-pic" style="padding: 10px 10px 10px 20px;">
             <center><!-- #898989 #181717-->
                <?php
                  $foto = Auth::guard('admin')->user()->profil_pic;
                  if($foto == '0'){
                    $foto = "/img/profil_pic/profile_default.jpg";
                  }

                ?>
                <img src="{{$foto}}" class="img-responsive" alt="">
              </center>
            </div>
            <div class="col-sm-8" style="padding: 15px 0 15px 0;">
              <div class="col-sm-12" style="padding: 0; color: #D6D5D5; "> {{Auth::guard('admin')->user()->name}}</div>
              <div class="col-sm-12" style="padding: 0; color: #D6D5D5;font-size: 12px;">{{Auth::guard('admin')->user()->email}}</div>
            </div>
          </div>
        </li>
        <li class="nav-item @yield('dashboard')" data-toggle="tooltip" data-placement="right" title="Dashboard">
          <a class="nav-link" href="{{route('admin.home')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard (User)</span>
          </a>
        </li>
        <li class="nav-item @yield('dashboard-organisasi')" data-toggle="tooltip" data-placement="right" title="Dashboard Group">
          <a class="nav-link" href="{{route('admin-organisasi.index')}}">
            <i class="fa fa-fw fa-dashboard"></i>
            <span class="nav-link-text">Dashboard (Group)</span>
          </a>
        </li>
        <li class="nav-item @yield('daftar-campaign')" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="{{route('daftar-campaign')}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Daftar Campaign (User)</span>
          </a>
        </li>
        <li class="nav-item @yield('daftar-campaign-group')" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="{{route('daftar-campaign-group')}}">
            <i class="fa fa-fw fa-table"></i>
            <span class="nav-link-text">Daftar Campaign (Group)</span>
          </a>
        </li>
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Daftar Pengguna">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents5" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-user"></i>
            <span class="nav-link-text">Daftar Pengguna</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents5">
            <li class="nav-item @yield('daftar-admin')" data-toggle="tooltip" data-placement="right" title="Charts">
              <a class="nav-link" href="{{route('daftar-admin')}}">
                <i class="fa fa-fw fa-user"></i>
                <span class="nav-link-text">Daftar Admin</span>
              </a>
            </li>
            <li class="nav-item @yield('daftar-user')" data-toggle="tooltip" data-placement="right" title="Charts">
              <a class="nav-link" href="{{route('daftar-user')}}">
                <i class="fa fa-fw fa-user"></i>
                <span class="nav-link-text">Daftar User</span>
              </a>
            </li>
            <li class="nav-item @yield('daftar-organisasi')" data-toggle="tooltip" data-placement="right" title="Charts">
              <a class="nav-link" href="{{route('daftar-organisasi')}}">
                <i class="fa fa-fw fa-user"></i>
                <span class="nav-link-text">Daftar Organisasi</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item " data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-dollar"></i>
            <span class="nav-link-text">Transaksi Dana</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li class="@yield('transfer')">
              <a href="{{route('daftar-transfer')}}">
                <i class="fa fa-fw fa-upload"></i>
                <span class="nav-link-text">Transfer</span>
              </a>
            </li>
            <li class="@yield('pencairan')">
              <a href="{{route('daftar-pencairan')}}">
                <i class="fa fa-fw fa-download"></i>
                <span class="nav-link-text">Pencairan</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents1" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-archive"></i>
            <span class="nav-link-text">Transaksi Barang</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents1">
            <li class="@yield('pengiriman')">
              <a href="{{route('daftar-pengiriman')}}">
                <i class="fa fa-fw fa-upload"></i>
                <span class="nav-link-text">Pengiriman</span>
              </a>
            </li>
            <li class="@yield('penerimaan')">
              <a href="{{route('daftar-penerimaan')}}">
                <i class="fa fa-fw fa-download"></i>
                <span class="nav-link-text">Penerimaan</span>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item @yield('deposit-user')" data-toggle="tooltip" data-placement="right" title="Deposit User">
          <a class="nav-link" href="{{route('daftar-deposit-user')}}">
            <i class="fa fa-fw fa-dollar"></i>
            <span class="nav-link-text">Deposit User</span>
          </a>
        </li>
        <li class="nav-item @yield('deposit-group')" data-toggle="tooltip" data-placement="right" title="Deposit Group">
          <a class="nav-link" href="{{route('daftar-deposit-organisasi')}}">
            <i class="fa fa-fw fa-dollar"></i>
            <span class="nav-link-text">Deposit Group</span>
          </a>
        </li>
        <li class="nav-item @yield('register')" data-toggle="tooltip" data-placement="right" title="Tables">
          <a class="nav-link" href="{{route('admin.create')}}">
            <i class="fa fa-fw fa-edit"></i>
            <span class="nav-link-text">Register</span>
          </a>
        </li>
        <!-- <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Components">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseComponents" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-wrench"></i>
            <span class="nav-link-text">Components</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseComponents">
            <li>
              <a href="navbar.html">Navbar</a>
            </li>
            <li>
              <a href="cards.html">Cards</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Example Pages">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseExamplePages" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-file"></i>
            <span class="nav-link-text">Example Pages</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseExamplePages">
            <li>
              <a href="login.html">Login Page</a>
            </li>
            <li>
              <a href="register.html">Registration Page</a>
            </li>
            <li>
              <a href="forgot-password.html">Forgot Password Page</a>
            </li>
            <li>
              <a href="blank.html">Blank Page</a>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Menu Levels">
          <a class="nav-link nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti" data-parent="#exampleAccordion">
            <i class="fa fa-fw fa-sitemap"></i>
            <span class="nav-link-text">Menu Levels</span>
          </a>
          <ul class="sidenav-second-level collapse" id="collapseMulti">
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a href="#">Second Level Item</a>
            </li>
            <li>
              <a class="nav-link-collapse collapsed" data-toggle="collapse" href="#collapseMulti2">Third Level</a>
              <ul class="sidenav-third-level collapse" id="collapseMulti2">
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
                <li>
                  <a href="#">Third Level Item</a>
                </li>
              </ul>
            </li>
          </ul>
        </li>
        <li class="nav-item" data-toggle="tooltip" data-placement="right" title="Link">
          <a class="nav-link" href="#">
            <i class="fa fa-fw fa-link"></i>
            <span class="nav-link-text">Link</span>
          </a>
        </li> -->
      </ul>
      <ul class="navbar-nav sidenav-toggler">
        <li class="nav-item">
          <a class="nav-link text-center" id="sidenavToggler">
            <i class="fa fa-fw fa-angle-left"></i>
          </a>
        </li>
      </ul>
      <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="messagesDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-envelope"></i>
            <span class="d-lg-none">Messages
              <span class="badge badge-pill badge-primary">12 New</span>
            </span>
            <span class="indicator text-primary d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="messagesDropdown">
            <h6 class="dropdown-header">New Messages:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>David Miller</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">Hey there! This new version of SB Admin is pretty awesome! These messages clip off when they reach the end of the box so they don't overflow over to the sides!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>Jane Smith</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I was wondering if you could meet for an appointment at 3:00 instead of 4:00. Thanks!</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <strong>John Doe</strong>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">I've sent the final files over to you for review. When you're able to sign off of them let me know and we can discuss distribution.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all messages</a>
          </div>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle mr-lg-2" id="alertsDropdown" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <i class="fa fa-fw fa-bell"></i>
            <span class="d-lg-none">Alerts
              <span class="badge badge-pill badge-warning">6 New</span>
            </span>
            <span class="indicator text-warning d-none d-lg-block">
              <i class="fa fa-fw fa-circle"></i>
            </span>
          </a>
          <div class="dropdown-menu" aria-labelledby="alertsDropdown">
            <h6 class="dropdown-header">New Alerts:</h6>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-danger">
                <strong>
                  <i class="fa fa-long-arrow-down fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item" href="#">
              <span class="text-success">
                <strong>
                  <i class="fa fa-long-arrow-up fa-fw"></i>Status Update</strong>
              </span>
              <span class="small float-right text-muted">11:21 AM</span>
              <div class="dropdown-message small">This is an automated server response message. All systems are online.</div>
            </a>
            <div class="dropdown-divider"></div>
            <a class="dropdown-item small" href="#">View all alerts</a>
          </div>
        </li>
        <!-- <li class="nav-item">
          <form class="form-inline my-2 my-lg-0 mr-lg-2">
            <div class="input-group">
              <input class="form-control" type="text" placeholder="Search for...">
              <span class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fa fa-search"></i>
                </button>
              </span>
            </div>
          </form>
        </li> -->
        <li class="nav-item">
          <a class="nav-link" data-toggle="modal" data-target="#exampleModal">
            <i class="fa fa-fw fa-sign-out"></i>Logout</a>
        </li>
      </ul>
    </div>
  </nav>
    @yield('content')
  <!-- Logout Modal-->
    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
          <div class="modal-footer">
            <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
            <a class="btn btn-primary" href="{{route('admin.logout')}}">Logout</a>
          </div>
        </div>
      </div>
    </div>
      <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/lib/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="/vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="/vendor/datatables/jquery.dataTables.js"></script>
    <script src="/vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="/js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="/js/sb-admin-datatables.min.js"></script>
    <!-- Data Tables -->
    <script type="text/javascript" charset="utf8" src="{{asset('/js/datatables.min.js')}}"></script>

    <script type="text/javascript">
      $(document).ready( function () {
        $('#data').DataTable();
      } );

      $(document).ready( function () {
        $('#dataBarang').DataTable();
      } );

    </script>
  </div>
</body>

</html>
