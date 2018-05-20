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

<!-- <script src="{{asset('lib/jquery/jquery.maskMoney.min.js')}}"></script> -->
  <script src="{{asset('lib/bootstrap/js/bootstrap.min.js')}}"></script>
  <script src="{{asset('/lib/jquery/jquery-3.3.1.min.js')}}"></script>

  <!-- Main Stylesheet File -->
  <link href="{{asset('css/style.css')}}" rel="stylesheet">
  <link href="{{asset('css/styleform.css')}}" rel="stylesheet">

  <!-- Import data tables -->
  <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}">

   <script type="text/javascript" async> 
    // menampilkan data input di modal
    function loadComment(){
        var url = '/campaign/get-barang';
        $.ajax({
          type:'get',
          url:url,
          success: function(data){
            // console.log(data)
            // $(".table").append(data);
            $(".table").html(data);
          },
          error: function(){
            alert("error collecting comment");
          }
        });
      }
  </script>
  <script type="text/javascript"> 
    // menampilkan data input di modal



    $(document).ready(function(){

      

      // var i = 1;
      // var barangs=[];
      // $("#tambahDataBarang").on('click',function(){
      //   var namaBarang=document.getElementById("namaBarangAdd").value;
      //   var jumlahBarang=document.getElementById("jumlahBarangAdd").value;
      //   var satuanBarang=document.getElementById("satuanBarangAdd").value;
      //   let temp={
      //     'nama':namaBarang,
      //     'jumlah':jumlahBarang,
      //     'satuan':satuanBarang
      //   }
      //   barangs.push(temp)

      //   $(".odd").html("");
      //   $(".dataBaru").append("<tr><td>" + i + " </td><td> " + namaBarang + " </td><td> " + jumlahBarang + " </td><td> " + satuanBarang + " </td><td>Edit</td></tr>");
      //   i++;
      // });
      // $("#tambahData").click(function(){
      //   //console.log(barangs)
      //   // axios.post('/campaignUser/store', barangs);
      //   document.getElementById("barang").value=barangs;
      // })
    });
    //<button id="editBarang" class="btn btn-primary " data-toggle="modal" data-target="#modalEditData"><i class="fa fa-edit"></i></button><button class="btn btn-danger "><i class="fa fa-trash"></i></button>
//    function()
// {
//    var hasil;
//    hasil = 1+3+5+7+9;
//    document.getElementById("tempat_hasil").innerHTML=hasil;
// }

      /* Fungsi Konversi ke Rupiah */
      // window.onload = 
      function formatRupiah(angka)
      {
          var number_string = angka.toString();
          number_string = number_string.replace(".", "");
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
              console.log('i');
              console.log(i);

              console.log(len);
            }
            len = 0 ;
            
            document.getElementById("targetDonasi2").value=number_string;
            // console.log(number_string);
            // return number_string;
            
            number_string = number_string.replace(".", "");
            
          }else{
            number_string = number_string.replace(".", ""); 
            document.getElementById("targetDonasi2").value=number_string;
          }
          number_string = number_string.replace(".", ""); 
          document.getElementById("targetDonasi").value=number_string;
          
          // var hasil document.getElementById("hasilTargetDonasi");
          // hasil.innerHTML=number_string;
      }    
           
  </script>
</head>

