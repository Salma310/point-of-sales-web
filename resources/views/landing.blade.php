<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Happy Market Shopping - Point of Sales</title>
    <style>
        body {
            font-family: 'Poppins', sans-serif; /* Menggunakan font Poppins yang modern dan elegan */
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            min-height: 100vh;
            background-image: url('{{ asset('background.png') }}'); /* Background gambar */
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            background-color: #f0f0f0; /* Warna dasar abu-abu terang jika gambar tidak muncul */
        }

        header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: #07889B; /* Warna TEAL untuk header */
            color: white;
            box-shadow: 0px 2px 5px rgba(0,0,0,0.1);
        }

        .logo {
            display: flex;
            align-items: center;
        }

        .logo img {
            width: 50px;
            margin-right: 15px;
        }

        .logo h1 {
            margin: 0;
            font-size: 28px;
            color: white;
            font-weight: 700;
            letter-spacing: 1px;
        }

        nav {
            display: flex;
            gap: 15px;
        }

        nav a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #F76C6C; /* Warna Soft Orange untuk tombol */
            color: white;
            border-radius: 50px; /* Membuat tombol berbentuk bulat */
            transition: background-color 0.3s, transform 0.2s;
            font-weight: 600;
        }

        nav a:hover {
            background-color: #FF9463; /* Warna lebih terang saat di-hover */
            transform: scale(1.05); /* Efek zoom kecil saat di-hover */
        }

        main {
            flex-grow: 1;
            display: flex;
            justify-content: center;
            align-items: center;
            background-color: rgba(255, 255, 255, 0.9); /* Latar belakang putih transparan */
            padding: 20px;
        }

        .content {
            text-align: center;
            max-width: 800px; /* Batasan lebar agar teks tetap berada di dalam */
            margin: 0 auto; /* Tengah secara horizontal */
        }

        .content h2 {
            font-size: 36px;
            font-weight: 700;
            color: #07889B; /* Warna TEAL untuk heading */
            margin-bottom: 20px;
        }

        .content p {
            font-size: 18px;
            color: #333333; /* Warna teks lebih gelap untuk kontras */
            margin-bottom: 30px;
            line-height: 1.6; /* Menambah tinggi garis untuk keterbacaan */
        }

        .cta-button {
            display: inline-block;
            padding: 12px 30px;
            background-color: #F76C6C; /* Warna Soft Orange untuk CTA */
            color: white;
            text-decoration: none;
            font-weight: 600;
            border-radius: 50px;
            transition: background-color 0.3s, transform 0.2s;
        }

        .cta-button:hover {
            background-color: #FF9463; /* Warna lebih terang saat di-hover */
            transform: scale(1.05); /* Efek zoom kecil saat di-hover */
        }

        footer {
            padding: 20px;
            text-align: center;
            background-color: #07889B; /* Warna TEAL untuk footer */
            color: white;
            box-shadow: 0px -2px 5px rgba(0,0,0,0.1);
        }

        footer p {
            margin: 0;
            font-size: 14px;
            font-weight: 500;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .logo h1 {
                font-size: 20px;
            }

            .content h2 {
                font-size: 28px;
            }

            .content p {
                font-size: 16px;
            }

            nav a {
                padding: 8px 16px;
                font-size: 14px;
            }

            .cta-button {
                padding: 10px 20px;
                font-size: 14px;
            }
        }
    </style>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">
</head>
<body>

    <!-- Header Section -->
    <header>
        <div class="logo">
            <img src="{{ asset('logo.jpg') }}" alt="Happy Market Logo"> <!-- Assuming you have logo.jpg -->
            <h1>Happy Market</h1>
        </div>
        <nav>
            <a href="{{ url('/login') }}">Login</a>
            <a href="{{ url('/register') }}">Register</a>
        </nav>
    </header>

    <!-- Main Content Section -->
    <main>
        <div class="content">
            <h2>Selamat Datang di Happy Market Shopping, Solusi Belanja Terlengkap Anda</h2>
            <p>Happy Market hadir untuk memberikan solusi Point of Sales yang efisien dan mudah digunakan, sesuai dengan kebutuhan bisnis Anda. Baik Anda memiliki toko kecil atau bisnis berskala besar, sistem kami memastikan transaksi berjalan lancar, pelacakan real-time, dan layanan yang dapat diandalkan untuk membantu bisnis Anda berkembang. Percayakan operasional Anda kepada kami, dan fokuslah pada perkembangan bisnis Anda.</p>
            <a href="{{ url('/register') }}" class="cta-button">Daftar Sekarang</a>
        </div>
    </main>

    <!-- Footer Section -->
    <footer>
        <p>Contact us: happymarket@gmail.com | 087777656177</p>
    </footer>

</body>
</html>
