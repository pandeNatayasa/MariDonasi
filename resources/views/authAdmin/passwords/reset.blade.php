@extends('layouts.authAdmin')

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
                    <div class="col-sm-11 col-sm-offset-2">
                      <center>
                        <h3>Reset your password</h3>
                        <p>Enter your email address and new password :</p>
                      </center>
                      <div >
                        <form class="form-horizontal" method="POST" action="{{ route('admin.password.request') }}">
                        {{ csrf_field() }}

                        <input type="hidden" name="token" value="{{ $token }}">
                        <div class="row">
                          <div class="col-sm-3 col-sm-offset-2"></div>
                          <div class="col-sm-6 col-sm-offset-2">
                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="email" class="col-md-12 control-label">E-Mail Address</label>
                                </div>
                                <div class="col-md-8">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ $email or old('email') }}" required autofocus>

                                  @if ($errors->has('email'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('email') }}</strong>
                                      </span>
                                  @endif
                                </div>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-sm-3 col-sm-offset-2"></div>
                          <div class="col-sm-6 col-sm-offset-2">
                            <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                              <div class="row">
                                <div class="col-sm-4">
                                  <label for="password" class="col-md-12 control-label">Password</label>
                                </div>
                                <div class="col-md-8">
                                  <input id="password" type="password" class="form-control" name="password" required>

                                  @if ($errors->has('password'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password') }}</strong>
                                      </span>
                                  @endif
                                </div>
                                
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        
                        <div class="row">
                          <div class="col-sm-3 col-sm-offset-2"></div>
                          <div class="col-sm-6 col-sm-offset-2">
                            <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <div class="row">
                              <div class="col-sm-4">
                                <label for="password-confirm" class="col-md-12 control-label">Confirm Password</label>
                              </div>
                              <div class="col-md-8">
                                  <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>

                                  @if ($errors->has('password_confirmation'))
                                      <span class="help-block">
                                          <strong>{{ $errors->first('password_confirmation') }}</strong>
                                      </span>
                                  @endif
                              </div>
                            </div>
                              
                              
                          </div>
                          </div>
                        </div>
                        
                        <div class="form-group">
                          <div class="row">
                            <div class="col-sm-3"></div>
                            <div class="col-sm-6">
                              <button type="submit" style="float: right; margin-top: 20px;" class="btn btn-primary">
                                Reset Password
                              </button>
                            </div>
                          </div> 
                        </div>
                             
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