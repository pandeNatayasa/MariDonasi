<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <title>Mari Donasi</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <!-- {{asset('material/materialize/css/materialize.min.css')}} -->
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="{{asset('https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700')}}" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/styleform.css')}}" rel="stylesheet">
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="{{ url('/') }}" class="scrollto">MariDonasi</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="{{ url('/') }}">Welcome</a></li>
          <li><a href="{{ url('/home') }}">Home</a></li>
          <li>
            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                {{ Auth::user()->name }} <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
                <li>
                  <a href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                      document.getElementById('logout-form').submit();">
                        Logout
                  </a>
                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                    {{ csrf_field() }}
                  </form>
                </li>
            </ul>
          </li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="introgd">
    <div class="introgd-container">
      <div id="introCarousel">
        
      </div>
    </div>
    <div></div>
  </section><!-- #intro -->

  <main id="main">

     <!--==========================
      Portfolio Section
    ============================-->
    <section id="makecampaign"  >
      <div class="container">

        <header class="section-header" style="margin-top: 10px">
          <h3 class="section-title">Make Your Campaign</h3>
        </header>

        <div class="row portfolio-container">
          <div class="col-md-12 portfolio-item wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  
                  <div class="box" style="margin-top: 10px;">
                     <form action="" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
             
                     <div class="box-body">
                        <div class="box-body-col">
                           <h4>Informasi Campaign</h4>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Judul Campaign</label>
                              <div class="col-md-9">
                                 <input class="form-control" placeholder="judul singkat yang menjelaskan tujuan kamu menggalang dana (0/50)" name="campaignName" required="required" type="text" value="">
                              </div>
                            </div>
                             
                           </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Target Donasi</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="Target donasi dari campaign ini" name="targetDonasi" required="required" type="text" value="">
                             </div>
                            </div>
                           </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Link Campaign</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="ex. 'MariDonasi.com/bantuanSurya'" name="linkCampaign" required="required" type="text" value="MariDonasi.com/">
                             </div>
                            </div>
                           </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Deadline Campaign</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="" name="contact" required="required" type="date" value="">
                             </div>
                            </div>
                           </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Kategori Campaign</label>
                              <div class="col-md-9">
                                  <select name="kategoriCampaign" class="form-control" required="required">
                                  <option value="" disabled selected>Pilih Kategori Campaign</option>
                                  <option value="balitaDanAnak">Balita & Anak</option>
                                  <option value="bencanaAlam">Bencana Alam</option> 
                                  <option value="Pendidikan">Pendidikan</option>
                                  <option value="Kemanusiaan">Kemanusiaan</option>          
                                  </select>
                              </div>
                            </div> 
                            </div>
                           <div class="form-group">
                              <div class="row">
                                <label class="control-label col-md-3">Lokasi Penerima Dana</label>
                                <div class="col-md-9">
                                  <select name="lokasi" class="form-control" required="required">
                                  <option value="" disabled selected>Pilih Lokasi Penerima Dana</option>
                                  <option value="baliBangli">Prov. Bali, Kab. Bangli</option>
                                  <option value="baliBadung">Prov. Bali, kab. Badung</option> 
                                  <option value="baliGianyar">Prov. Bali, kab. Gianyar</option>
                                  <option value="baliDenpasar">Prov. Bali, kota Denparas</option>          
                                  </select>
                                </div>
                              </div>
                            </div>
                        </div>
                        <div class="box-body-col">
                           <h4>Cerita Campaign</h4>
                           <div class="form-group">
                              <div class="row">
                                <label class="control-label col-md-3">Cover Image</label>
                                <div class="col-md-9">
                                    <input name="photo" type="file" class="form-control" accept="image/*">
                                    <small>Gambar dalam bentuk file .jpg</small> 
                                </div>
                              </div>
                            </div>
                           <div class="form-group">
                              <div class="row">
                                <label class="control-label col-md-3">Deskripsi Singkat</label>
                               <div class="col-md-9">
                                   <input class="form-control" placeholder="deskripsi Singat Campaign anda" name="deskripsiSingkat" required="required" type="text" value="">
                               </div>
                              </div>
                           </div>
                           <div class="form-group">
                              <div class="row">
                                <label class="control-label col-md-3">Deskripsi Lengkap</label>
                                <div class="col-md-9">
                                   <textarea name="deskripsiLengkap" class="form-control" required="required" placeholder="deskripsi lengkap dari campaign anda" rows="6"></textarea>
                                </div>
                              </div>
                           </div>
                           <input type="submit" name="submit" value="Save & Next" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px;"> 
                        </div>
                         
                     </div>
                     </form>
                  </div>
               </div>
        </div>
      </div>
    </section><!-- #portfolio -->


  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-info">
            <h3>BizPage</h3>
            <p>Cras fermentum odio eu feugiat lide par naso tierra. Justo eget nada terra videa magna derita valies darta donna mare fermentum iaculis eu non diam phasellus. Scelerisque felis imperdiet proin fermentum leo. Amet volutpat consequat mauris nunc congue.</p>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4>Useful Links</h4>
            <ul>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">About us</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">FAQ</a></li>
              <li><i class="ion-ios-arrow-right"></i> <a href="#">Syarat dan Ketentuan</a></li>
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
        &copy; Copyright <strong>2018</strong>. All Rights Reserved
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

  <!-- JavaScript Libraries -->
  <script src="{{asset('lib/jquery/jquery.min.js')}}"></script>
  <script src="{{asset('lib/jquery/jquery-migrate.min.js')}}"></script>
  <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('lib/easing/easing.min.js')}}"></script>
  <script src="{{asset('lib/superfish/hoverIntent.js')}}"></script>
  <script src="{{asset('lib/superfish/superfish.min.js')}}"></script>
  <script src="{{asset('lib/wow/wow.min.js')}}"></script>
  <script src="{{asset('lib/waypoints/waypoints.min.js')}}"></script>
  <script src="{{asset('lib/counterup/counterup.min.js')}}"></script>
  <script src="{{asset('lib/owlcarousel/owl.carousel.min.js')}}"></script>
  <script src="{{asset('lib/isotope/isotope.pkgd.min.js')}}"></script>
  <script src="{{asset('lib/lightbox/js/lightbox.min.js')}}"></script>
  <script src="{{asset('lib/touchSwipe/jquery.touchSwipe.min.js')}}"></script>
  <!-- Contact Form JavaScript File -->
  <script src="{{asset('contactform/contactform.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('js/main.js')}}"></script>

</body>
</html>
