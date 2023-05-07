<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;



class PembelianSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('pembelian')->insert([
            'jumlah_pembelian' => 2,
            'harga_beli' => 100000,
            'id_user' => 7,
            'id_barang' => 41,
        ]);
        DB::table('pembelian')->insert([
            'jumlah_pembelian' => 1,
            'harga_beli' => 100000,
            'id_user' => 13,
            'id_barang' => 46,
        ]);
        DB::table('pembelian')->insert([
            'jumlah_pembelian' => 4,
            'harga_beli' => 200000,
            'id_user' => 12,
            'id_barang' => 47,
        ]);
        DB::table('pembelian')->insert([
            'jumlah_pembelian' => 3,
            'harga_beli' => 80000,
            'id_user' => 12,
            'id_barang' => 49,
        ]);
        DB::table('pembelian')->insert([
            'jumlah_pembelian' => 3,
            'harga_beli' => 50000,
            'id_user' => 9,
            'id_barang' => 43,
        ]);
    }
}
