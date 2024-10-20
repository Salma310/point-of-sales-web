<html>
    <head>
        <title>Home</title>
    </head>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            color: #333;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50;
            text-align: center;
        }

        h2 {
            color: #555;
            border-bottom: 2px solid #4CAF50;
            padding-bottom: 10px;
            margin-bottom: 20px;
        }

        a {
            display: inline-block;
            padding: 10px 20px;
            margin: 5px 0;
            text-decoration: none;
            color: #fff;
            background-color: #4CAF50;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }

        a:hover {
            background-color: #45a049;
        }

        .section {
            margin-bottom: 40px;
        }

        .section:last-of-type {
            margin-bottom: 0;
        }
    </style>
    <body>
        <div class="container">
            <h1>Selamat Datang di Point of Sales Minimarket Abe</h1>

            <div class="section">
                <h2>Profile User</h2>
                <a href="{{ route('user.profile', ['id' => 22, 'name' => 'NasywaSSB']) }}">Halaman Profil</a><br>
            </div>

            <div class="section">
                <h2>Kategori Produk</h2>
                <a href="{{ route('category.baby-kid') }}">Baby & Kid</a><br>
                <a href="{{ route('category.beauty-health') }}">Beauty & Health</a><br>
                <a href="{{ route('category.food-beverage') }}">Food & Beverage</a><br>
                <a href="{{ route('category.home-care') }}">Home Care</a><br>
            </div>
            
            <div class="section">
                <h2>Transaksi POS</h2>
                <a href="{{ route('sales.index') }}">Halaman POS</a><br>
            </div>
        </div>       
    </body>
</html>