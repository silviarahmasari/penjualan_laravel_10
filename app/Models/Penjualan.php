<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $fillable = [
        'id_pengguna', 'id_barang', 'jumlah_penjualan', 'harga_jual'
    ];

    public function author()
    {
        return $this->belongsTo('App\Models\Pengguna', 'id_pengguna');
    }
    public function Barang()
    {
        return $this->belongsTo('App\Models\Barang', 'id_barang');
    }
}