<body>

  <!--==========================
    Header
  ============================-->
  <header id="header">
    <div class="container-fluid">

      <div id="logo" class="pull-left">
        <h1><a href="@yield('home')" class="scrollto">MariDonasi</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#intro"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>

      <nav id="nav-menu-container">
        <ul class="nav-menu">
          <li><a href="@yield('home')">Home</a></li>
          <li>
            <a href="#" data-toggle="dropdown" role="button" aria-expanded="false" aria-haspopup="true">
                @yield('nama_pengguna')  <span class="caret"></span>
            </a>

            <ul class="dropdown-menu">
                <li>
                  <a href="@yield('route_pengguna') ">@yield('nama_pengguna')</a>
                </li>
                <li>
                  <a href="@yield('route_logout') " >
                        Logout
                  </a>
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
                     <form action="@yield('route_make_campaign')" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                      {{csrf_field()}}
                     <div class="box-body" style=" margin-bottom: 150px;">
                        <div class="box-body-col">
                           <h4>Informasi Campaign</h4>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Judul Campaign</label>
                              <div class="col-md-9">
                                 <input class="form-control" placeholder="judul singkat yang menjelaskan tujuan kamu menggalang dana (0/50)" name="campaignName" required="required" type="text" value="" id="judulCampaign">
                              </div>
                            </div>
                             
                           </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-2">Target Donasi</label>
                              <label class="control-label col-md-1 " style=" padding-left: 40px">Rp. </label>
                             <div class="col-md-9">
                                 <input id="targetDonasi2" class="form-control" placeholder="Target donasi dari campaign ini" name="targetDonasi2" required="required" type="text" onkeyup="formatRupiah(this.value)" value="">
                                 <input id="targetDonasi" class="form-control" placeholder="Target donasi dari campaign ini" name="targetDonasi" required="required" type="hidden"  value="">
                                 <!-- onkeypress="formatRupiah(this.value)" onkeyup="formatRupiah(this.value)" onkeypress="return onlyNumbers();" -->
                             </div>
                             <!-- <div class="col-md-3 hasilTargetDonasi">
                             </div> -->
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
                                 <input class="form-control" placeholder="" name="deadlineCampaign" required="required" type="date" value="">
                             </div>
                            </div>
                           </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Kategori Campaign</label>
                              <div class="col-md-9">
                                  <select name="kategoriCampaign" class="form-control" required="required">
                                  <option value="" disabled selected>Pilih Kategori Campaign</option>
                                  <option value="Beasiswa & Pendidikan">Beasiswa & Pendidikan</option>
                                  <option value="Bencana Alam">Bencana Alam</option> 
                                  <option value="Lingkungan">Lingkungan</option>
                                  <option value="Kemanusiaan">Kemanusiaan</option>
                                  <option value="Menolong Hewan">Menolong Hewan</option>
                                  <option value="Panti Asuhan">Panti Asuhan</option>
                                  <option value="Kategori Lain">Kategori Lain</option>               
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
                                  <option value="Prov. Bali Kab. Bangli">Prov. Bali Kab. Bangli</option>
                                  <option value="Prov. Bali kab. Badung">Prov. Bali kab. Badung</option> 
                                  <option value="Prov. Bali kab. Gianyar">Prov. Bali kab. Gianyar</option>
                                  <option value="Prov. Bali kota Denparas">Prov. Bali kota Denparas</option>          
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
                                    <input name="imageCover" type="file" class="form-control" accept="image/*">
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
                           <div class="form-group">
                              <div class="row">
                                <label class="control-label col-md-3">Pic Verif Campaign</label>
                                <div class="col-md-9">
                                    <input name="pic_verif" type="file" class="form-control" accept="image/*">
                                    <small>Gambar dalam bentuk file .jpg</small> 
                                </div>
                              </div>
                            </div>
                           
                        </div>

                        <div class="box-body-col" style="margin-bottom: 60px;" >
                          <h4>Input Target Donasi Barang</h4>
                          <!-- " onclick="addForm()"-->
                          <a id="tambahData"  data-toggle="modal"  name="tambahData" data-target="#modal-form"  class="btn btn-primary" style="margin-bottom: 20px;">Tambah Data </a>
                          <div class="card-header">
                            <i class="fa fa-table"></i> Data Target Donasi Barang</div>
                            <div class="card-body">
                               <div class="table-responsive" style="margin-top: 10px;" id="tableBarang">
                                <table class="table table-bordered table-striped table-hover display" id="table_target_donasi">
                                  <!-- <thead style="background-color: black;">
                                    <tr>
                                      <th style="color: #fff;">No</th>
                                      <th style="color: #fff;">Nama Barang</th>
                                      <th style="color: #fff;">Target Donasi Barang</th>
                                      <th style="color: #fff;">Satuan</th>
                                      <th style="color: #fff;">Status</th>
                                    </tr>
                                  </thead>
                                  <tbody class="dataBaru" id="dataBaru">

                                  </tbody> -->
                                </table>
                              </div>
                            </div>
                          <div class="col-md-12" style="padding-top: 50px;">
                            <input type="submit" id="submit" name="submit" value="Save & Next" class="btn btn-primary" style="margin-bottom: 600px; margin-top: 40px; float: right; padding-left: 30px; padding-right: 30px; "> 
                          </div>
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
        Best <a href="https://bootstrapmade.com/">Bootstrap Templates</a> by BootstrapMade
      </div>
    </div>
  </footer><!-- #footer -->

  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
