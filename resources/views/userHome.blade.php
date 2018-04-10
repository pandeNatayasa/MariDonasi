<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <link rel="shortcut icon" href="/laundry.png">
  <title>Jimbaran Laundry</title>
  
  <!-- Bootstrap CSS File -->
  <link href="css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="animate/animate.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="css/style1.css" rel="stylesheet">

</head>

<body>

  <header id="header">
    <div class="container">

      <div id="logo" class="pull-left">
        <a href="#home"><img src="" alt="" title="" /></img></a>
        <h1><a href="#home">Jimbaran Laundry</a></h1>
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li class="menu-active"><a href="#home">Home</a></li>
          <li><a href="#order">order</a></li>
          <li><a href="#services">Services</a></li>
          <li><a href="#about">About Us</a></li>
          <li><a href="#contact">Contact Us</a></li>
          <li><a href="/login-user">Sign In</a></li>
        </ul>
      </nav><!-- #nav-menu-container -->
    </div>
  </header><!-- #header -->

  <!--==========================
    Hero Section
  ============================-->
  <section id="home">
    <div class="hero-container">
      <h1>Welcome to Jimbaran Laundry</h1>
      <h2>We Are Ready to Service</h2>
      <a href="/login-user" class="btn-get-started">Sign In</a>
    </div>
  </section><!-- #hero -->

  <main id="main">

    <!--==========================
      Order Section
    ============================-->
    <section id="order">
      <div class="container">
        <div class="row about-container">

          <div class="col-lg-6 content order-lg-1 order-2">
              <h2 class="title">Order</h2>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-group">
              <label><i class="fa fa-address-card-o fa" aria-hidden="true"></i> Name</label>
              <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <label><i class="fa fa-home fa" aria-hidden="true"></i> Alamat </label>
              <textarea class="form-control" name="alamat" id="alamat" rows="3" placeholder="Your Address" data-rule="required" data-msg="Please enter a valid email" ></textarea>
              <div class="validation"></div>
            </div>
            <div class="form-group">
                <label><i class="fa fa-phone fa" aria-hidden="true"></i> Telp </label>
                <input type="text" name="telp" class="form-control" id="telp" placeholder="Your Telephone Number" data-rule="minlen:4" data-msg="Please enter your phone number" />
                <div class="validation"></div>
            </div>
            <div class="form-group">
              <label><i class="fa fa-sticky-note-o fa" aria-hidden="true"></i> Catatan</label>
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit" class="btn btn-success btn-block ">Order</button></div>
          </form>
          </div>
          <div class="col-lg-6 background order-lg-2 order-1 wow fadeInRight"></div>
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
    <section id="services">
      <div class="container wow fadeIn">
        <div class="section-header">
          <h3 class="section-title">Services</h3>
          <p class="section-description-p">Jimbaran Laundry</p>
        </div>
        <div class="row">
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href=""><img src="delivery.png"></img></a></div>
              <h4 class="title"><a href="">Antar Jemput</a></h4>
              <p class="description">Menerima Layanan Antar Jemput Sekitaran Bukit Jimbaran </p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><img src="/24-logo.png"></img></a></div>
              <h4 class="title"><a href="">24 Jam</a></h4>
              <p class="description">Menerima Layanan 24 Jam Non-stop Selama Hari Kerja</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href=""><img src="/shirt.png"></img></a></div>
              <h4 class="title"><a href="">Item's</a></h4>
              <p class="description">Menerima Layanan Laundry Per Items-nya</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.2s">
            <div class="box">
              <div class="icon"><a href=""><img src="/weight-tool.png"></img></a></div>
              <h4 class="title"><a href="">Kilo's</a></h4>
              <p class="description">Menerima Layanan Laundry Per Kilonya</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.4s">
            <div class="box">
              <div class="icon"><a href=""><img src="paket.png"></img></a></div>
              <h4 class="title"><a href="">Paket</a></h4>
              <p class="description">Menerima Layanan Express (24 jam) dan Ordinary (48 jam)</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-6 wow fadeInUp" data-wow-delay="0.6s">
            <div class="box">
              <div class="icon"><a href=""><img src="flower.png"></img></a></div>
              <h4 class="title"><a href="">Fresh</a></h4>
              <p class="description">Kami Menjamin 100% Pakaian Anda Menjadi Wangi dan Bersih</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #services -->

    {{-- <!--==========================
    Call To Action Section
    ============================-->
    <section id="call-to-action">
      <div class="container wow fadeIn">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action --> --}}

    <!--==========================
      About Us Section
    ============================-->
    <section id="about">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">About Us</h3>
          <p class="section-description">Jimbaran Laundry</p>
        </div>
        <div class="row">

            <div class="description">
                <p>
                 Jimbaran Laundry berdiri pada tahun 2018 ahdihaisndahcuafnihciuhsuhuish uhiushf af y8s audfh uisfuhuhbcnaksncanjdajc jabscuabjabjacjsbudhcuhu ushfucuhuehfu cushcu aubuabsjdasc h qhahuabub.
                </p>
    
              </div>


        </div>

      </div>
    </section><!-- #portfolio -->
 
    {{-- <!--==========================
      Team Section
    ============================-->
    <section id="team">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Team</h3>
          <p class="section-description">Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque</p>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-1.jpg" alt=""></div>
              <h4>Walter White</h4>
              <span>Chief Executive Officer</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-2.jpg" alt=""></div>
              <h4>Sarah Jhinson</h4>
              <span>Product Manager</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-3.jpg" alt=""></div>
              <h4>William Anderson</h4>
              <span>CTO</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-4.jpg" alt=""></div>
              <h4>Amanda Jepson</h4>
              <span>Accountant</span>
              <div class="social">
                <a href=""><i class="fa fa-twitter"></i></a>
                <a href=""><i class="fa fa-facebook"></i></a>
                <a href=""><i class="fa fa-google-plus"></i></a>
                <a href=""><i class="fa fa-linkedin"></i></a>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #team --> --}}

    <!--==========================
      Contact Section
    ============================-->
    <section id="contact">
      <div class="container wow fadeInUp">
        <div class="section-header">
          <h3 class="section-title">Contact</h3>
          
            <div class="row justify-content-center">
    
              <div class="col-lg-3 col-md-4">
    
                <div class="info">
                  <div>
                    <i class="fa fa-map-marker"></i>
                    <p>Jalan Bingin Sari no 2<br>Bukit Jimbaran</p>
                  </div>
    
                  <div>
                    <i class="fa fa-envelope"></i>
                    <p>laundryjimbaran@gmail.com</p>
                  </div>
    
                  <div>
                    <i class="fa fa-phone"></i>
                    <p>+62 859 3127 0707</p>
                  </div>
                </div>
    
                <div class="social-links">
                  <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
                  <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
                  <a href="https://www.instagram.com/bayuguna11/" class="instagram"><i class="fa fa-instagram"></i></a>
                  <a href="#" class="google-plus"><i class="fa fa-google-plus"></i></a>
                  <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
                </div>
    
              </div>
    
            </div>
    
          </div>
        </div>
    </section><!-- #contact -->

  </main>

  <!--==========================
    Footer
  ============================-->
  <footer id="footer">
    <div class="footer-top">
      <div class="container">

      </div>
    </div>

    <div class="container">
      <div class="copyright">
       <h5>Jimbaran Laundry 2018 </h5>
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="jquery/jquery.min.js"></script>
  <script src="jquery/jquery-migrate.min.js"></script>
  <script src="js/bootstrap.bundle.min.js"></script>
  <script src="easing/easing.min.js"></script>
  <script src="wow/wow.min.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>

  <script src="waypoints/waypoints.min.js"></script>
  <script src="counterup/counterup.min.js"></script>
  <script src="superfish/hoverIntent.js"></script>
  <script src="superfish/superfish.min.js"></script>

  <!-- Contact Form JavaScript File -->
  <script src="contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="js/main1.js"></script>

</body>
</html>
