<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\HakAkses;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $users = User::all();
        return view('users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $akses = HakAkses::all();
        return view('users.create', compact('akses'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        User::create([
            'id_akses' => $request->id_akses,
            'nama_pengguna' => $request->nama_pengguna,
            'password' => Hash::make($request->password),
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);

        return redirect('/users')->with('success', 'Data baru berhasil ditambahkan!');
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
    public function edit($id_user)
    {
        $users = User::findOrFail($id_user);
        return view('users.update', compact('users'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        DB::table('users')->where('id_user', $request->id_user)->update([
            'id_user' => $request->id_user,
            'id_akses' => $request->id_akses,
            'nama_pengguna' => $request->nama_pengguna,
            'password' => Hash::make($request->password),
            'nama_depan' => $request->nama_depan,
            'nama_belakang' => $request->nama_belakang,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);
        return redirect('/users')->with('success', 'Data berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id_user)
    {
        $users = User::find($id_user);
        $users->delete();
        return redirect('/users')->with('success', 'Data berhasil dihapus!');
    }
}
