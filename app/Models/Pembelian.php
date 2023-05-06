<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;
    protected $table = 'pembelian';
    protected $fillable = [
        'id_user', 'id_barang', 'jumlah_pembelian', 'harga_beli'
    ];
    public function author()
    {
        return $this->belongsTo('App\Models\Pengguna', 'id_user');
    }
    public function barang()
    {
        return $this->belongsTo('App\Models\Barang', 'id_barang');
    }
}
