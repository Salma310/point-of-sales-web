<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{  config('app.name', ' PWL Laravel Starter Code') }}</title>

  <meta name="csrf-token" content="{{  csrf_token() }}">  {{-- Untuk mengirimkan token Laravel CSRF pada setiap request ajax --}}

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap">
  
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Tempusdominus Bootstrap 4 -->
  {{-- <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
  <!-- iCheck -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- JQVMap -->
  <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- overlayScrollbars -->
  <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
  <!-- summernote -->
  <link rel="stylesheet" href="plugins/summernote/summernote-bs4.min.css"> --}}
  
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">

  <style>
    .main-sidebar {
    background-color: #07889B; /* Warna TEAL sebagai latar belakang utama sidebar */
    color: #ffffff; /* Warna teks putih agar kontras */
}

.main-sidebar .brand-link {
    background-color: #E37222; /* Warna TANGERINE untuk brand header */
    color: #ffffff; /* Warna teks putih agar kontras */
    border-bottom: 1px solid #EAAA7B; /* Garis bawah brand dengan warna TAN */
}

.main-sidebar .brand-link .brand-image {
    opacity: 1; /* Menjadikan logo lebih jelas */
}

.main-sidebar .brand-link:hover {
    background-color: #EAAA7B; /* Warna TAN untuk efek hover pada brand link */
}

.brand-text {
    font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins yang modern dan estetik */
    font-weight: 700; /* Membuat teks lebih tebal agar menonjol */
    font-size: 20px; /* Ukuran font yang sedikit lebih besar */
    color: #ffffff; /* Warna teks putih untuk kontras */
    letter-spacing: 1px; /* Spasi antar huruf untuk tampilan elegan */
    text-transform: uppercase; /* Mengubah teks menjadi huruf kapital agar lebih formal */
}


.elevation-4 {
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Memberikan bayangan lembut */
}

  </style>
  @stack('css') <!-- Digunakan untuk memanggil custom css dari perintah push('css') pada masing-masing view -->
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
 {{-- Navbar --}}
@include('layouts.header')
 {{-- /.navbar --}}

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{  url('/') }}" class="brand-link">

      <img src="{{ asset('logo.jpg') }}"  alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">

      {{-- <img src="{{ asset ('adminlte/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8"> --}}
      <span class="brand-text font-weight-light">Happy Market</span>
    </a>

    <!-- Sidebar -->
    @include('layouts.sidebar')
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
   @include('layouts.breadcrumb')

    <!-- Main content -->
    <section class="content">
        @yield('content')
    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  @include('layouts.footer')
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="{{ asset('adminlte/plugins/jquery/jquery.min.js') }}"></script>
<!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
 <!-- DataTables & Plugins -->
 <script src="{{ asset('adminlte/plugins/datatables/jquery.dataTables.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/datatables-responsive/js/dataTables.responsive.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/datatables-responsive/js/responsive.bootstrap4.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/datatables-buttons/js/dataTables.buttons.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.bootstrap4.min. js') }}"></script>
 <script src="{{ asset('adminlte/plugins/jszip/jszip.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/pdfmake/pdfmake.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/pdfmake/vfs_fonts.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.html5.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.print.min.js') }}"></script>
 <script src="{{ asset('adminlte/plugins/datatables-buttons/js/buttons.colvis.min. js') }}"></script>

<!-- jquery validation -->
<script src="{{ asset('adminlte/plugins/jquery-validation/jquery.validate.min.js') }}"></script>
<script src="{{ asset('adminlte/plugins/jquery-validation/additional-methods.min.js') }}"></script>


<!-- SweetAlert 2 -->
<script src="{{ asset('adminlte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>


 <!-- AdminLTE App -->
 <script src="{{ asset('adminlte/dist/js/adminlte.min.js') }}"></script>
 
 <script>
   // Untuk mengirimkan token Laravel CSRF pada setiap request ajax
   $.ajaxSetup({headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')}});
 </script>
 @stack('js') <!-- Digunakan untuk memanggil custom js dari perintah push('js') pada masing-masing view -->
 
<!-- AdminLTE for demo purposes -->
{{-- <script src="../../dist/js/demo.js"></script> --}}
</body>
</html>  
