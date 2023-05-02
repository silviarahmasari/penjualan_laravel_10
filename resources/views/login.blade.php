@extends('layout.css_global')
@extends('layout.js_global')
@section('page_title','Login')
@section('Project TK4','')

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login</title>
</head>

<body>
    <div id="app">
        <section class="section">
            <div class="d-flex flex-wrap align-items-stretch">
                <div class="col-lg-4 col-md-6 col-12 order-lg-1 min-vh-100 order-2 bg-white">
                    <div class="p-4 m-3">
                        <img src="{{ ('assets/img/logo-binus.png') }}" alt="logo" width="100">
                        <h4 class="text-dark font-weight-normal">Selamat Datang di <span class="font-weight-bold">Project TEAM 4</span></h4>
                        <p class="text-muted">Sebelum memulai, Anda harus Login atau Registrasi terlebih dahulu.</p>

                        <form method="POST" action="/post_login">
                            @csrf

                            <div class="form-group">
                                <label for="nama_pengguna">Nama Pengguna</label>
                                <input id="nama_pengguna" type="text" class="form-control" name="nama_pengguna" tabindex="1" required autofocus>
                                <div class="invalid-feedback">
                                    Mohon Isi Nama Pengguna Anda
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="d-block">
                                    <label for="password" class="control-label">Password</label>
                                </div>
                                <input id="password" type="password" class="form-control" name="password" tabindex="2" required>
                                <div class="invalid-feedback">
                                    Mohon Isi Password Anda
                                </div>
                            </div>

                            <div class="form-group text-right">
                                <button type="submit" class="btn btn-primary btn-lg btn-icon icon-right" tabindex="4">
                                Login
                                </button>
                            </div>

                            <div class="mt-5 text-center">
                                Belum punya akun? <a href="/register">Buat Akun</a>
                            </div>

                        </form>

                        <div class="text-center mt-5 text-small">
                            Copyright &copy; <a href="">Project TEAM 4</a>
                        </div>
                    </div>
                </div>

                <div class="col-lg-8 col-12 order-lg-2 order-1 min-vh-100 background-walk-y position-relative overlay-gradient-bottom" data-background="../assets/img/college.jpg">
                    <div class="absolute-bottom-left index-2">
                        <div class="text-light p-5 pb-2">
                            <div class="mb-5 pb-3">
                                <h1 class="mb-2 display-4 font-weight-bold">Welcome to</h1>
                                <h5 class="font-weight-normal text-muted-transparent">Binus University, Indonesia</h5>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</body>
</html>
