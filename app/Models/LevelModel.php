<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class LevelModel extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass asigniable
     * @var array
     */

    protected $table = 'm_level';
    protected $primaryKey = "level_id";

    protected $fillable = ['level_id', 'level_kode', 'level_nama'];

    public function user():BelongsTo{
        return $this->belongsTo(UserModel::class);
    }
}
