<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pembelian;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PembelianController extends Controller
{
    public function index()
    {
        $pembelian = Pembelian::all();
        return view('pembelian.index', compact('pembelian'));
    }

    public function create()
    {
        $barang = Barang::all();
        return view('pembelian.create', compact('barang'));
    }

    public function store(Request $request)
    {
        Pembelian::create([
            'id_barang' => $request->id_barang,
            'id_user' => Auth::user()->id_user,
            'jumlah_pembelian' => $request->jumlah_pembelian,
            'harga_beli' => $request->harga_beli,
        ]);

        return redirect('/pembelian')->with('success', 'Data baru berhasil ditambahkan!');
    }

    public function show($id)
    {
        $pembelian = Pembelian::findOrFail($id);
        return view('admin.pembelian.show', compact('pembelian'));
    }

    public function edit($id_pembelian)
    {
        $barang = Barang::all();
        $pembelian = Pembelian::findOrFail($id_pembelian);
        return view('pembelian.update', compact('barang', 'pembelian'));
    }

    public function update(Request $request)
    {
        DB::table('pembelian')->where('id_pembelian', $request->id_pembelian)->update([
            'id_pembelian' => $request->id_pembelian,
            'id_barang' => $request->id_barang,
            'id_user' => $request->id_user,
            'jumlah_pembelian' => $request->jumlah_pembelian,
            'harga_beli' => $request->harga_beli,
        ]);
        return redirect('/pembelian')->with('success', 'Data berhasil diubah!');
    }

    public function destroy($id_pembelian)
    {
        $pembelian = Pembelian::find($id_pembelian);
        $pembelian->delete();
        return redirect('/pembelian')->with('success', 'Data berhasil dihapus!');
    }

}

