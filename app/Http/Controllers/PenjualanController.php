<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\User;
use App\Models\Penjualan;
use Illuminate\Http\Request;

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
        $user = User::all();

        return view('member.pemesanan', compact('barang', 'user'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'jumlah_penjualan' => 'required',
            'harga_jual'=>'required',
            'id_barang'=>'required',
            'id_user'=>'required'
        ]);

        Penjualan::create([
            'id_user' => Auth::user()->id_user,
            'id_barang' => $request->id_barang,
            'jumlah_penjualan' => $request->jumlah_penjualan,
            'harga_jual' => $request->total,
        ]);
        // dd($penjualan);

        // $penjualan = new Penjualan;
        // $penjualan->harga_jual = $request->total;
        // $penjualan->jumlah_penjualan = $request->jumlah_penjualan;
        // $penjualan->id_user = Auth::user()->id_user;
        // $penjualan->id_barang = $request->id_barang;
        // $penjualan->save();

        $barang = Barang::findOrFail($request->id_barang);
        Barang::update([
            'stok' => ($barang->stok - $request->jumlah_penjualan),
        ]);
        // $barang->stok = $barang->stok - $request->jumlah_penjualan;
        // $barang->save();

        return redirect()->route('/member/bayar');
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

    public function insertPemesanan(Request $request)
    {
        $request->validate([
            'id_barang' => 'required',
            'id_user' => 'required',
            'jumlah_penjualan' => 'required',
            'harga_jual' => 'required',
        ]);

        Pemesanan::create([
            'id_user' => Auth::user()->id_user,
            'id_barang' => $request->id_barang,
            'jumlah_penjualan' => $request->jumlah_penjualan,
            'harga_jual' => $request->total,
        ]);

        $barang = Barang::findOrFail($request->id_barang);
        Barang::update([
            'stok' => ($barang->stok - $request->jumlah_penjualan),
        ]);

        return view('member.pemesanan', ['produk' => $produk], $data);
    }

}
