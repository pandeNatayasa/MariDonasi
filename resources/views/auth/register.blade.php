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
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="lib/animate/animate.min.css" rel="stylesheet">
  <link href="lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">
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
          <!-- Authentication Links -->
            @guest
              <li><a href="{{ route('login') }}">Login</a></li>
            @else
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
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
            @endguest
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Intro Section
  ============================-->
  <section id="introo">
    <div class="introo-container">
      <div id="introoCarousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox"> 
          <div class="carousel-item active">
            <div class="carousel-background"><img src="img/intro-carousel/4.jpg" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                
                  <div class="row">
                    <div class="col-sm-3 col-sm-offset-2"></div>
                    <div class="col-sm-6 col-sm-offset-2">
                      <center>
                        <h3>Register</h3>
                        <p>Register to create Your Acount</p>
                      </center>
                      <div >
                        <form role="form" action="{{ route('register') }}" method="POST" class="register-form">
                          {{ csrf_field()}}
                          
                          <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <div class="row">
                              <div class="col-sm-4">
                                <label for="name" class="col-md-12 control-label">Your Name </label>
                              </div>

                              <div class="col-md-8">
                                <center>
                                  <input rows="6" id="name" type="text" placeholder="Your Name..." class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                </center>
                                @if ($errors->has('name'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('name') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>
                          </div>
                            
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="row">
                              <div class="col-sm-4">
                                <label for="email" class="col-md-12 control-label">E-Mail Address</label>
                              </div>
                              <div class="col-md-8">
                                <center>
                                  <input id="email" type="email" class="form-control" placeholder="Your E-Mail..." name="email" value="{{ old('email') }}" required>
                                </center>
                                @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>
                            
                          </div>
                          
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row">
                              <div class="col-sm-4">
                                <label for="password" class="col-md-12 control-label">Password</label>
                              </div>
                              <div class="col-md-8">
                                <center>
                                  <input id="password" type="password" class="form-control" placeholder="Password..." name="password" id="pass" required>
                                </center>
                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                              </div>
                            </div>
                          </div>
                          
                            <div class="form-group">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>
                                </div>
                                <div class="col-md-8">
                                  <input id="password-confirm" type="password" class="form-control" placeholder="Confirm Password..." name="password_confirmation" id="pass2" required >
                              </div>
                              </div>
                            </div>
                             <script type="text/javascript">
                               $('#pass2nd').on('keyup', function () {
                                     if ($(this).val() == $('#pass').val()) {
                                         $('#message').html('Konfirmasi Password Cocok').css('color', 'green');
                                  } 
                                  else $('#message').html('Konfirmasi Password Tidak Cocok').css('color', 'red');
                               });
                            </script> 
                            <div class="form-group">
                              <div class="col-md-12 col-md-offset-4" style="margin-top: 20px;">
                                  <button type="submit" class="btn btn-get-started" >
                                      Register
                                  </button>
                              </div>
                            </div>
                          </center>
                        
                        </form>
                      </div>  
                    </div>
                  </div>
                
              </div>
            </div>
          </div>
        </div>
        
        

        
      </div>
    </div>
    <div></div>
  </section><!-- #intro -->

  <main id="main">


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
  <script src="lib/jquery/jquery.min.js"></script>
  <script src="lib/jquery/jquery-migrate.min.js"></script>
  <script src="lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="lib/easing/easing.min.js"></script>
  <script src="lib/superfish/hoverIntent.js"></script>
  <script src="lib/superfish/superfish.min.js"></script>
  <script src="lib/wow/wow.min.js"></script>
  <script src="lib/waypoints/waypoints.min.js"></script>
  <script src="lib/counterup/counterup.min.js"></script>
  <script src="lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="lib/isotope/isotope.pkgd.min.js"></script>
  <script src="lib/lightbox/js/lightbox.min.js"></script>
  <script src="lib/touchSwipe/jquery.touchSwipe.min.js"></script>
  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main.js"></script>

</body>
</html>
