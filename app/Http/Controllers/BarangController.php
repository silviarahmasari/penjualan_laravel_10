<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::all();
        return view('barang.index', compact('barang'));
    }

    public function create()
    {
        return view('barang.create');
    }

    public function store(Request $request)
    {
        Barang::create([
            'id_user' => Auth::user()->id_user,
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);

        return redirect('/barang')->with('success', 'Data baru berhasil ditambahkan!');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.show', compact('barang'));
    }

    public function edit($id_barang)
    {
        $barang = Barang::findOrFail($id_barang);
        return view('barang.update', compact('barang'));

    }

    public function update(Request $request)
    {
        DB::table('barang')->where('id_barang', $request->id_barang)->update([
            'id_user' => Auth::user()->id_user,
            'id_barang' => $request->id_barang,
            'nama_barang' => $request->nama_barang,
            'keterangan' => $request->keterangan,
            'satuan' => $request->satuan,
            'stok' => $request->stok,
            'harga_beli' => $request->harga_beli,
            'harga_jual' => $request->harga_jual,
        ]);
        return redirect('/barang')->with('success', 'Data berhasil diubah!');

    }

    public function delete($id_barang)
    {
        // $barang = Barang::findOrFail($id_barang);
        $delete = Barang::find($id_barang);
        $delete->delete();
        return redirect('/barang')->with('success', 'Data berhasil dihapus!');
    }

}
