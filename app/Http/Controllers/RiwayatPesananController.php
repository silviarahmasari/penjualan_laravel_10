<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

class RiwayatPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // dd(Route::currentRouteName());
        $data = [
            'allPenjualan' => Penjualan::with(['Barang'])
            // ->where('id_user', auth()->id())
            ->orderBy('id_user')
            ->get()
        ];

        // dd($data);

        return view('member.riwayat', $data);
    }
}
