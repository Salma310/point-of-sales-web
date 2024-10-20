<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class KategoriModel extends Model
{
    use HasFactory;

    protected $table = 'm_kategori'; //Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'kategori_id';  //Mendefinisikan primary key dati tabel yang digunakan yang digunakan
    /**
     * The attributes that are mass asigniable
     * @var array
     */

    protected $fillable = ['kategori_id', 'kategori_kode', 'kategori_nama', 'password'];

    // public function level(): BelongsTo
    // {
    //     return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    // } 
}
