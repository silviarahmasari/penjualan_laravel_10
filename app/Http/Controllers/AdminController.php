<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Barang;
use App\Models\Penjualan;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin2 = User::where('id_akses', '=', '2')->get();
        $admin3 = User::where('id_akses', '=', '3')->get();
        $admin4 = User::where('id_akses', '=', '4')->get();
        $admin5 = User::where('id_akses', '=', '5')->get();
        $adminCount = count($admin2) + count($admin3) + count($admin4) + count($admin5);
        $member = User::where('id_akses', '=', '6')->get();
        $memberCount = count($member);
        $barang = Barang::all();
        $barangCount = count($barang);
        $penjualan = Penjualan::all();
        $penjualanCount = count($penjualan);

        // $labarugi= DB::table('pembelian')
        //             ->select('SUM(penjualan.jumlah_penjualan*penjualan.harga_jual) - SUM(pembelian.jumlah_pembelian*pembelian.harga_beli) as labarugi')
        //             ->join('penjualan', 'pembelian.id_barang', '=', 'penjualan.id_barang')
        //             ->groupBy('pembelian.id_barang,penjualan.id_barang')
        //             ->get();

        return view('admin.index', compact('adminCount', 'memberCount', 'barangCount', 'penjualanCount'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function history()
    {
        $penjualan = Penjualan::all();
        return view('admin.history', compact('penjualan'));
    }
}
