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
        return view('admin.barang.index', compact('barang'));
    }

    public function create()
    {
        $user = User::all();
        return view('admin.barang.create', compact('user'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barang',
            'keterangan' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
            'id_user' => 'required',
        ]);

        $barang = new Barang;
        $barang->nama_barang = $request->nama_barang;
        $barang->keterangan = $request->keterangan;
        $barang->satuan = $request->satuan;
        $barang->stok = $request->stok;
        $barang->id_user = Auth::user()->id_user;
        $barang->save();
        return redirect()->route('barang.index');
    }

    public function show($id)
    {
        $barang = Barang::findOrFail($id);
        return view('admin.barang.show', compact('barang'));
    }

    public function edit($id)
    {
        $barang = Barang::findOrFail($id);
        $user = User::all();
        return view('admin.barang.edit', compact('barang', 'user'));

    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_barang' => 'required|unique:barang',
            'keterangan' => 'required',
            'satuan' => 'required',
            'stok' => 'required',
            'id_user' => 'required',
        ]);

        $barang = Barang::findOrFail($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->keterangan = $request->keterangan;
        $barang->satuan = $request->satuan;
        $barang->stok = $request->stok;
        $barang->id_user = Auth::user()->id_user;
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
