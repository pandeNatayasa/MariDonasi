@extends('layouts.profilleUser')

@section('content')
     <!--==========================
      Portfolio Section
    ============================-->
    <section id="makecampaign"  >
      <div class="container">

        <header class="section-header" style="margin-top: 10px">
          <h3 class="section-title">Your Acount</h3>
        </header>

        <div class="row portfolio-container">
          <div class="col-md-12 portfolio-item wow fadeInUp" data-wow-duration="1000ms" data-wow-delay="300ms">
                  
                  <div class="box" style="margin-top: 10px;">
                     <form action="{{route('member.store')}}" class="form-horizontal" enctype="multipart/form-data" method="post" accept-charset="utf-8">
                     {{csrf_field()}}
             
                     <div class="box-body">
                        <div class="box-body-col">
                           <h4>Edit Your Acount</h4>
                           <div class="form-group">
                              <div class="row">
                                <label class="control-label col-md-3">Nama</label>
                                <div class="col-md-9">
                                  <input class="form-control" name="nama" required="required" type="text" value="{{ Auth::user()->name }}">
                                </div>
                              </div>         
                            </div>
                            <div class="form-group">
                              <div class="row">
                                <label class="control-label col-md-3">Email</label>
                                <div class="col-md-9">
                                  <input class="form-control" name="email" required="required" type="text" value="{{ Auth::user()->email }}">
                                </div>
                              </div>        
                            </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">No Telepun</label>
                              <div class="col-md-9">
                                 <input class="form-control" placeholder="nomor telepon anda" name="noTelpUser" required="required" type="text" value="">
                              </div>
                            </div>
                             
                           </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Lokasi</label>
                             <div class="col-md-9">
                                 <select name="lokasiUser" class="form-control" required="required">
                                    <option value="" disabled selected>Pilih Lokasi Anda</option>
                                    <option value="kabBadungBali">Kab. Badung, Prov. Bali</option>
                                    <option value="kabBangliBali">Kab. Bangli, Prov. Bali</option> 
                                    <option value="kabDenpasarBali">Kota Denpasar, Prov. Bali</option>
                                    <option value="kabGianyarBali">Kab Gianyar, Prov. Bali</option>          
                                  </select>
                             </div>
                            </div>
                           </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Biography</label>
                             <div class="col-md-9">
                                 <textarea name="bioUser" class="form-control" required="required" placeholder="Biography anda" rows="6"></textarea>
                             </div>
                            </div>
                           </div>
                           
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Profil Picture</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="Your last profil picture" name="profilPic" required="required" type="file" value="">
                             </div>
                            </div>
                           </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">KTP Picture</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="Your kpt pic" name="ktpPic" required="required" type="file" value="">
                             </div>
                            </div>
                           </div>
                           <div class="form-group">
                            <div class="row">
                              <label class="control-label col-md-3">Verif Picture</label>
                             <div class="col-md-9">
                                 <input class="form-control" placeholder="Your verif pic" name="verifPic" required="required" type="file" value="">
                             </div>
                            </div>
                           </div>
                           <div class="row">
                              <div class="col-md-12">
                                <input type="submit" name="submit" value="Save & Next" class="btn btn-primary" style="margin-bottom: 20px; margin-top: 20px; padding: 10px 20px 10px 20px; float: right;">
                              </div>
                           </div>
                        </div>
                      </div>
                     </form>
                  </div>
               </div>
        </div>
      </div>
    </section><!-- #portfolio -->
@endsection