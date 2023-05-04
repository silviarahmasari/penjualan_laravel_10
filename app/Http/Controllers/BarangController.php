<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Pengguna;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function index()
    {
        $barang = Barang::with('barang')->get();
        return view('admin.barang.index', compact('barang'));
    }

    public function create()
    {
        $pengguna = Pengguna::all();
        return view('admin.barang.create', compact('pengguna'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barang',
            'keterangan' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
            'id_pengguna' => 'required',
        ]);

        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->keterangan = $request->keterangan;
        $barang->satuan = $request->satuan;
        $barang->stok = $request->stok;
        $barang->id_pengguna = $request->id_pengguna;
        $barang->save();
        return redirect()->route('barang    .index');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $pengguna = Pengguna::all();
        return view('admin.barang.edit', compact('barang', 'pengguna'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barang',
            'keterangan' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
            'id_pengguna' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->keterangan = $request->keterangan;
        $barang->satuan = $request->satuan;
        $barang->stok = $request->stok;
        $barang->id_pengguna = $request->id_pengguna;
        $barang->save();
        return redirect()->route('barang.index');

    }

    public function destroy($id)
    {
        $barang = Barang::findOrFail($id);
        $barang->delete();
        return redirect()->route('barang.index');
    }

}
