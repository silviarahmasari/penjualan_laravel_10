@extends('layout.mainlayout')
@section('page_title', 'Tambah Users')

<!DOCTYPE html>
<head>
    <title>Tambah Users</title>
    <style type = "text/css">
    .warna{
      color: red;
      font-size: 12px;
    }
    .bc{
      text-align: right;
      float: right;
    }
    .font{
      font-size: 15px;
    }
</style>
</head>

@section('content')
<body>
    <form action="/users/insert" method='POST' enctype="multipart/form-data">
        @csrf
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <div class="container">
            <!-- general form elements -->
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Users</h4>
                    </div>
                    <form role="form">
                        <div class="card-body">
                            <input type="hidden" id="id_user" name="id_user" class="form-control select2bs4">
                            <div class="form-group">
                                <label>Hak Akses</label>
                                    <select name="id_akses" class="form-control @error('id_akses') is-invalid @enderror" required value="{{ old('id_akses') }}">
                                        <option value="" disabled selected>-- Pilih Hak Akses --</option>
                                        @foreach($akses as $key)
                                            <option value="{{ $key->id_akses }}">{{ $key->nama_akses }}</option>
                                        @endforeach
                                    </select>
                            </div>
                            <div class="form-group">
                                <label>Nama Pengguna</label>
                                <input type="text" class="form-control @error('nama_pengguna') is-invalid @enderror" name="nama_pengguna" required value="{{ old('nama_pengguna') }}" name="nama_pengguna">
                                @error('nama_pengguna')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Password</label>
                                <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" required value="{{ old('password') }}" name="password" placeholder="">
                                @error('password')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Nama Depan</label>
                                <input type="text" class="form-control @error('nama_depan') is-invalid @enderror" name="nama_depan" required value="{{ old('nama_depan') }}" name="nama_depan">
                                @error('nama_depan')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Nama Belakang</label>
                                <input type="text" class="form-control @error('nama_belakang') is-invalid @enderror" name="nama_belakang" id="nama_belakang" required value="{{ old('nama_belakang') }}" name="nama_belakang" placeholder="">
                                @error('nama_belakang')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>No HP</label>
                                <input type="number" class="form-control @error('no_hp') is-invalid @enderror" name="no_hp" required value="{{ old('no_hp') }}" name="no_hp">
                                @error('no_hp')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Alamat</label>
                                <input type="text" class="form-control @error('alamat') is-invalid @enderror" name="alamat" id="alamat" required value="{{ old('alamat') }}" name="alamat">
                                @error('alamat')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Timestamp</label>
                                <input type="text" class="form-control" name="created_at" value="{{ date('Y-m-d H:i:s') }}" readonly>
                            </div>
                            <button class="btn btn-primary mr-1" type="submit" value="Simpan">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </form>
</body>
@endsection

</html>
