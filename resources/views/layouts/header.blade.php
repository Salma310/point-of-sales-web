{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>{{  config('app.name', ' PWL Laravel Starter Code') }}</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ asset('adminlte/plugins/fontawesome-fee/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/adminlte.min.css') }}">
</head> --}}
<style>
  .main-header.navbar {
    background-color: #07889B; /* Warna TEAL untuk latar belakang header */
    color: #ffffff; /* Warna teks putih untuk kontras */
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1); /* Bayangan halus untuk memberikan sedikit kedalaman */
}

.main-header .navbar-nav .nav-link {
    color: #ffffff; /* Warna putih untuk teks dan ikon */
    font-weight: 500; /* Sedikit lebih tebal */
    transition: color 0.3s ease-in-out; /* Transisi halus saat di-hover */
}

.main-header .navbar-nav .nav-link:hover {
    color: #66B9BF; /* Warna POWDER untuk hover pada link dan ikon */
}

.navbar-search-block .form-control-navbar {
    background-color: #ffffff; /* Warna putih untuk kotak pencarian */
    border: none;
    color: #333333; /* Warna teks gelap agar mudah dibaca */
    border-radius: 4px; /* Sedikit sudut membulat */
}

.navbar-search-block .btn-navbar {
    background-color: #E37222; /* Warna TANGERINE untuk tombol pencarian */
    color: #ffffff;
    border: none;
    transition: background-color 0.3s ease-in-out;
}

.navbar-search-block .btn-navbar:hover {
    background-color: #EAAA7B; /* Warna TAN saat tombol pencarian di-hover */
}

.navbar-search-block .btn-navbar[data-widget="navbar-search"] {
    background-color: transparent; /* Tombol close (x) tetap transparan */
    color: #ffffff;
}

.main-header .fas {
    transition: color 0.3s ease-in-out; /* Transisi untuk ikon saat hover */
}

.main-header .fas:hover {
    color: #66B9BF; /* Warna POWDER untuk ikon saat di-hover */
}

</style>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ url('/dashboard') }}" class="nav-link">Home</a>
      </li>
      {{-- <li class="nav-item d-none d-sm-inline-block">
        <a href="#" class="nav-link">Contact</a>
      </li> --}}
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->
