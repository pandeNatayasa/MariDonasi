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
  <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/styleform.css')}}" rel="stylesheet">
  <!-- <link href="{{asset('css/styleProfil.css')}}" rel="stylesheet"> -->
  
</head>

<body >
  <header id="header">
    <div class="container-fluid">
      <div id="logo" class="pull-left">
        <h1><a href="{{ url('/home') }}" class="scrollto">MariDonasi</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
         <a href="#intro"><img src="{{asset('img/logo.png')}}" alt="" title="" width="60px" /></a>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="{{route('galangDana.index')}}">Galang Dana</a></li>
          
          
              @if (Route::has('login'))
                <!-- <div class="top-right links"> -->
                    @auth
                      <li>
                        <a href="{{ url('/home') }} ">Home</a>
                      </li>
                      <li>
                        <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                            {{ Auth::user()->name }}<span class="caret"></span>
                        </a>
                        <ul class="dropdown-menu">
                          <li>
                            <a href="{{route('member.index')}}">{{ Auth::user()->name }}</a>
                          </li>
                          <li>
                            <a href="{{ route('user.logout') }}" >
                                Logout
                            </a>
                          </li>
                        </ul>
                      </li>
                        
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
  <main id="main" >
    <section id="about">
      <div class="container">

        <header class="section-header wow fadeInUp" style="margin-top: 30px; margin-bottom: 200px;">
          <h3>Pemberitahuan</h3>
          <p>Maaf, sisa dana pada wallet/dompet kebaikan anda tidak cukup untuk melakukan donasi, Terimaksih</p>
          <center>
            <a href="{{ url('/home') }}" class="btn btn-primary wow bounceInUp"> Back to Home</a>
          </center>
        </header>

      </div>
    </section><!-- #about -->
 
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
    <script src="{{asset('lib/superfish/superfish.min.js')}}"></script>
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
  <!-- <script type="text/javascript">
    $('#profile a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });

    
  </script>
  <script type="text/javascript">
    $('#home a').click(function (e) {
      e.preventDefault();
      $(this).tab('show');
    });
  </script> -->
</body>


</html>
