<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>@yield('title')</title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/adminlte.min.css">
  <!-- Datetimepicker style -->
  <link rel="stylesheet" href="{{asset('backend')}}/dist/css/datetimepicker.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="{{asset('backend')}}/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css')}}">
  <link rel="stylesheet" href="{{ asset('backend/plugins/datatables-responsive/css/responsive.bootstrap4.min.css')}}">
  <!-- FAVICON -->
  <link rel="icon" href="{{ asset('backend/img/favicon.ico')}}">
  <!-- PENJADWALAN -->
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.2.7/fullcalendar.min.css"/>
</head>
<body class="hold-transition sidebar-mini layout-fixed">

  <div class="wrapper">
    <!-- Navbar -->
    @include('layouts.includes._navbar')
    <!-- /.navbar -->
    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="/admin" class="brand-link">
        <img src="{{asset('backend/img/crew-w.png')}}" alt="" width="75%"><span style="font-size:12px;" class="text-success">online</span>
      </a>

      <!-- Sidebar -->
      @include('layouts.includes._sidebar')
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Main content -->
      @yield('content')
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <strong>Copyright &copy; <script>document.write(new Date().getFullYear());</script> All rights reserved </strong>
      | 86Rentcar Yogyakarta
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="{{asset('backend')}}/plugins/jquery/jquery.min.js"></script>
  <script src="https://js.pusher.com/6.0/pusher.min.js"></script>
  <script>

    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('cfebe40479a69fbb77c3', {
      cluster: 'ap1'
    });

    var channel = pusher.subscribe('my-channel');
    channel.bind('form-submitted', function(data) {
      // alert(JSON.stringify(data));
      swal("Hai Bro!", JSON.stringify(data), "info");
    });
  </script>

  <!-- Bootstrap 4 -->
  <script src="{{asset('backend')}}/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- overlayScrollbars -->
  <script src="{{asset('backend')}}/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
  <!-- AdminLTE App -->
  <script src="{{asset('backend')}}/dist/js/adminlte.js"></script>
  <!-- DataTables -->
  <script src="{{ asset('backend') }}/plugins/datatables/jquery.dataTables.min.js"></script>
  <script src="{{ asset('backend') }}/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
  <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
  <script src="{{ asset('backend') }}/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  <!-- SweeatAlert -->
  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  @include('sweet::alert')
  <!-- SweeatAlert Hapus -->
  @yield('sweetAlert')
  <!-- Penjadwalan -->
  @yield('jadwal')
  <!-- Datatables -->
  <script>
    $(function () {
        $("#myTable").DataTable();
    });
  </script>
  <!-- Datetimepicker js -->
  <script src="{{asset('backend')}}/dist/js/datetimepicker.min.js"></script>
  <script type="text/javascript">
      $(".datetime").datetimepicker({
          format: 'yyyy-mm-dd hh:ii',
          autoclose: true
      });
  </script>
</body>
</html>
