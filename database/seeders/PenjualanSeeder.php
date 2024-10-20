<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['penjualan_id' =>1, 'user_id' => 3, 'pembeli' => 'PMB001', 'penjualan_kode'=>'TRX00001', 'penjualan_tanggal'=> '2024-08-14 08:30:00'],
            ['penjualan_id' =>2, 'user_id' => 3, 'pembeli' => 'PMB002', 'penjualan_kode'=>'TRX00002', 'penjualan_tanggal'=> '2024-08-14 09:00:00'],
            ['penjualan_id' =>3, 'user_id' => 3, 'pembeli' => 'PMB003', 'penjualan_kode'=>'TRX00003', 'penjualan_tanggal'=> '2024-08-14 10:30:00'],
            ['penjualan_id' =>4, 'user_id' => 3, 'pembeli' => 'PMB004', 'penjualan_kode'=>'TRX00004', 'penjualan_tanggal'=> '2024-08-14 11:00:00'],
            ['penjualan_id' =>5, 'user_id' => 3, 'pembeli' => 'PMB005', 'penjualan_kode'=>'TRX00005', 'penjualan_tanggal'=> '2024-08-14 12:30:00'],
            ['penjualan_id' =>6, 'user_id' => 3, 'pembeli' => 'PMB006', 'penjualan_kode'=>'TRX00006', 'penjualan_tanggal'=> '2024-08-14 13:00:00'],
            ['penjualan_id' =>7, 'user_id' => 3, 'pembeli' => 'PMB007', 'penjualan_kode'=>'TRX00007', 'penjualan_tanggal'=> '2024-08-14 14:30:00'],
            ['penjualan_id' =>8, 'user_id' => 3, 'pembeli' => 'PMB008', 'penjualan_kode'=>'TRX00008', 'penjualan_tanggal'=> '2024-08-14 15:00:00'],
            ['penjualan_id' =>9, 'user_id' => 3, 'pembeli' => 'PMB009', 'penjualan_kode'=>'TRX00009', 'penjualan_tanggal'=> '2024-08-14 16:30:00'],
            ['penjualan_id' =>10, 'user_id' => 3, 'pembeli' => 'PMB010', 'penjualan_kode'=>'TRX0010', 'penjualan_tanggal'=> '2024-08-14 17:00:00'],
        ];
        DB::table('t_penjualan')->insert($data);
    
    }
}
