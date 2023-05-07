<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;
    protected $table = 'penjualan';
    protected $fillable = [
        'id_user', 'id_barang', 'jumlah_penjualan', 'harga_jual'
    ];

    public function author()
    {
        return $this->belongsTo('App\Models\Pengguna', 'id_user');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'id_barang');
    }
}
