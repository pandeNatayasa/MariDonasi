@extends('layouts.authOrganisasi')

@section('content')
  <!--==========================
    Intro Section
  ============================-->
  <section id="introo">
    <div class="introo-container">
      <div id="introCarousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox"> 
          <div class="carousel-item active">
            <div class="carousel-background"><img src="{{asset('img/intro-carousel/4.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                
                  <div class="row">
                    <div class="col-sm-11 col-sm-offset-2">
                      <center>
                        <h3>Login to your acount, Organisasi</h3>
                        <p>Enter your email and password to log on:</p>
                      </center>
                      <div >
                        <form role="form" action="{{ route('organisasi.login.submit') }}" method="POST" class="login-form">
                          {{ csrf_field()}}
                          
                          <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <center>
                              <label class="sr-only" for="email">E-mail Address</label>
                              <input type="email" placeholder="Email..." name="email" class=" form-control" id="email" value="{{ old('email') }}" required autofocus>
                            </center>
                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong style="color: red">Email anda tidak sesuai</strong>
                                    </span>
                                @endif
                          </div>
                          <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <center>
                              <label class="sr-only" for="password">Password</label>
                              <input type="password" name="password" placeholder="Password..." class="form-control" id="password">
                            </center>
                              @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong style="color: red">{{ $errors->first('password') }}</strong>
                                    </span>
                              @endif
                          </div>
                          
                          <div class="form-group">
                            <div class="col-md-8 col-md-offset-0">
                                <div class="checkbox">
                                    <label class="remember">
                                        <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
                                    </label>
                                </div>
                            </div>
                          </div>
                          <button type="submit" class="btn btn-lg btn-primary btn-block btn-signin">Sign in!</button>
                        <center>
                        <div class="forgot-password-turun">
                          <a href="{{ route('admin.password.request') }}" class="forgot-password"> 
                            Forgot the password?
                          </a>
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