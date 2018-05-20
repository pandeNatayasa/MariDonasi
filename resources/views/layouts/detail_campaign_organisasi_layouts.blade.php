<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MariDonasi</title>

  <!-- Favicons -->
  <link href="{{asset('/img/favicon.png')}}" rel="icon">
  <link href="{{asset('/img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Bootstrap core CSS -->
  <link href="{{asset('/lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
  <!-- Custom fonts for this template-->
  <link href="{{asset('/lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('/lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('/lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('/lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('/css/style.css')}}" rel="stylesheet">
  <link href="{{asset('/css/styleform.css')}}" rel="stylesheet">
  <!-- <link href="{{asset('css/styleProfil.css')}}" rel="stylesheet"> -->
  <!-- Import data tables -->
    <link rel="stylesheet" type="text/css" href="{{asset('/css/datatables.min.css')}}">
  
  <script type="text/javascript">
    
  </script>
</head>

<body>
  <header id="header">
    <div class="container-fluid">
      <div id="logo" class="pull-left">
        <h1><a href="@yield('home') " class="scrollto">MariDonasi</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="#intro"><img src="{{asset('/img/logo.png')}}" alt="" title="" width="60px" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="@yield('route_galangDana')">Galang Dana</a></li>
          
                      <li>
                        <a href="@yield('home') ">Home</a>
                      </li>
                      <li>
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            @yield('nama_user')<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="@yield('route_user') ">@yield('nama_user')</a>
                          </li>
                          <li>
                            <a href="@yield('logout')" >
                                Logout
                            </a>
                          </li>
                        </ul>
                      </li>
              @if (Route::has('login'))
                <!-- <div class="top-right links"> -->
                    @auth          
                    @else
                      <li>
                        <a href="{{ route('login') }}">Login</a>
                      </li>
                      <li>
                        <a href="{{ route('register') }}">Register</a>
                      </li>
                        
                    @endauth
                <!-- </div> -->
            @endif
          
          
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="introgd">
    <div class="intro-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">
        <!-- <div class="carousel-background"><img src="img/intro-carousel/1.jpg" alt=""></div> -->
      </div>
    </div>
  </section><!-- #intro -->
  <main id="main">
  <div class="row ">
    <div class="col-md-8" style="padding: 20px 50px 50px 50px; margin-left: 50px; ">
       <!--==========================
        Portfolio Section
      ============================-->
      <section id="makecampaign" >
        <div class=" container">
          @if (\Session::has('error'))
              <div class="alert alert-danger alert-dismissible" role="alert">
                  <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                  <i class="fa fa-check"></i> <strong>{{ \Session::get('error') }}</strong>
              </div>
          @endif
          <div class=" wow fadeInUp" data-wow-duration="600ms" data-wow-delay="250ms" style="padding-top: 40px;">
            <div class="card-header">
              
              <i class="fa fa-table"></i> Data Riwatyat Pencairan
            </div>
            <div class="card-body" style="padding-bottom: 20px;  border-bottom: 2px solid #5b9bd1; margin-bottom: -2px;">
              <div class="table-responsive" style="margin-top: 30px;">
                <table class="table table-bordered table-striped table-hover display" id="table_pencairan">
                  <thead style="background-color: black;">
                    <tr>
                      <th style="color: #fff;">No</th>
                      <th style="color: #fff;">No Rek</th>
                      <th style="color: #fff;">Nominal</th>
                      <th style="color: #fff;">Tanggal Pencairan</th>
                      <th style="color: #fff;">Status</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($dataPencairan as $i => $data)
                    <tr>
                      <td>{{$i+1}}</td>
                      <td>{{$data->rek_organisasi->no_rek}}</td>
                      <td>Rp. {{number_format($data->nominal)}}</td>
                      <td>{{$data->created_at}}</td>
                      <td>{{$data->status}}</td>
                    </tr>
                    @endforeach
                </table>
              </div>
            </div>
          </div>

          <header class="section-header wow fadeInUp" data-wow-duration="500ms" data-wow-delay="250ms" style="margin-top: 30px">
            <h4>Detail campaign :</h4>
            <h3 class="section-title">{{$dataCampaign->judul}}</h3>
          </header>
          <center>
            <div style="padding: 10px  0px 10px 0 ;" class="wow fadeInUp" data-wow-duration="800ms" data-wow-delay="250ms">
              <img src="{{$dataCampaign->pic_cover_campaign}}" class="img-responsive" alt="" style="height: 350px;">
            </div>
          </center>

          <div class="row portfolio-container">
            <div class="col-md-11 portfolio-item wow fadeInUp" data-wow-duration="700ms" data-wow-delay="250ms">
              <div class="box" style="margin-top: 10px; background: rgb(0,0,0.8);">
                <div>
                  <h4 style="padding-top: 20px;">{{$dataCampaign->cerita_singkat}}</h4>
                  <div class="col-md-12" style="padding-bottom: 20px;  border-bottom: 2px solid #5b9bd1; margin-bottom: -2px;">
                    <div class="row" >
                      <div class="col-md-2" >
                        <div class="userpic_detail_campaign">
                        <?php
                          $foto = $dataCampaign->organisasi->pic;
                          if($foto == '0'){
                            $foto = "/img/profil_pic/profile_default.jpg";
                          }

                        ?>
                          <img src="{{$foto}}" class="img-responsive" alt="" >
                        </div>
                      </div>
                      <div class="col-md-8" style="padding: 20px 0px 20px 0px;">
                        {{$dataCampaign->organisasi->name}}
                      </div>
                         
                    </div >
                  </div>
                    
                    <div style="padding-top: 20px;" class="form-group">
                      {{$dataCampaign->cerita_lengkap}}
                    </div>

                </div>
                           
              </div>
                    
          </div>
        </div>
      </section><!-- #portfolio -->
      @if($jumlahDonasiBarang != '0' )
      <div class=" wow fadeInUp" data-wow-duration="500ms" data-wow-delay="250ms" style="padding-top: 40px;">
        <div class="card-header">
          <i class="fa fa-table"></i> Data Barang yang dibutuhkan
        </div>
        <div class="card-body">
           <div class="table-responsive" style="margin-top: 10px;">
            <table class="table table-bordered table-striped table-hover display" id="table_donasi">
              <thead style="background-color: black;">
                <tr>
                  <th style="color: #fff;">No</th>
                  <th style="color: #fff;">Nama Barang</th>
                  <th style="color: #fff;">Target Jumlah</th>
                  <th style="color: #fff;">Jumlah terkumpul</th>
                  <th style="color: #fff;">Satuan</th>
                </tr>
              </thead>
              <tbody>
                <?php $no = 0;?>
                @foreach($dataDonasiBarang as $data)
                <tr>
                  <td>{{$no = $no+1}}</td>
                  <td>{{$data->nama_barang}}</td>
                  <td>{{$data->target_jumlah}}</td>
                  <td>{{$data->jumlah_sementara}}</td>
                  <td>{{$data->satuan}}</td>
                </tr>
                @endforeach                
              </tbody>
            </table>
          </div>
        </div>
      </div>
      @endif

      
        
    </div>
    <div class="col-md-3" style=" margin-top: 60px; padding: 20px ; background: rgba(0,0,0,0.05); height: 350px;">
      <h3 style="">Rp. {{number_format($dataCampaign->dana_sementara)}}</h3>
      <p style="margin-bottom: 2px;">Terkumpul dari target Rp. {{number_format($dataCampaign->target_donasi)}}</p>
      <div class="row" style=" padding-bottom: 5px;  border-bottom: 2px solid #5b9bd1; margin-bottom: -2px;">
      </div>
      <div class="row" style=" padding-bottom: 5px; padding-top: 25px; ">
        <div class="col-md-6">
          <label style="float: left;">Sisa Hari</label>
        </div>
        <div class="col-md-6">
          <?php
            $dateNow = time();
            $end_date = strtotime($dataCampaign->deadline);
            // $interval = date_diff($dateNow,$end_date);
            $diff = $end_date - $dateNow;
            $interval=floor($diff / (60 * 60 * 24));
          ?>
          <label style="float: right;">{{$interval}} Hari</label>
        </div>
      </div>
      
      <button style="margin-top: 20px; padding: 10px 90px 10px 90px;" class="btn btn-success" data-toggle="modal"  name="pencairanDana" data-target="#modal-form_{{$data->id}}" data-toggle="tooltip" data-placement="right" title="Pengajuan Pencairan Dana"><center>Cairan Dana</center> </button>
      <!-- Modal Tambah Pencairan Dana-->
        <div class="modal fade" id="modal-form_{{$data->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="modalTambahDataLabel">Pengajuan Pencairan Dana</h5>
                  <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                  </button>
                </div>
                <!-- method="post" action="{{route('campaign_user_barang.store')}}" -->
                <form method="POST" enctype="multipart/form-data"  action="{{route('pencairan_dana_campaign_organisasi')}}" >
                {{csrf_field()}}
                  <div class="modal-header">
                      <h6>Sisa Dana : Rp. {{number_format($sisaDana)}}</h6>
                  </div>
                    <div class="row col-md-12">
                      <p style="margin-bottom: 0px; padding-left: 15px;">Pencairan dana tidak boleh melebihi sisa dana</p>
                    </div>
                  <div class="modal-body">
                    <div class="row">
                      <label class="control-label col-md-4">Jumlah Pencairan dana</label>
                      <div class="col-md-8">
                        <input class="form-control" placeholder="Jumlah Pencairan Dana" name="jumlah_pencairan_dana" type="text" required ">
                        <input type="hidden" name="id_campaign" value="{{$id_campaign}}">
                      </div>
                    </div>
                    <div class="row" style="padding-bottom: 10px;">
                      <label class="control-label col-md-4">Bank tujuan</label>
                      <div class="col-md-8">
                        <input class="form-control" placeholder="Bank Tujuan" name="bank_tujuan" type="text" required >
                        
                      </div>
                    </div>
                    <div class="row">
                      <label class="control-label col-md-4">Nama Pemilik Rekening</label>
                      <div class="col-md-8">
                        <input class="form-control" placeholder="Nama Pemilik Rekening" name="nama_pemilik_rek" type="text" required >
                        
                      </div>
                    </div>
                    <div class="row">
                      <label class="control-label col-md-4">No Rekening</label>
                      <div class="col-md-8">
                        <input class="form-control" placeholder="Nomor Rekening Anda" name="no_rek" type="text" required id="no_rek">
                        
                      </div>
                    </div>
                    
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                    <input class="btn btn-primary" name="tambahPencairanDana" value="Submit" type="submit" id="tambahBuktiTransfer">
                  </div>
                </form>
              </div>
            </div>
          </div>
        <!-- End of modal tambah pencairan dana -->
      @if($jumlahDonasiBarang != '0' )
        <a href="{{route('galangDana.show',$id_campaign)}}" style="margin-top: 20px; padding: 10px 70px 10px 70px;" class="btn btn-info"><center>Pencairang Barang</center> </a>
      @endif
      
    </div>
  </div>
 
  </main>
  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>MariDonasi</h3>
            <p>Mari Donasi merupakan website untuk membantu orang-orang yang membutuhkan dengan mendonasikan uang atau barang.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Learn More</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Apa itu MariDonasi ?</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">FAQ</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Syarat dan Ketentuan</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Kebijakan privasi</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-contact">
            <h4>Contact Us</h4>
            <p>
              A108 Adam Street <br>
              New York, NY 535022<br>
              United States <br>
              <strong>Phone:</strong> +1 5589 55488 55<br>
              <strong>Email:</strong> info@example.com<br>
            </p>

            <div class="social-links">
              <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
              <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
              <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
              <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
              <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
            </div>

          </div>

          <div class="col-lg-3 col-md-6 footer-newsletter">
            <h4>Our Newsletter</h4>
            <p>Tamen quem nulla quae legam multos aute sint culpa legam noster magna veniam enim veniam illum dolore legam minim quorum culpa amet magna export quem marada parida nodela caramase seza.</p>
            
          </div>

        </div>
      </div>
    </div>

    <div class="container">
      <div class="copyright">
        &copy; Copyright <strong>BizPage</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
      <!-- Bootstrap core JavaScript-->
    <script src="{{asset('/lib/jquery/jquery-3.3.1.min.js')}}"></script>
     <script src="{{asset('lib/jquery/jquery-migrate.min.js')}}"></script>
    <script src="{{asset('/lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="{{asset('/vendor/jquery-easing/jquery.easing.min.js')}}"></script>
    <script src="{{asset('/lib/superfish/hoverIntent.js')}}"></script>
    <script src="{{asset('/lib/superfish/superfish.min.js')}}"></script>
    <!-- Page level plugin JavaScript-->
    <script src="{{asset('/vendor/datatables/jquery.dataTables.js')}}"></script>
    <script src="{{asset('/vendor/datatables/dataTables.bootstrap4.js')}}"></script>
    <!-- Custom scripts for all pages-->
    <script src="{{asset('/lib/wow/wow.min.js')}}"></script>
      <script src="{{asset('/lib/waypoints/waypoints.min.js')}}"></script>
      <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
      <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
      <script src="{{asset('lib/isotope/isotope.pkgd.min.js')}}"></script>
      <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
      <script src="{{asset('lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
      <!-- Contact Form JavaScript File -->
      <script src="{{asset('contactform/contactform.js')}}"></script>

      <!-- Template Main Javascript File -->
      <script src="{{asset('js/main.js')}}"></script>
    <!-- Data Tables -->
    <script type="text/javascript" charset="utf8" src="{{asset('/js/datatables.min.js')}}"></script>

  </div>
  <script type="text/javascript">
    $(document).ready( function () {
      $('#table_donasi').DataTable();
    } );

    $(document).ready( function () {
      $('#table_pencairan').DataTable();
    } );

  </script>
</body>


</html>
