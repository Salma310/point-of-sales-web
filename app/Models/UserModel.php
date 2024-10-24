<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable; //implement class Authenticatable

// use App\Models\LevelModel;

use Monolog\Level;

// class UserModel extends Model
// {
//     use HasFactory;

//     protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan oleh model ini
//     protected $primaryKey = 'user_id';  //Mendefinisikan primary key dati tabel yang digunakan yang digunakan
//     /**
//      * The attributes that are mass asigniable
//      * @var array
//      */
//     // protected $fillable = ['level_id', 'username', 'nama', 'password'];

//     protected $fillable = ['level_id', 'username', 'nama', 'password'];

//     public function level(): BelongsTo
//     {
//         return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
//     } 
// }


class UserModel extends Authenticatable
{
    use HasFactory;

    protected $table = 'm_user'; //Mendefinisikan nama tabel yang digunakan oleh model ini
    protected $primaryKey = 'user_id';  //Mendefinisikan primary key dati tabel yang digunakan yang digunakan
    /**
     * The attributes that are mass asigniable
     * @var array
     */

    protected $fillable = [ 'username', 'password', 'nama', 'level_id', 'avatar', 'created_at', 'updated_at'];

    protected $hidden = ['password']; //jangan ditampilkan saat select

    protected $casts = ['password' => 'hashed']; //casting password agar otomatis di hash

    public function profil(): HasOne
    {
        return $this->hasOne(ProfilUserModel::class, 'user_id', 'user_id');
    }

    public function level(): BelongsTo
    {
        return $this->belongsTo(LevelModel::class, 'level_id', 'level_id');
    } 

    /**
     * Mendapatkan nama role
     */
    public function getRoleName() : string 
    {
        return $this->level->level_nama;
    }

    /**
     * Cek apakah user memiliki role tertentu
     */
    public function hasRole($role) : bool 
    {
        return $this->level->level_kode == $role;
    }
    
     /**
     * Mendapatkan kode role
     */
    public function getRole()
    {
        return $this->level->level_kode;
    }

    public function getJenisKelamin()
    {
        return $this->profil ? $this->profil->jenis_kelamin : null;
    }
}
