<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama_barang', 'keterangan', 'satuan', 'stok'
    ];
    public function author()
    {
        return $this->belongsTo('App\Models\Pengguna', 'id');
    }

    
}
