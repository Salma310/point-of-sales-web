<style>
  .sidebar {
    background-color: #07889B; /* Warna TEAL sebagai latar belakang utama */
    color: #333333; /* Warna teks tetap */
    font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins yang estetik */
    font-weight: 600; /* Membuat font tebal di seluruh sidebar */
}

.sidebar .nav-header {
    color: #f7b733; /* Warna POWDER untuk header menu */
    font-weight: bold;
    text-transform: uppercase;
    padding-left: 10px;
    margin-top: 15px;
    font-size: 14px; /* Menambahkan ukuran sedikit agar terlihat jelas */
}

.sidebar .nav-link {
    color: #ffffff; /* Warna teks putih agar kontras dengan TEAL */
    padding: 10px 15px;
    border-radius: 4px;
    transition: background-color 0.3s ease-in-out, color 0.3s ease-in-out;
    font-weight: 600; /* Membuat teks link lebih tebal */
    font-size: 15px; /* Ukuran font yang lebih besar */
}

.sidebar .nav-link:hover {
    background-color: #66B9BF; /* Warna POWDER untuk hover */
    color: #ffffff; /* Warna teks saat hover tetap putih */
}

.sidebar .nav-icon {
    margin-right: 10px;
}

.sidebar .active {
    background-color: #EAAA7B; /* Warna TAN untuk link yang aktif */
    color: #ffffff; /* Teks tetap putih */
    font-weight: 700; /* Lebih tebal untuk link aktif */
}

.sidebar .btn-sidebar {
    background-color: #07889B; /* Warna TEAL untuk tombol pencarian */
    border: none;
    color: #ffffff;
    font-weight: 600; /* Membuat tombol pencarian tebal */
}

.sidebar .form-control-sidebar {
    background-color: #ffffff; /* Warna putih bersih untuk kotak pencarian */
    color: #333333;
    border: 1px solid #cccccc; /* Garis batas ringan */
    padding-left: 10px;
    font-weight: 500; /* Font lebih tebal untuk kotak pencarian */
}

.input-group-append .btn-sidebar:hover {
    background-color: #07889B; /* Warna TEAL untuk tombol pencarian saat hover */
}

.nav-item {
    margin-bottom: 5px;
}

.nav-header {
    border-bottom: 2px solid #EAAA7B; /* Garis bawah berwarna TAN untuk header menu */
    margin-bottom: 5px;
    font-weight: 700; /* Lebih tebal untuk header */
}



</style>
<div class="sidebar">
    <!-- Sidebar Search Form -->
    <div class="form-inline mt-2">
        <div class="input-group" data-widget="sidebar-search">
            <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
            <div class="input-group-append">
                <button class="btn btn-sidebar">
                    <i class="fas fa-search fa-fw"></i>
                </button>
            </div>
        </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

            <!-- Dashboard -->
            <li class="nav-item">
                <a href="{{ url('/dashboard') }}" class="nav-link {{ request()->is('/dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>Dashboard</p>
                </a>
            </li>

            <!-- Sidebar Dinamis berdasarkan Role -->
            @if(auth()->user()->getRole() == 'ADM')
                <!-- Data Pengguna -->
                <li class="nav-header">Data Pengguna</li>
                <li class="nav-item">
                    <a href="{{ url('/level') }}" class="nav-link {{ request()->is('level*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-layer-group"></i>
                        <p>Level User</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/user') }}" class="nav-link {{ request()->is('user*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-user"></i>
                        <p>Data User</p>
                    </a>
                </li>
            @endif

            @if(auth()->user()->getRole() == 'ADM' || auth()->user()->getRole() == 'MNG')
                <!-- Data Supplier -->
                <li class="nav-header">Data Supplier</li>
                <li class="nav-item">
                    <a href="{{ url('/supplier') }}" class="nav-link {{ request()->is('supplier*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-users"></i>
                        <p>Data Supplier</p>
                    </a>
                </li>

                <!-- Data Sales -->
                <li class="nav-header">Data Sales</li>
                <li class="nav-item">
                    <a href="{{ url('/sales') }}" class="nav-link {{ request()->is('sales*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cash-register"></i>
                        <p>Transaksi Penjualan</p>
                    </a>
                </li>
            @endif

            @if(in_array(auth()->user()->getRole(), ['ADM', 'MNG', 'STF']))
                <!-- Data Stok -->
                <li class="nav-header">Data Transaksi</li>
                <li class="nav-item">
                    <a href="{{ url('/stok') }}" class="nav-link {{ request()->is('stok*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cubes"></i>
                        <p>Stok Barang</p>
                    </a>
                </li>

                <!-- Point of Sales -->
                <li class="nav-item">
                    <a href="{{ url('/pos') }}" class="nav-link {{ request()->is('pos*') ? 'active' : '' }}">
                        <i class="nav-icon fas fa-cart-plus"></i>
                        <p>Point of Sales</p>
                    </a>
                </li>

                <!-- Data Kategori -->
                <li class="nav-header">Data Barang</li>
                <li class="nav-item">
                    <a href="{{ url('/kategori') }}" class="nav-link {{ request()->is('kategori*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-bookmark"></i>
                        <p>Kategori Barang</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ url('/barang') }}" class="nav-link {{ request()->is('barang*') ? 'active' : '' }}">
                        <i class="nav-icon far fa-list-alt"></i>
                        <p>Data Barang</p>
                    </a>
                </li>
            @endif

            <!-- Pengaturan -->
            <li class="nav-header">Pengaturan</li>
            <li class="nav-item">
                <a href="{{ url('/profil') }}" class="nav-link {{ request()->is('profil*') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>Profile</p>
                </a>
            </li>

            <!-- Logout -->
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
    </nav>
