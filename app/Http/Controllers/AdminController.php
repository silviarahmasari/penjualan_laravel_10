<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $admin = User::where('id_akses', '=', '2')->get();
        $adminCount = count($admin);
        $labarugi= DB::table('pembelian')
                    ->select('SUM(penjualan.jumlah_penjualan*penjualan.harga_jual) - SUM(pembelian.jumlah_pembelian*pembelian.harga_beli) as labarugi')
                    ->join('penjualan', 'pembelian.id_barang', '=', 'penjualan.id_barang')
                    ->groupBy('pembelian.id_barang,penjualan.id_barang')
                    ->get();

        return view('admin.index', compact('admin', 'adminCount','labarugi'));
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
}
