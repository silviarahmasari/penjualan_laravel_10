<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengguna extends Model
{
    protected $table = 'user';

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

    public function barang()
    {
        return $this->hasMany('App\Models\Barang', 'id_pengguna');
    }
    public function pembelian()
    {
        return $this->hasMany('App\Models\Pembelian', 'id_pengguna');
    }
    public function Penjualan()
    {
        return $this->hasMany('App\Models\Penjualan', 'id_pengguna');
    }
}
