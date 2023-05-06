<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengguna;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('admin.penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $barang = Barang::all();
        $user = User::all();
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $va = str_shuffle($pin);
        return view('admin.penjualan.create', compact('barang','user','va'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_penjualan' => 'required',
            'harga_jual'=>'required',
            'id_barang'=>'required',
            'id_user'=>'required'
        ]);

        $barang = Barang::findOrFail($request->id_barang);
        $penjualan = new Penjualan;
        $penjualan->harga_jual = $request->harga_jual;
        $penjualan->jumlah_penjualan = $request->jumlah_penjualan;
        $penjualan->id_user = Auth::user()->id_user;
        $penjualan->id_barang = $request->id_barang;
        $penjualan->save();
        $barang->stok=$barang->stok -  $request->jumlah_penjualan;
        $barang->save();
        return redirect()->route('penjualan.index');
    }

    public function show($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        return view('admin.penjualan.show', compact('penjualan'));
    }

    public function edit($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $barang = Barang::all();
        return view('admin.penjualan.edit', compact('barang', 'penjualan'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'jumlah_penjualan' => 'required',
            'harga_jual'=>'required',
            'id_barang'=>'required',
            // 'id_user'=>'required'
        ]);

        $penjualan = Penjualan::findOrFail($id);
        $barang = Barang::findOrFail($request->id_barang);
        $penjualan = new Penjualan;
        $penjualan->harga_jual = $request->harga_jual;
        $penjualan->jumlah_penjualan = $request->jumlah_penjualan;
        $penjualan->id_barang = $request->id_barang;
        // $penjualan->id_user = Auth::user()->id_user;
        $penjualan->save();
        $barang->stok=$barang->stok -  $request->jumlah_penjualan;
        $barang->save();
        return redirect()->route('penjualan.index');

    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();
        return redirect()->route('penjualan.index');
    }

}
