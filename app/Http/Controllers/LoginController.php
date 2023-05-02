<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class LoginController extends Controller
{
    public function preLogin(){
        if(Auth::check()){
            if(Auth::user()->id_akses == 2 ){
                return redirect('/admin');
            }
            else{
                return redirect('/member');
            }
        }
        else{
            return view('login');
        }
    }

    public function postLogin(Request $request){
        $data = $request->only('nama_pengguna', 'password');
        if(Auth::attempt($data)){
            if(Auth::user()->id_akses == 2 ){
                return redirect('/admin');
            }
            else{
                return redirect('/member');
            }
        }
        else{
            return view('login');
        }
    }

    public function preRegister(){
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $this->validate($request,[
            'id_akses'=>'required',
            'nama_pengguna'=>'required',
            'password'=>'required',
            'nama_depan'=>'required',
            'nama_belakang'=>'required',
            'no_hp'=>'required',
            'alamat'=>'required'
        ]);

        User::create([
            'id_akses'=>$request->id_akses,
            'nama_pengguna'=>$request->nama_pengguna,
            'password'=> Hash::make($request->password),
            'nama_depan'=>$request->nama_depan,
            'nama_belakang'=>$request->nama_belakang,
            'no_hp'=>$request->no_hp,
            'alamat'=>$request->alamat,
        ]);

        return redirect('/login');
    }

    public function Logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
