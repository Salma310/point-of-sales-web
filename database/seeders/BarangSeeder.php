<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class BarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         $data =[
            ['barang_id' =>1, 'kategori_id' => 1, 'barang_kode' => 'HFG01', 'barang_nama'=> 'Hufagrip', 'harga_beli' => 11000, 'harga_jual' => 13000],
            ['barang_id' =>2, 'kategori_id' => 1, 'barang_kode' => 'TKA01', 'barang_nama'=> 'Tolak Angin', 'harga_beli' => 5000, 'harga_jual' => 7000],
            ['barang_id' =>3, 'kategori_id' => 1, 'barang_kode' => 'SLP01', 'barang_nama'=> 'Salon Pas', 'harga_beli' => 7000, 'harga_jual' => 9000],
            ['barang_id' =>4, 'kategori_id' => 2, 'barang_kode' => 'MSD01', 'barang_nama'=> 'Mie Sedap Goreng', 'harga_beli' => 2500, 'harga_jual' => 4000],
            ['barang_id' =>5, 'kategori_id' => 2, 'barang_kode' => 'SRT01', 'barang_nama'=> 'Sari Roti Tawar', 'harga_beli' => 15000, 'harga_jual' => 17000],
            ['barang_id' =>6, 'kategori_id' => 2, 'barang_kode' => 'ORE01', 'barang_nama'=> 'Oreo Chocolate', 'harga_beli' => 6000, 'harga_jual' => 9000],
            ['barang_id' =>7, 'kategori_id' => 3, 'barang_kode' => 'LBY01', 'barang_nama'=> 'Lifebuoy Merah', 'harga_beli' => 3000, 'harga_jual' => 4000],
            ['barang_id' =>8, 'kategori_id' => 3, 'barang_kode' => 'SLK01', 'barang_nama'=> 'Sunsilk Black Shine', 'harga_beli' => 16000, 'harga_jual' => 18000],
            ['barang_id' =>9, 'kategori_id' => 3, 'barang_kode' => 'WDH01', 'barang_nama'=> 'Pepsodent Whitening', 'harga_beli' => 13000, 'harga_jual' => 15000],
            ['barang_id' =>10, 'kategori_id' => 4, 'barang_kode' => 'VXL01', 'barang_nama'=> 'Vixal', 'harga_beli' => 9000, 'harga_jual' => 11000],
            ['barang_id' =>11, 'kategori_id' => 4, 'barang_kode' => 'SPL01', 'barang_nama'=> 'Super Pell', 'harga_beli' => 10000, 'harga_jual' => 12000],
            ['barang_id' =>12, 'kategori_id' => 4, 'barang_kode' => 'SNL01', 'barang_nama'=> 'Sunlight', 'harga_beli' => 11000, 'harga_jual' => 13000],
            ['barang_id' =>13, 'kategori_id' => 5, 'barang_kode' => 'GDG01', 'barang_nama'=> 'Gudang Garam Merah', 'harga_beli' => 16000, 'harga_jual' => 18000],
            ['barang_id' =>14, 'kategori_id' => 5, 'barang_kode' => 'SMP01', 'barang_nama'=> 'Sampoerna Mild', 'harga_beli' => 34000, 'harga_jual' => 36000],
            ['barang_id' =>15, 'kategori_id' => 5, 'barang_kode' => 'RLA01', 'barang_nama'=> 'LA Ice', 'harga_beli' => 30000, 'harga_jual' => 33000],
            
           
        ];
        DB::table('m_barang')->insert($data);
    }
}
