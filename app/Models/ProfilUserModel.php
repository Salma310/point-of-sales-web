<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
class ProfilUserModel extends Model
{
    use HasFactory;
    // Tentukan nama tabel jika berbeda dari default
    protected $table = 'profil_user';
    protected $primaryKey = 'profil_id';
    // Tentukan kolom yang boleh diisi (fillable)
    protected $fillable = [
        'user_id',
        'tempat_lahir',
        'tanggal_lahir',
        'jenis_kelamin',
        'agama',
        'no_hp',
        'alamat',
    ];
    // Hubungan dengan model User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'user_id');
    }
}