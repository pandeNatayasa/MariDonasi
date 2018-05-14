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

<body>
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
  <main id="main">
  <div class="row ">
    <div class="col-md-8" style="padding: 50px; margin-left: 50px;">
       <!--==========================
        Portfolio Section
      ============================-->
      <section id="makecampaign" >
        <div class=" container">

          <header class="section-header wow fadeInUp" data-wow-duration="500ms" data-wow-delay="250ms" style="margin-top: 10px">
            <h3 class="section-title">Make Your Campaign</h3>
          </header>
          <center>
            <?php
                $ktp_pic = "/img/ktp_pic/ktp.jpg";
            ?>
            <div style="padding: 10px  0px 10px 0 ;" class="wow fadeInUp" data-wow-duration="800ms" data-wow-delay="250ms">
              <img src="{{$ktp_pic}}" class="img-responsive" alt="" style="height: 350px;">
            </div>
          </center>

          <div class="row portfolio-container">
            <div class="col-md-11 portfolio-item wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
              <div class="box" style="margin-top: 10px; background: rgb(0,0,0.8);">
                <div>
                  <h4 style="padding-top: 20px;">Informasi Campaign</h4>
                  <div class="col-md-12" style="padding-bottom: 20px;  border-bottom: 2px solid #5b9bd1; margin-bottom: -2px;">
                    <div class="row" >
                      <div class="col-md-2" >
                        <div class="userpic_detail_campaign">
                          <img src="{{$ktp_pic}}" class="img-responsive" alt="" >
                        </div>
                      </div>
                      <div class="col-md-8" style="padding: 20px 0px 20px 0px;">
                        natayasa
                      </div>
                         
                    </div >
                  </div>
                    
                    <div style="padding-top: 20px;" class="form-group">
                      Cerita Lengkap Campaign
                    </div>

                </div>
                           
              </div>
                    
          </div>
        </div>
      </section><!-- #portfolio -->
    </div>
    <div class="col-md-3">
      sssss
    </div>
  </div>
  
  <!-- <div class="row portfolio-container">
    <div class="col-md-12 portfolio-item wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
    <div class="box" style="padding: 20px;">-->

      <!-- Nav tabs -->
      <!-- <ul class="nav nav-tabs" role="tablist">
        <li role="presentation" class="active" style="padding: 10px;"><button class="btn btn-info"><a href="#home" aria-controls="home" role="tab" data-toggle="tab">Home</a></button></li>
        <li role="presentation" style="padding: 10px;"><button class="btn btn-success"><a href="#profile" aria-controls="profile" role="tab" data-toggle="tab">Profile</a></button></li>
        <li role="presentation" style="padding: 10px;"><button class="btn btn-secondary"><a href="#messages" aria-controls="messages" role="tab" data-toggle="tab">Messages</a></button></li>
        <li role="presentation" style="padding: 10px;"><button class="btn btn-success"><a href="#settings" aria-controls="settings" role="tab" data-toggle="tab">Settings</a></button></li>
      </ul>
 -->
      <!-- Tab panes -->
      <!-- <div class="tab-content">
        <div role="tabpanel" class="tab-pane active" id="home">Home</div>
        <div role="tabpanel" class="tab-pane" id="profile">Profile...</div>
        <div role="tabpanel" class="tab-pane" id="messages">...</div>
        <div role="tabpanel" class="tab-pane" id="settings">...</div>
      </div>

    </div>
  </div>
  </div> -->
 
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
