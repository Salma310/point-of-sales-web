<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class DetailSalesModel extends Model
{
    use HasFactory;
    
    protected $table = 't_penjualan_detail'; //Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'detail_id'; 

    protected $fillable = ['detail_id','penjualan_id','barang_id', 'harga', 'jumlah'];


    public function sales(): BelongsTo
    {
        return $this->belongsTo(SalesModel::class, 'penjualan_id', 'penjualan_id');
    } 
    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id', 'barang_id');
    }

}
