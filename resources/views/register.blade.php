@extends('layout.css_global')
@extends('layout.js_global')
@section('page_title','Registrasi')
@section('Project TK4','')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Register</title>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="container mt-5">
                <div class="row">
                    <div class="col-12 col-sm-10 offset-sm-1 col-md-8 offset-md-2 col-lg-8 offset-lg-2 col-xl-8 offset-xl-2">
                        <div class="login-brand">
                            <img src="{{ asset ('assets/img/logo-binus.png') }}" alt="logo" width="100">
                        </div>

                        <div class="card card-primary">
                            <div class="card-header">
                                <h4>Register</h4>
                            </div>

                            <div class="card-body">
                                <form action="post_register" method="POST">
                                @csrf

                                <div class="form-group">
                                    <label for="nama_pengguna">Nama Pengguna</label>
                                    <input id="nama_pengguna" type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" name="nama_pengguna" required value="{{ old('nama_pengguna') }}">
                                    @error('nama_pengguna')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required value="{{ old('passwordl') }}">
                                    @error('password')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_depan">Nama Depan</label>
                                    <input id="nama_depan" type="text" class="form-control @error('nama_depan') is-invalid @enderror" name="nama_depan" required value="{{ old('nama_depanl') }}">
                                    @error('nama_depan')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="nama_belakang">Nama Belakang</label>
                                    <input id="nama_belakang" type="text" class="form-control @error('nama_belakang') is-invalid @enderror" name="nama_belakang" required value="{{ old('nama_belakangl') }}">
                                    @error('nama_belakang')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="no_hp">No HP</label>
                                    <input id="no_hp" type="text" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" required value="{{ old('no_hpl') }}">
                                    @error('no_hp')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <input id="alamat" type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" required value="{{ old('alamatl') }}">
                                    @error('alamat')
                                        <div class="invalid-feedback"> {{ $message }} </div>
                                    @enderror
                                </div>

                                <input type="hidden" name="id_akses" value="6" type="role" class="form-control" autocomplete="off">

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">
                                    Register
                                    </button>
                                </div>
                                </form>
                            </div>
                        </div>
                        <div class="simple-footer">
                            Copyright &copy; 2021 <div class="bullet"></div>
                            <a href="https://www.instagram.com/bb_alumunium_profilbeton/">TEAM 4</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
