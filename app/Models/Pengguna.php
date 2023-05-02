<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'pengguna';

    protected $fillable = [
        'id_pengguna',
        'id_akses',
        'nama_pengguna',
        'password',
        'nama_depan',
        'nama_belakang',
        'no_hp',
        'alamat'
    ];

}
