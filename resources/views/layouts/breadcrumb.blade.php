<style>
  .content-header h1 {
    font-family: 'Poppins', sans-serif; /* Menggunakan font modern */
    font-weight: 600; /* Sedikit lebih tebal untuk judul */
    font-size: 28px; /* Ukuran font untuk judul */
    color: #333333; /* Warna teks gelap */
    margin-bottom: 10px; /* Jarak bawah yang lebih besar */
}

.breadcrumb {
    font-family: 'Roboto', sans-serif; /* Font yang simpel dan modern */
    font-size: 14px; /* Ukuran font breadcrumb */
    color: #666666; /* Warna teks breadcrumb abu-abu untuk tampilan yang bersih */
}

.breadcrumb-item a {
    color: #3498db; /* Warna link breadcrumb */
    text-decoration: none; /* Menghapus garis bawah link */
    font-weight: 500; /* Sedikit lebih tebal agar terlihat jelas */
}

.breadcrumb-item.active {
    color: #333333; /* Warna teks item aktif di breadcrumb */
    font-weight: 600; /* Teks item aktif lebih tebal */
}

</style>
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>{{ $breadcrumb->title }}</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            @foreach ($breadcrumb->list as $key => $value )
              @if($key == count($breadcrumb->list)-1)
              <li class="breadcrumb-item active">{{  $value }}</li>
              @else
              <li class="breadcrumb-item">{{  $value }}</li>
              @endif
            @endforeach
            {{-- <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Blank Page</li> --}}
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>