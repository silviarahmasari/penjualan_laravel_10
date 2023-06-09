<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Penjualan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

class RiwayatPesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'allPenjualan' => Penjualan::with(['Barang'])
            ->where('id_user', Auth::user()->id_user)
            ->get()
        ];

        return view('member.riwayat', $data);
    }
}
