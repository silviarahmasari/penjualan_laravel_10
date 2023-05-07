<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $table = 'barang';
    protected $primaryKey = 'id_barang';

    protected $fillable = [
        'nama_barang', 'keterangan', 'satuan', 'stok', 'id_user'
    ];
    public function author()
    {
        return $this->belongsTo('App\Models\Pengguna', 'id_user');
    }
    public function pembelian()
    {
        return $this->hasMany('App\Models\Pembelian', 'id_barang');
    }

    public function penjualan()
    {
        return $this->hasMany(Penjualan::class, 'id_barang');
    }
}
