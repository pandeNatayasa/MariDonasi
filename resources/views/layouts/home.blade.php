<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>MariDonasi</title>
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <meta content="" name="keywords">
  <meta content="" name="description">

  <!-- Favicons -->
  <link href="img/favicon.png" rel="icon">
  <link href="img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Montserrat:300,400,500,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/animate/animate.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/ionicons/css/ionicons.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
  <link href="{{asset('lib/lightbox/css/lightbox.min.css')}}" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style.css" rel="stylesheet">

  <!-- =======================================================
    Theme Name: BizPage
    Theme URL: https://bootstrapmade.com/bizpage-bootstrap-business-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>

<body>

@yield('navbar')

  <!--==========================
    Intro Section
  ============================-->
  <section id="introhome">
    <div class="introhome-container">
      <div id="introCarousel" class="carousel  slide carousel-fade" data-ride="carousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox">

          <div class="carousel-item active">
            <div class="carousel-background"><img src="{{asset('img/intro-carousel/slider-1.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <div class="row" >
                  <div class="offset-md-1 offset-sm-1 ">
                    <h2>Selamat Datang</h2>
                  </div>
                </div>
                <div class="row" >
                  <div class="offset-md-1 offset-sm-1 ">
                    <p>Berdonasi tidak akan membuatmu jatuh miskin, sebaliknya kamu akan mendapat pahala dari kebaikan yg kamu lakukan.</p>
                  </div>
                </div>
                
                <div class="row" >
                  <!-- <div class="col-lg-2"></div> -->
                  <div class="offset-md-1 offset-sm-1">
                    <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('img/intro-carousel/slider-2.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <div class="row" >
                  <div class="offset-md-1 offset-sm-1 ">
                    <h2>Buat Campaign Anda</h2>
                  </div>
                </div>
                <div class="row" >
                  <div class="offset-md-1 offset-sm-1 ">
                    <p>Tingkatkan kesadaran berdonasi untuk membantu sesama dan membangun kehidupan untuk lebih baik</p>
                  </div>
                </div>
                
                <div class="row" >
                  <!-- <div class="col-lg-2"></div> -->
                  <div class="offset-md-1 offset-sm-1">
                    <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('img/intro-carousel/slider-3.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                <div class="row" >
                  <div class="offset-md-1 offset-sm-1 ">
                    <h2>Galang Dana untuk orang tercinta</h2>
                  </div>
                </div>
                <div class="row" >
                  <div class="offset-md-1 offset-sm-1 ">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                  </div>
                </div>
                
                <div class="row" >
                  <!-- <div class="col-lg-2"></div> -->
                  <div class="offset-md-1 offset-sm-1">
                    <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div class="carousel-item">
            <div class="carousel-background"><img src="{{asset('img/intro-carousel/slider-4.jpg')}}" alt=""></div>
            <div class="carousel-container">
             <div class="carousel-content">
                <div class="row" >
                  <div class="offset-md-1 offset-sm-1 ">
                    <h2>Demi kesejahteraan bersama</h2>
                  </div>
                </div>
                <div class="row" >
                  <div class="offset-md-1 offset-sm-1 ">
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua</p>
                  </div>
                </div>
                
                <div class="row" >
                  <!-- <div class="col-lg-2"></div> -->
                  <div class="offset-md-1 offset-sm-1">
                    <a href="#featured-services" class="btn-get-started scrollto">Get Started</a>
                  </div>
                </div>
              </div>
            </div>
          </div>

        </div>

        <a class="carousel-control-prev" href="#introCarousel" role="button" data-slide="prev">
          <span class="carousel-control-prev-icon ion-chevron-left" aria-hidden="true"></span>
          <span class="sr-only">Previous</span>
        </a>

        <a class="carousel-control-next" href="#introCarousel" role="button" data-slide="next">
          <span class="carousel-control-next-icon ion-chevron-right" aria-hidden="true"></span>
          <span class="sr-only">Next</span>
        </a>

      </div>
    </div>
  </section><!-- #intro -->

  <main id="main">
   <!--==========================
      Featured Services Section
    ============================-->
    <section id="featured-services">
      <div class="container">
        <div class="row">

          <div class="col-lg-4 box">
            <h4 class="title"><a href="">Campaign Terdanai</a></h4>
            <p class="description">274 campaign</p>
          </div>

          <div class="col-lg-4 box box-bg">
            <h4 class="title"><a href="">Dana Terkumpul</a></h4>
            <p class="description">Rp. 16.000.000</p>
          </div>

          <div class="col-lg-4 box">
            <h4 class="title"><a href="">Partisipan</a></h4>
            <p class="description">1.364 orang</p>
          </div>

        </div>
      </div>
    </section><!-- #featured-services -->

      <!--==========================
      Portfolio Section
    ============================-->
    <section id="portfolio"  class="section-bg" >
      <div class="container">

        <header class="section-header">
          <h3 class="section-title">DONASI</h3>
        </header>

        <!-- <div class="row">
          <div class="col-lg-12">
            <ul id="portfolio-flters">
              <li data-filter="*" class="filter-active">All</li>
              <li data-filter=".filter-app">App</li>
              <li data-filter=".filter-card">Card</li>
              <li data-filter=".filter-web">Web</li>
            </ul>
          </div>
        </div> -->
        <div class="row portfolio-container">
        @yield('content')
          
          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/web3.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/web3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Web 3</a></h4>
                <p>Web</p>
                <div class="row" style="padding: 15px 0px 0 0px; ">
                  <div class="col-md-8 pleft" >Dana Terkumpul</div>
                  <div class="col-md-4 pright">Sisa Hari</div>
                </div>
                <div class="row">
                  <div class="col-md-8 pleft" >Rp. 15.000.000</div>
                  <div class="col-md-4 pright">20</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/app2.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/app2.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">App 2</a></h4>
                <p>App</p>
                <div class="row" style="padding: 15px 0px 0 0px; ">
                  <div class="col-md-8 pleft" >Dana Terkumpul</div>
                  <div class="col-md-4 pright">Sisa Hari</div>
                </div>
                <div class="row">
                  <div class="col-md-8 pleft" >Rp. 15.000.000</div>
                  <div class="col-md-4 pright">20</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/card2.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/card2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Card 2</a></h4>
                <p>Card</p>
                <div class="row" style="padding: 15px 0px 0 0px; ">
                  <div class="col-md-8 pleft" >Dana Terkumpul</div>
                  <div class="col-md-4 pright">Sisa Hari</div>
                </div>
                <div class="row">
                  <div class="col-md-8 pleft" >Rp. 15.000.000</div>
                  <div class="col-md-4 pright">20</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/web2.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/web2.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 2" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Web 2</a></h4>
                <p>Web</p>
                <div class="row" style="padding: 15px 0px 0 0px; ">
                  <div class="col-md-8 pleft" >Dana Terkumpul</div>
                  <div class="col-md-4 pright">Sisa Hari</div>
                </div>
                <div class="row">
                  <div class="col-md-8 pleft" >Rp. 15.000.000</div>
                  <div class="col-md-4 pright">20</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-app wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/app3.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/app3.jpg" class="link-preview" data-lightbox="portfolio" data-title="App 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">App 3</a></h4>
                <p>App</p>
                <div class="row" style="padding: 15px 0px 0 0px; ">
                  <div class="col-md-8 pleft" >Dana Terkumpul</div>
                  <div class="col-md-4 pright">Sisa Hari</div>
                </div>
                <div class="row">
                  <div class="col-md-8 pleft" >Rp. 15.000.000</div>
                  <div class="col-md-4 pright">20</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/card1.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/card1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 1" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Card 1</a></h4>
                <p>Card</p>
                <div class="row" style="padding: 15px 0px 0 0px; ">
                  <div class="col-md-8 pleft" >Dana Terkumpul</div>
                  <div class="col-md-4 pright">Sisa Hari</div>
                </div>
                <div class="row">
                  <div class="col-md-8 pleft" >Rp. 15.000.000</div>
                  <div class="col-md-4 pright">20</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-card wow fadeInUp" data-wow-delay="0.1s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/card3.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/card3.jpg" class="link-preview" data-lightbox="portfolio" data-title="Card 3" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Card 3</a></h4>
                <p>Card</p>
                <div class="row" style="padding: 15px 0px 0 0px; ">
                  <div class="col-md-8 pleft" >Dana Terkumpul</div>
                  <div class="col-md-4 pright">Sisa Hari</div>
                </div>
                <div class="row">
                  <div class="col-md-8 pleft" >Rp. 15.000.000</div>
                  <div class="col-md-4 pright">20</div>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item filter-web wow fadeInUp" data-wow-delay="0.2s">
            <div class="portfolio-wrap">
              <figure>
                <img src="img/portfolio/web1.jpg" class="img-fluid" alt="">
                <a href="img/portfolio/web1.jpg" class="link-preview" data-lightbox="portfolio" data-title="Web 1" title="Preview"><i class="ion ion-eye"></i></a>
                <a href="#" class="link-details" title="More Details"><i class="ion ion-android-open"></i></a>
              </figure>

              <div class="portfolio-info">
                <h4><a href="#">Web 1</a></h4>
                <p>Web</p>
                <div class="row" style="padding: 15px 0px 0 0px; ">
                  <div class="col-md-8 pleft" >Dana Terkumpul</div>
                  <div class="col-md-4 pright">Sisa Hari</div>
                </div>
                <div class="row">
                  <div class="col-md-8 pleft" >Rp. 15.000.000</div>
                  <div class="col-md-4 pright">20</div>
                </div>
              </div>
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
        &copy; Copyright <strong>|2018</strong>. All Rights Reserved
      </div>
      <div class="credits">
        <!--
          All the links in the footer should remain intact.
          You can delete the links only if you purchased the pro version.
          Licensing information: https://bootstrapmade.com/license/
          Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=BizPage
        -->
        Best <a href="#">Bootstrap Templates</a> by BootstrapMade
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
