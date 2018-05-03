@extends('layouts.authAdmin')

@section('content')
  <!--==========================
    Intro Section
  ============================-->
  <section id="introor">
    <div class="introor-container">
      <div id="introrCarousel">

        <ol class="carousel-indicators"></ol>

        <div class="carousel-inner" role="listbox"> 
          <div class="carousel-item active">
            <div class="carousel-background"><img src="{{asset('img/intro-carousel/4.jpg')}}" alt=""></div>
            <div class="carousel-container">
              <div class="carousel-content">
                
                  <div class="row">
                    <div class="col-sm-12 col-sm-offset-2" style="margin-top: 20px;">
                      <center>
                        <h3>Reset your password, Admin</h3>
                        <p>Enter your email address :</p>
                      </center>
                      <div >
                        <div class="panel-body" style="margin-top: 40px;">
                          @if (session('status'))
                            <div class="row">
                              <div class="col-lg-4"></div>
                              <div class="col-lg-5 alert alert-success">
                                  {{ session('status') }}
                              </div>
                              <div class="col-lg-3"></div>
                            </div>
                            
                          @endif

                          <form class="form-horizontal" method="POST" action="{{ route('admin.password.email') }}">
                            {{ csrf_field() }}

                            <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                              <div class="row">
                                <div class="col-lg-4"></div>
                                <label for="email" class="col-md-1 control-label">E-Mail Address</label>

                                <div class="col-md-4">
                                  <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                  @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                  @endif
                                </div>
                              </div>
                              
                            </div>

                            <div class="form-group">
                              <div class="row">
                                <div class="col-md-4"></div>
                                <div class="col-md-0 " style="float: left;">
                                  <button type="submit" class="btn btn-primary">
                                    Send Password Reset Link
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
    </div>
    <div></div>
  </section><!-- #intro -->
@endsection