<!-- Modal Tambah Data-->
    <div class="modal fade" id="modal-form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="modalTambahDataLabel">Tambah Data Donasi Barang</h5>
            <button class="close" type="button" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">×</span>
            </button>
          </div>
          <!-- method="post" action="{{route('campaign_user_barang.store')}}" -->
          <!-- <form method="POST" action="{{route('campaign_user_barang.store')}}" class="form-horizontal" data-toggle="validator">
          {{csrf_field()}} -->
          <!--  {{method_field('POST')}}  -->
            <div class="modal-body">
              <div class="row">
                <input type="hidden" name="token" id="token" value="{{csrf_token()}}" >
                <label class="control-label col-md-3">Nama Barang</label>
                <div class="col-md-9">
                  <input class="form-control" placeholder="Nama Barang yang diminta"  required="required" type="text" value="" id="nama_barang">
                  
                </div>
              </div>
              <div class="row">
                <label class="control-label col-md-3">Jumlah Barang</label>
                <div class="col-md-9">
                  <input class="form-control" placeholder="Jumlah Barang yang diminta" required="required" type="text" value="" id="target_jumlah">
                </div>
              </div>
              <div class="row">
                <label class="control-label col-md-3">Satuan</label>
                <div class="col-md-9">
                  <select id="satuan" class="form-control" required="required" id="satuan">
                    <option value="" disabled selected>Pilih Satuan Barang</option>
                    <option value="Lusin">Lusin</option>
                    <option value="Meter">Meter</option> 
                    <option value="Dus">Dus</option>
                    <option value="Buah">Buah</option>          
                  </select>
                </div>
              </div>
            </div>
            <div class="modal-footer">
              <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
              <input class="btn btn-primary btn-save" type="submit" data-dismiss="modal" id="tambahDataBarang" value="Tambah">
            </div>
          <!-- /form> -->
        </div>
      </div>
    </div>

  <!-- JavaScript Libraries -->
  <script src="{{asset('/lib/jquery/jquery-3.3.1.min.js')}}"></script>
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

  <!-- Data Tables -->
  <script type="text/javascript" charset="utf8" src="{{asset('js/datatables.min.js')}}"></script>

  <!-- Template Main Javascript File -->
  <script src="{{asset('js/main.js')}}"></script>

  <script type="text/javascript">
    // $('#table_target_donasi').DataTable();

    $("#tambahDataBarang").click(function(){
      //var id_campaign_user = $("#id_campaign_user").val();
      var nama_barang = $("#nama_barang").val();
      var target_jumlah = $("#target_jumlah").val();
      var satuan = $("#satuan").val();
      // var token = '{{csrf_token()}}';

      // console.log(nama_barang);

      $.ajax({
        type: "POST",
        // data: "id_campaign_user=" + id_campaign_user + "&nama_barang" + nama_barang + "&target_jumlah" + target_jumlah + "&satuan" + satuan + "&_token" + token,
        data: { nama_barang: nama_barang, target_jumlah: target_jumlah, satuan: satuan , _token: '{{csrf_token()}}' },
        url: "<?php echo url('/campaign_user_barang/store-barang')?>",
        success:function(data){
          ///console.log(data);
          // $('#tableBarang').load(location.href + ' #tableBarang')
          loadComment();
        }
      });


      //$('#modal-form form')[0].reset();

    });

    function editDataBarang(){
      var id_donasi_barang = $("#id_donasi_barang").val();
      var nama_barang = $("#namaBarangEdit").val();
      var target_jumlah = $("#targetJumlahEdit").val();
      var satuan = $("#satuanEdit").val();
      // var token = '{{csrf_token()}}';

      //console.log(nama_barang);
//<?php //echo url('/campaign/edit-barang')?>
// data: "id_campaign_user=" + id_campaign_user + "&nama_barang" + nama_barang + "&target_jumlah" + target_jumlah + "&satuan" + satuan + "&_token" + token,
      $.ajax({
        type: 'POST',
        
        data: { id_donasi_barang: id_donasi_barang, nama_barang: nama_barang, target_jumlah: target_jumlah, satuan: satuan , _token: '{{csrf_token()}}' },
        url: "{{route('ajaxEdit')}}",
        
        success:function(data){
          console.log(data);
          // $('#tableBarang').load(location.href + ' #tableBarang')
          //loadComment();
        }
      });
      //$('#modal-form form')[0].reset();
    };
    
    // $("#save-change").click(function(){
    //   var id_donasi_barang = $("#id_donasi_barang").val();
    //   var nama_barang = $("#namaBarangEdit").val();
    //   var target_jumlah = $("#targetJumlahEdit").val();
    //   var satuan = $("#satuanEdit").val();
      

    //   $.ajax({
    //     type: "POST",
        
    //     data: { id_donasi_barang: id_donasi_barang, nama_barang: nama_barang, target_jumlah: target_jumlah, satuan: satuan , _token: '{{csrf_token()}}' },
    //     url: "<?php //echo url('/campaign/edit-barang')?>",
    //     success:function(data){
          
    //       loadComment();
    //     }
    //   });
    // {
    //   processing : true,
    //   serverSide : true,
    //   ajax: [
    //     {data: 'id',name : 'id'},
    //     {data: 'id_campaign_user',name:'id_campaign_user'},
    //     {data: 'nama_barang',name:'nama_barang'},
    //     {data: 'target_jumlah',name:'target_jumlah'},
    //     {data: 'satuan',name:'satuan'},
    //     {data: 'action', name:'action', orderable:false,searchable:false}
    //   ]

    // });

    // function addForm() {
    //   save_method = "add";
    //   $('input[name=_method]').val('POST');
    //   $('#modal-form').modal('show');
    //   $('#modal-form form')[0].reset();
    // }   

    // $(function(){
    //   $('#modal-form form').validator().on('submit', function(e){
    //     if(!e.isDefaultPrevented()){
    //       var id = $('#id').val();
    //       // if(save_method == 'add') url = "{{url('campaign_user_barang/store')}}";
    //       // else url = "{{url('campaign_user_barang/create') . '/'}}" + id;

    //       var url = '/campaign_user_barang/store';
    //       $.ajax({
    //         url : url,
    //         type : "POST",
    //         data : $('#modal-form form').serialize(),
    //         success : function($data) {
    //           $('modal-form').modal('hide');
    //         },
    //         eror : function(){
    //           alert('Oops something eror!');
    //         }
    //       });
    //       return false;
    //     }
    //   });
    // });

  </script>

</body>
</html>
