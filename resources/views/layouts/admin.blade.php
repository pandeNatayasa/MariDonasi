<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="">
  <meta name="author" content="">
  <title>MariDonasi-admin</title>

  <!-- Favicons -->
  <link href="{{asset('img/favicon.png')}}" rel="icon">
  <link href="{{asset('img/apple-touch-icon.png')}}" rel="apple-touch-icon"

  <!-- Bootstrap core CSS-->
  <link href="{{asset('lib/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet" id="bootstrap-css">
  <!-- Custom fonts for this template-->
  <link href="{{asset('lib/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

  <!-- Custom styles for this template-->
  <link href="css/sb-admin.css" rel="stylesheet">

  <!-- Page level plugin CSS-->
   <link rel="stylesheet" type="text/css" href="{{asset('css/datatables.min.css')}}">
  
</head>

<body class="fixed-nav sticky-footer bg-dark" id="page-top">
    @yield('content')
      <!-- Bootstrap core JavaScript-->
    <script src="{{asset('lib/jquery/jquery-3.3.1.min.js')}}"></script>
    <script src="{{asset('lib/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
    <!-- Page level plugin JavaScript-->
    <script src="vendor/datatables/jquery.dataTables.js"></script>
    <script src="vendor/datatables/dataTables.bootstrap4.js"></script>
    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin.min.js"></script>
    <!-- Custom scripts for this page-->
    <script src="js/sb-admin-datatables.min.js"></script>
    <!-- Data Tables -->
    <script type="text/javascript" charset="utf8" src="{{asset('js/datatables.min.js')}}"></script>

    <script type="text/javascript">
    $(document).ready( function () {
      $('#data').DataTable();
    } );

  </script>
  </div>
</body>

</html>
