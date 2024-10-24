<?php

namespace App\Http\Controllers;
use App\Models\SalesModel;
use App\Models\DetailSalesModel;
use App\Models\UserModel;
use App\Models\BarangModel;
use App\Models\StokModel;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    //
    public function index()
    {
        $salesCount = SalesModel::count(); // Jumlah total penjualan
        // $transactionIncrease = SalesModel::where('created_at', '>=', now()->subMonth())->count(); // Contoh menghitung kenaikan transaksi dalam sebulan
        // $stockCount = StokModel::count(); // Jumlah total stok
        $stockCount = StokModel::sum('stok_jumlah');
        $userCount = UserModel::count(); // Jumlah pengguna
        $itemCount = BarangModel::count(); // Jumlah barang


        $breadcrumb = (object) [
            'title' => 'Selamat Datang',
            'list' => ['Home', 'Welcome']
        ];
        $activeMenu = 'dashboard';

        return view('welcome', [
            'breadcrumb' => $breadcrumb,
            'activeMenu' => $activeMenu,
            'salesCount' => $salesCount,
            'stockCount' => $stockCount,
            'userCount' => $userCount,
            'itemCount' => $itemCount
        ]);
    }
}
