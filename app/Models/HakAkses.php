<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HakAkses extends Model
{
    use HasFactory;
    protected $table = 'hak_Akses';
    protected $primaryKey = 'id_akses';
    protected $fillable = [
        'nama_akses', 'keterangan'
    ];
    public function users()
    {
        return $this->hasMany(Users::class, 'id_akses');
    }
}
