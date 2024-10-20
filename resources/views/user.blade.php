<html>
    <head>
        <title>User Profile</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-color: #f9f9f9;
                color: #333;
                margin: 0;
                padding: 0;
            }
    
            .container {
                width: 80%;
                max-width: 800px;
                margin: 0 auto;
                padding: 20px;
                background-color: #fff;
                border-radius: 8px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                text-align: center;
            }
    
            h1 {
                color: #4CAF50;
                margin-bottom: 20px;
            }
    
            p {
                font-size: 18px;
                line-height: 1.6;
                margin: 10px 0;
            }
    
            a {
                display: inline-block;
                padding: 10px 20px;
                margin-top: 20px;
                text-decoration: none;
                color: #fff;
                background-color: #4CAF50;
                border-radius: 5px;
                transition: background-color 0.3s ease;
            }
    
            a:hover {
                background-color: #45a049;
            }
        </style>
    </head> 
    <body>
        {{-- <div class="container">
            <h1>Selamat Datang</h1>
            <p> Nomor ID  Anda : {{ $id }}</p>
            <p> Nama Anda      : {{ $name }}</p>
            <br>
            <a href="{{ route('home')}}">Kembali ke Home </a>
        </div> --}}
        <h1>Data User</h1> 
    {{-- Praktikum 4 --}}
        {{-- Praktikum 4 bagian 2.7 --}}
            <a href="{{url('user/tambah')}}">+ Tambah User</a><br><br><br>
            <table border="1" cellpadding="2", cellspacing="0">
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Nama</td>
                <td>ID Level Pengguna</td>
                <td>Kode Level</td>
                <td>Nama Level</td>
                <td>Aksi</td>
            </tr>
            @foreach ($data as $d )
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
                <td>{{ $d->level->level_kode }}</td>
                <td>{{ $d->level->level_nama }}</td>
                <td><a href="{{ url('/user/ubah/' . $d->user_id) }}">Ubah</a> | <a href="{{ url('/user/hapus/' . $d->user_id)}}">Hapus</a></td>
            </tr>            
            @endforeach
        {{-- Praktikum 4 bagian 2.6 --}}
        {{-- <a href="{{url('user/tambah')}}">+ Tambah User</a><br><br><br>
         <table border="1" cellpadding="2", cellspacing="0">
            <tr>
                <td>ID</td>
                <td>Username</td>
                <td>Nama</td>
                <td>ID Level Pengguna</td>
                <td>Aksi</td>
            </tr>
            @foreach ($data as $d )
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
                <td><a href="{{ url('/user/ubah/' . $d->user_id) }}">Ubah</a> | <a href="{{ url('/user/hapus/' . $d->user_id)}}">Hapus</a></td>
            </tr>            
            @endforeach --}}
           
        {{-- Praktikum 4 bagian 2.3 --}}
        {{-- <table border="1" cellpadding="2", cellspacing="0">
            <tr>
                <th>Jumlah Pengguna</th>
            </tr>
            <tr>
                <td>{{ $data }}</td>
            </tr> --}}
        {{-- <table border="1" cellpadding="2", cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Username</th>
                <th>Nama</th>
                <th>ID Level Pengguna</th>
            </tr> --}}
            {{--  Praktikum 4 bagian 2.1  --}}
            {{-- <tr>
                <td>{{ $data->user_id }}</td>
                <td>{{ $data->username }}</td>
                <td>{{ $data->nama }}</td>
                <td>{{ $data->level_id }}</td>
            </tr>   --}}
        {{-- Praktikum 3 --}}
            {{-- @foreach ($data as $d )
            <tr>
                <td>{{ $d->user_id }}</td>
                <td>{{ $d->username }}</td>
                <td>{{ $d->nama }}</td>
                <td>{{ $d->level_id }}</td>
            </tr>            
            @endforeach --}}
        </table>
    </body>
</html>