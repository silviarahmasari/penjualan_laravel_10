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
            'jumlah_penjualan' => rand(1, 5),
            'harga_jual' => rand(1, 5) . '00000',
            'id_user' => rand(7, 13),
            'id_barang' => rand(41, 50),
        ]);
        DB::table('penjualan')->insert([
            'jumlah_penjualan' => rand(1, 5),
            'harga_jual' => rand(1, 5) . '00000',
            'id_user' => rand(7, 13),
            'id_barang' => rand(41, 50),
        ]);
        DB::table('penjualan')->insert([
            'jumlah_penjualan' => rand(1, 5),
            'harga_jual' => rand(1, 5) . '00000',
            'id_user' => rand(7, 13),
            'id_barang' => rand(41, 50),
        ]);
        DB::table('penjualan')->insert([
            'jumlah_penjualan' => rand(1, 5),
            'harga_jual' => rand(1, 5) . '00000',
            'id_user' => rand(7, 13),
            'id_barang' => rand(41, 50),
        ]);
        DB::table('penjualan')->insert([
            'jumlah_penjualan' => rand(1, 5),
            'harga_jual' => rand(1, 5) . '00000',
            'id_user' => rand(7, 13),
            'id_barang' => rand(41, 50),
        ]);
    }
}
