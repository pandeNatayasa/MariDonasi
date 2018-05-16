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
   <script src="{{asset('/lib/jquery/jquery-3.3.1.min.js')}}"></script>
  <!-- <link href="{{asset('css/styleProfil.css')}}" rel="stylesheet"> -->
  
  <script type="text/javascript">
    // $(document).ready(function(){
    function formatRupiah(angka)
    {
        var number_string = angka.toString();
        // number_string = number_string.replace(".", "");
        // console.log(number_string);
    
        var i = 0;
        //fungsi insert
        insert = function(main_string, ins_string, pos) {
          if(typeof(pos) == "undefined") {
            pos = 0;
          }
           if(typeof(ins_string) == "undefined") {
            ins_string = '';
          }
          return main_string.slice(0, pos) + ins_string + main_string.slice(pos);
        }

        if(number_string.length >= 4 ){
          var i = 0;
          var len = number_string.length;
          while(i < len){
            
              if(i != 0 && i == 3 ){
                number_string = insert(number_string, '.', number_string.length - i);
                len = len + 1;
              } 

              if(i != 0 && i == 7){
                  number_string = insert(number_string, '.', number_string.length - i);
                  // len = number_string.length;
              } 
              if(i != 0 && i == 11 ){
                  number_string = insert(number_string, '.', number_string.length - i);
                  // len = number_string.length;
              } 
              
              if(i != 0 && i == 15){
                number_string = insert(number_string, '.', number_string.length - i);                   
              } 
              
            i = i + 1;    
            // console.log('i');
            // console.log(i);

            // console.log(len);
          }
          //len = 0 ;
          
          //document.getElementById("targetDonasi2").value=number_string;
          console.log(number_string);
          // return number_string;
          document.getElementById("targetDonasi").value=number_string;
          
          //number_string = number_string.replace(".", "");
          
        }else{
          console.log(number_string);
          //number_string = number_string.replace(".", ""); 
          document.getElementById("targetDonasi").value=number_string;
        }
        //number_string = number_string.replace(".", ""); 
        document.getElementById("targetDonasi").value=number_string;
        console.log(number_string);
        // var hasil document.getElementById("hasilTargetDonasi");
        // hasil.innerHTML=number_string;
    }
  // });
  </script>
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
  <div class="row" >
    <div class="col-md-3">
      
    </div>
    <div class="col-md-6">
      <header class="section-header wow fadeInUp" data-wow-duration="500ms" data-wow-delay="250ms" style="margin-top: 50px">
        <h3 class="section-title" style="padding-bottom: 0px; margin-bottom: 0px;">Donasi</h3>
      </header>
      <div class="box wow fadeInUp" data-wow-duration="700ms" data-wow-delay="250ms">
         <form action="{{route('galangDana.store')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
          {{csrf_field()}}
         <div class="box-body" style=" margin-bottom: 150px;">
            <div class="box-body-col" style="padding-bottom: 50px;">
               <h4>Donasi Uang</h4>
               <label class="col-md-12">Donasi minimal Rp 10.000 dengan kelipatan ribuan (contoh: 15.000, 50.000)</label>
               <div class="form-group">
                <div class="row">
                  <label class="control-label col-md-1" ></label>
                  <label class="control-label col-md-1 " >Rp. </label>
                 <div class="col-md-8">
                     <input id="targetDonasi2" class="form-control" placeholder="Target donasi dari campaign ini" name="targetDonasi2" required="required" type="text" onkeyup="formatRupiah(this.value)" value="" maxlength="15">
                     <input type="hidden" name="id_campaign" value="{{$id}}">
                 </div>
                </div>
               </div>
               <div class="form-group" style="padding-top: 40px; ">
                <div class="row">
                  <label class="control-label col-md-3" >Donasi Anda</label>
                  <label class="control-label col-md-1 " >Rp. </label>
                 <div class="col-md-8">
                     <input id="targetDonasi" class="form-control" placeholder="Donasi Anda" name="targetDonasi" required="required" type="text" disabled  value="">
                 </div>
                </div>
               </div>
               <!-- <div class="col-md-12"> -->
                 <!-- <input style="float: right;" type="submit" class="btn btn-success" name="donasi" value="Donasi"> -->
               <!-- </div> -->
               
            </div>
            <div class="box-body-col" style="padding-bottom: 50px;">
               <h4>Metode Pembayaran</h4>
               <label class="col-md-12" style="padding-left: 0px;" >Pilih Metode Pembayaran yang akan anda lakukan</label>

               <div class="form-group box-body-col">
                <div class="row">
                  <div class="col-md-12 radio-inline"> <input required="pilih salah satu metode pembayaran" type="radio" name="metodePembayaran" id="opsi2" value="wallet"><strong style="font-size: 22px;">  Wallet/Dompet Kebaikan</strong>  </div>
                </div>
               </div>
               <div class="form-group box-body-col" >
                <div class="row">
                  <div class="col-md-12 radio-inline"> <input type="radio" name="metodePembayaran" id="opsi1" value="transfer" ><strong style="font-size: 22px;">  Transfer </strong></div> 
                </div>
                <div class="row" style="padding-top: 30px;">
                  <label class="control-label col-md-5" style="padding-left: 30px; padding-right: 0px;">Transfer ke No. Rek :</label>
                  <div class="col-md-7">
                      <input id="targetDonasi" class="form-control" name="no_rek" type="text" disabled  value="6354376452462">
                  </div>
                  
                        
                </div>
               </div>
               <!-- <div class="col-md-12"> -->
                 <input style="float: right;" type="submit" class="btn btn-success" name="donasi" value="Donasi">
               <!-- </div> -->
               
            </div>
          </div>
            
         </form>
      </div>
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
