<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::with('pembelian')->get();
        return view('admin.pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        $barang = Barang::all();
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $va = str_shuffle($pin);
        return view('admin.pembelian.create', compact('barang','va'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_pembelian' => 'required',
            'harga_beli'=>'required',
            'id_barang'=>'required'
        ]);

        $barang = Barang::findOrFail($request->id_barang);
        $pembelian = new Pembelian;
        $pembelian->harga_beli = $request->harga_beli;
        $pembelian->jumlah_pembelian = $request->jumlah_pembelian;
        $pembelian->id_pengguna = $barang->id_pengguna;
        $pembelian->id_barang = $request->id_barang;
        $pembelian->save();
        $barang->stok=$barang->stok -  $request->jumlah_pembelian;
        $barang->save();
        return redirect()->route('pembelian.index');
    }

    public function show($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('admin.pembelian.show', compact('pembelian'));
    }

    public function edit($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $barang = Barang::all();
        return view('admin.pembelian.edit', compact('barang', 'pembelian'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_pembelian' => 'required',
            'harga_beli'=>'required',
            'id_barang'=>'required'
        ]);

        $pembelian = Pembelian::findOrFail($id);
        $pembelian = new Pembelian;
        $pembelian->harga_beli = $request->harga_beli;
        $pembelian->jumlah_pembelian = $request->jumlah_pembelian;
        $pembelian->id_barang = $request->id_barang;
        $pembelian->save();
        return redirect()->route('pembelian.index');

    }

    public function destroy($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        $pembelian->delete();
        return redirect()->route('pembelian.index');
    }

}

