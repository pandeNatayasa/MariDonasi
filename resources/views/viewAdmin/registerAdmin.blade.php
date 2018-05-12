@extends('layouts.admin')

@section('register')
  active
@endsection

@section('content')
  
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="#">Dashboard</a>
        </li>
        <li class="breadcrumb-item active">Register New Admin</li>
      </ol>
      <!-- Example DataTables Card-->
      
    </div>

    <!-- isi data -->
    <div class="card mb-3" style="margin: 30px;">
        <div class="card-header">
          <i class="fa fa-edit"></i>  Register New admin</div>
        <div class="card-body">
          <form role="form" action="{{ route('admin.register.post') }}" method="POST" class="register-form">
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

    <!-- /.container-fluid-->
    <!-- /.content-wrapper-->
    <footer class="sticky-footer">
      <div class="container">
        <div class="text-center">
          <small>Copyright © Your Website 2018</small>
        </div>
      </div>
    </footer>
    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
      <i class="fa fa-angle-up"></i>
    </a>
    
@endsection