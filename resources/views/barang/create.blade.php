@extends('layout.mainlayout')
@section('page_title', 'Tambah Barang')

<!DOCTYPE html>
<head>
    <title>Tambah Barang</title>
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
    <form action="/barang/insert" method='POST' enctype="multipart/form-data">
        @csrf
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <div class="container">
            <!-- general form elements -->
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Barang</h4>
                    </div>
                    <form role="form">
                        <div class="card-body">
                            <input type="hidden" id="id_barang" name="id_barang" class="form-control select2bs4">
                            <input type="hidden" id="id_user" name="id_user" class="form-control select2bs4">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <input type="text" class="form-control @error('nama_barang') is-invalid @enderror" name="nama_barang" required value="{{ old('nama_barang') }}" name="nama_barang">
                                @error('nama_barang')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Keterangan</label>
                                <input type="text" class="form-control @error('keterangan') is-invalid @enderror" name="keterangan" id="keterangan" required value="{{ old('keterangan') }}" name="keterangan" placeholder="">
                                @error('keterangan')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Satuan</label>
                                <input type="text" class="form-control @error('satuan') is-invalid @enderror" name="satuan" required value="{{ old('satuan') }}" name="satuan">
                                @error('satuan')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Stok</label>
                                <input type="text" class="form-control @error('stok') is-invalid @enderror" name="stok" id="stok" required value="{{ old('stok') }}" name="stok" placeholder="">
                                @error('stok')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label>Harga Beli</label>
                                <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" name="harga_beli" required value="{{ old('harga_beli') }}" name="harga_beli">
                                @error('harga_beli')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Harga Jual</label>
                                <input type="number" class="form-control @error('harga_jual') is-invalid @enderror" name="harga_jual" id="harga_jual" required value="{{ old('harga_jual') }}" name="harga_jual">
                                @error('harga_jual')
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
