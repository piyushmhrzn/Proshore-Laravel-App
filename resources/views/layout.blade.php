<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{ asset('css/OverlayScrollbars.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('css/adminlte.css') }}">
</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <!-- 
      <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{ asset('img/AdminLTELogo.png') }}" alt="AdminLTELogo" height="60" width="60">
      </div> 
    -->

    <!-- Navbar -->
      @include('inc.navbar')
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
      @include('inc.sidebar')
    <!-- /.main sidebar container -->

    <!-- Content Wrapper. Contains Page Content -->
    <div class="content-wrapper">

        <!-- Session Message -->
        <div class="row">
            <div class="col-12">
                @include('inc.message')
            </div>
        </div>                
        <!-- End of Session Message -->

        <!-- Begin Page Content -->
          @yield('content')
        <!-- End Page Content -->
      
    </div>
    <!-- /.Content-Wrapper. End of Page Content -->

    <!-- Main Footer -->
    <footer class="main-footer">
      <strong>Copyright &copy; 2023 <a href="https://proshore.eu/">Proshore Ltd</a>.</strong>
      <div class="float-right d-none d-sm-inline-block">
        <b>{{ date("l, jS F") }}</b> 
      </div>
    </footer>
  </div>
  <!-- ./wrapper -->

  <!-- REQUIRED SCRIPTS -->
  <!-- jQuery -->
  <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
  <!-- Bootstrap -->
  <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <!-- overlayScrollbars -->
  <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
  <!-- AdminLTE App -->
  <script src="{{ asset('js/adminlte.js') }}"></script>

  <!-- PAGE PLUGINS -->
  <!-- jQuery Mapael -->
  <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewheel.js') }}"></script>
  <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
  <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
  <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
  <!-- ChartJS -->
  <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>  

</body>
</html>
