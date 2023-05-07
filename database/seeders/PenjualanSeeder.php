<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class PenjualanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('penjualan')->insert([
            'jumlah_penjualan' => 2,
            'harga_jual' => 20000000,
            'id_user' => 7,
            'id_barang' => 41,
        ]);
        DB::table('penjualan')->insert([
            'jumlah_penjualan' => 1,
            'harga_jual' => 3000,
            'id_user' => 13,
            'id_barang' => 46,
        ]);
        DB::table('penjualan')->insert([
            'jumlah_penjualan' => 4,
            'harga_jual' => 180000,
            'id_user' => 12,
            'id_barang' => 47,
        ]);
        DB::table('penjualan')->insert([
            'jumlah_penjualan' => 3,
            'harga_jual' => 51000,
            'id_user' => 12,
            'id_barang' => 49,
        ]);
        DB::table('penjualan')->insert([
            'jumlah_penjualan' => 3,
            'harga_jual' => 45000,
            'id_user' => 9,
            'id_barang' => 43,
        ]);
    }
}