</div>











{{-- <div class="sidebar">
  <!-- Sidebar Search Form -->
  <div class="form-inline mt-2">
      <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
              <button class="btn btn-sidebar">
                  <i class="fas fa-search fa-fw"></i>
              </button>
          </div>
      </div>
  </div>
  
  <!-- Sidebar Menu -->
  <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          
          <!-- Dashboard -->
          <li class="nav-item">
              <a href="{{ url('/') }}" class="nav-link {{ ($activeMenu == 'dashboard') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-tachometer-alt"></i>
                  <p>Dashboard</p>
              </a>
          </li>
          <li class="nav-item">
            <a href="{{ url('/pos') }}" class="nav-link {{ ($activeMenu == 'pos') ? 'active' : '' }}">
                <i class="nav-icon fas fa-cart-plus"></i>
                <p>Point of Sales</p>
            </a>
        </li>
          
          <!-- Data Pengguna Section -->
          <li class="nav-header">Data Pengguna</li>
          <li class="nav-item">
                    <a href="{{ url('/level') }}" class="nav-link {{ request()->is('level*') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-layer-group"></i>
                  <p>Level User</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ url('/user') }}" class="nav-link {{ ($activeMenu == 'user') ? 'active' : '' }}">
                  <i class="nav-icon far fa-user"></i>
                  <p>Data User</p>
              </a>
          </li>
          
          <!-- Data Barang Section -->
          <li class="nav-header">Data Barang</li>
          <li class="nav-item">
              <a href="{{ url('/kategori') }}" class="nav-link {{ ($activeMenu == 'kategori') ? 'active' : '' }}">
                  <i class="nav-icon far fa-bookmark"></i>
                  <p>Kategori Barang</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ url('/barang') }}" class="nav-link {{ ($activeMenu == 'barang') ? 'active' : '' }}">
                  <i class="nav-icon far fa-list-alt"></i>
                  <p>Data Barang</p>
              </a>
          </li>

            <!-- Data Supplier Section -->
            <li class="nav-header">Data Supplier</li>
            <li class="nav-item">
                <a href="{{ url('/supplier') }}" class="nav-link {{ ($activeMenu == 'supplier') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>Data Supplier</p>
                </a>
            </li>
          
          <!-- Data Transaksi Section -->
          <li class="nav-header">Data Transaksi</li>
          <li class="nav-item">
              <a href="{{ url('/stok') }}" class="nav-link {{ ($activeMenu == 'stok') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-cubes"></i>
                  <p>Stok Barang</p>
              </a>
          </li>
          <li class="nav-item">
              <a href="{{ url('/sales') }}" class="nav-link {{ ($activeMenu == 'penjualan') ? 'active' : '' }}">
                  <i class="nav-icon fas fa-cash-register"></i>
                  <p>Transaksi Penjualan</p>
              </a>
          </li>

          <li class="nav-header">Pengaturan</li>
            <li class="nav-item">
                <a href="{{ url('/profile') }}" class="nav-link {{ ($activeMenu == 'profile') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-address-card"></i>
                    <p>Profile</p>
                </a>
            </li>
          

           <!-- Button Logout -->
            <li class="nav-item">
                <a href="{{ url('/logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                    <i class="nav-icon fas fa-sign-out-alt"></i>
                    <p>Logout</p>
                </a>
                <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;">
                    @csrf
                </form>
            </li>
      </ul>
  </nav>
</div> --}}
