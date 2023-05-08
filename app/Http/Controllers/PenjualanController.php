<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PenjualanController extends Controller
{
    public function index()
    {
        $penjualan = Penjualan::all();
        return view('admin.penjualan.index', compact('penjualan'));
    }

    public function create($id_barang)
    {
        $barang = Barang::where('id_barang', $id_barang)->get();

        return view('member.pemesanan', compact('barang'));
    }

    public function store(Request $request)
    {
        Penjualan::create([
            'id_user' => Auth::user()->id_user,
            'id_barang' => $request->id_barang,
            'jumlah_penjualan' => $request->jumlah_penjualan,
            'harga_jual' => $request->total,
        ]);

        $barang = Barang::findOrFail($request->id_barang);
        $barang->stok = $barang->stok - $request->jumlah_penjualan;
        $barang->save();

        return redirect('/member/bayar');
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

    public function getVA()
    {
        $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';

        // generate a pin based on 2 * 7 digits + a random character
        $pin = mt_rand(1000000, 9999999)
            . mt_rand(1000000, 9999999)
            . $characters[rand(0, strlen($characters) - 1)];

        // shuffle the result
        $va = str_shuffle($pin);

        return view('member.bayar', compact('va'));
    }

}
