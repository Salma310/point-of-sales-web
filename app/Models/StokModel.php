<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class StokModel extends Model
{
    use HasFactory;

    protected $table = 't_stok'; //Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'stok_id'; 
    
    /**
     * The attributes that are mass asigniable
     * @var array
     */

    protected $fillable = ['supplier_id','barang_id','user_id','stok_tanggal', 'stok_jumlah'];

    public function supplier(): BelongsTo
    {
        return $this->belongsTo(SupplierModel::class, 'supplier_id', 'supplier_id');
    } 

    public function barang()
    {
        return $this->belongsTo(BarangModel::class, 'barang_id');
    }
    public function user()
    {
        return $this->belongsTo(UserModel::class, 'user_id');
    }

}
