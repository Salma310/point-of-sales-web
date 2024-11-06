<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Tymon\JWTAuth\Contracts\JWTSubject; 
use Illuminate\Database\Eloquent\Casts\Attribute; 


class BarangModel extends Model implements JWTSubject
{
    use HasFactory;

    public function getJWTIdentifier(){ 
        return $this->getKey(); 
    } 
 
    public function getJWTCustomClaims(){ 
        return []; 
    }

    protected $table = 'm_barang'; //Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'barang_id'; 
    
    /**
     * The attributes that are mass asigniable
     * @var array
     */

    protected $fillable = ['barang_id', 'kategori_id','barang_kode', 'barang_nama', 'harga_beli', 'harga_jual', 'image'];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriModel::class, 'kategori_id', 'kategori_id');
    } 

    protected function image(): Attribute 
    { 
        return Attribute::make( 
            get: fn ($image) => url('/storage/posts/' . $image), 
        ); 
    }

}
