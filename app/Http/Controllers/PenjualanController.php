<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Http\Request;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::with('penjualan')->get();
        return view('admin.penjualan.index', compact('penjualan'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('admin.penjualan.create', compact('barang'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'jumlah_penjualan' => 'required',
            'harga_jual'=>'required',
            'id_barang'=>'required'
        ]);

        $barang = Barang::findOrFail($request->id_barang);
        $penjualan = new Penjualan;
        $penjualan->harga_jual = $request->harga_jual;
        $penjualan->jumlah_penjualan = $request->jumlah_penjualan;
        $penjualan->id_pengguna = $barang->id_pengguna;
        $penjualan->id_barang = $request->id_barang;
        $penjualan->save();
        $barang->stok=$barang->stok +  $request->jumlah_penjualan;
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
            'id_barang'=>'required'
        ]);

        $penjualan = Penjualan::findOrFail($id);
        $penjualan = new Penjualan;
        $penjualan->harga_jual = $request->harga_jual;
        $penjualan->jumlah_penjualan = $request->jumlah_penjualan;
        $penjualan->id_barang = $request->id_barang;
        $penjualan->save();
        return redirect()->route('penjualan.index');

    }

    public function destroy($id)
    {
        $penjualan = Penjualan::findOrFail($id);
        $penjualan->delete();
        return redirect()->route('penjualan.index');
    }

}
