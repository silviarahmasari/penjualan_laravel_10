@extends('layout.mainlayout')
@section('page_title', 'Tambah Pembelian')

<!DOCTYPE html>
<head>
    <title>Tambah Pembelian</title>
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
    <form action="/pembelian/insert" method='POST' enctype="multipart/form-data">
        @csrf
        <input type = "hidden" name = "_token" value = "<?php echo csrf_token() ?>">
        <div class="container">
            <!-- general form elements -->
            <div class="col-12 col-md-8 col-lg-8">
                <div class="card">
                    <div class="card-header">
                        <h4>Form Tambah Pembelian</h4>
                    </div>
                    <form role="form">
                        <div class="card-body">
                            <input type="hidden" id="id_pembelian" name="id_pembelian" class="form-control select2bs4">
                            <input type="hidden" id="id_user" name="id_user" class="form-control select2bs4">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select name="id_barang" class="form-control @error('id_barang') is-invalid @enderror" required value="{{ old('id_barang') }}">
                                    <option value="" disabled selected>-- Pilih Barang --</option>
                                    @foreach($barang as $key)
                                        <option value="{{ $key->id_barang }}">{{ $key->nama_barang }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Jumlah Pembelian</label>
                                <input type="number" class="form-control @error('jumlah_pembelian') is-invalid @enderror" name="jumlah_pembelian" required value="{{ old('jumlah_pembelian') }}" name="jumlah_pembelian">
                                @error('jumlah_pembelian')
                                    <div class="invalid-feedback"> {{ $message }} </div>
                                @enderror
                            </div>
                            <div class="form-group">
                            <label>Harga Beli</label>
                                <input type="number" class="form-control @error('harga_beli') is-invalid @enderror" name="harga_beli" id="harga_beli" required value="{{ old('harga_beli') }}" name="harga_beli" placeholder="">
                                @error('harga_beli')
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
