<?php

namespace App\Http\Controllers;

use App\Models\HakAkses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AksesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $akses = HakAkses::all();
        return view('hak_akses.index', compact('akses'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('hak_akses.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        HakAkses::create([
            'nama_akses' => $request->nama_akses,
            'keterangan' => $request->keterangan,
        ]);

        return redirect('/hak_akses')->with('success', 'Data baru berhasil ditambahkan!');
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
    public function edit($id_akses)
    {
        $akses = HakAkses::findOrFail($id_akses);
        return view('hak_akses.update', compact('akses'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('hak_akses')->where('id_akses', $request->id_akses)->update([
            'id_akses' => $request->id_akses,
            'nama_akses' => $request->nama_akses,
            'keterangan' => $request->keterangan,
        ]);
        return redirect('/hak_akses')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_akses)
    {
        $akses = HakAkses::find($id_akses);
        $akses->delete();
        return redirect('/hak_akses')->with('success', 'Data berhasil dihapus!');
    }
}
