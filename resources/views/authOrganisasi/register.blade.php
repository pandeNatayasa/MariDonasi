@extends('layouts.authOrganisasiRegister')

@section('content')
  <!--==========================
    Intro Section
  ============================-->
  <section id="introor">
    <div class="introor-container">
      <div id="introorCarousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox"> 
          <div class="carousel-item active">
            <div class="carousel-background"><img src="{{asset('img/intro-carousel/4.jpg')}}" alt=""></div>
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
                        <form role="form" action="{{ route('organisasi.register.post') }}" method="POST" class="register-form">
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
@endsection